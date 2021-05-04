<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    /**Esse model controle todas as ações referente ao aluno e
     *  contém todas as regra de negócios e tomadas de decisão.
     */

    class Aluno_model extends CI_Model{
    
        public function buscaAluno(){
            $aluno = $this->input->post('busca');
            $this->db->select('*');
            $this->db->from('aluno');
            $this->db->join('turma', 'turma.id = aluno.turma_id');
            $this->db->join('curso', 'curso.id = turma.curso_id');
            $this->db->like('aluno.nome', $aluno, 'after');
            $query = $this->db->get();
            $alunos = [];
            foreach($query->result()as $aluno_atual){
                $dados = [
                    'matricula'=>$aluno_atual->matricula,
                    'nome'=>$aluno_atual->nome,
                    'fone_aluno'=>$aluno_atual->fone_aluno,
                    'email_aluno'=>$aluno_atual->email_aluno,
                    'mae'=>$aluno_atual->mae,
                    'fone_mae'=>$aluno_atual->fone_mae,
                    'pai'=>$aluno_atual->pai,
                    'fone_pai'=>$aluno_atual->fone_pai,
                    'pne'=>(($aluno_atual->pne == false)?"Não":"Sim"),
                    'obs'=>$aluno_atual->obs,
                    'foto'=>base_url('assets/fotos/').$aluno_atual->foto,
                    'curso'=>$aluno_atual->nome_curso,
                    'cor_curso'=>$aluno_atual->cor_curso,
                    'turma'=>$aluno_atual->sigla,
                    'local'=>site_url('main/aluno/').$aluno_atual->matricula
                ];
                array_push($alunos, $dados);
            }
            $resposta = [
                'busca'=>$aluno,
                'dados'=>$alunos

            ];
            return $resposta;
        }
       
        public function fichaAluno(){
            $aluno = $this->input->post('busca');
            $this->db->select('*');
            $this->db->from('aluno');
            $this->db->join('turma', 'turma.id = aluno.turma_id');
            $this->db->join('curso', 'curso.id = turma.curso_id');
            $this->db->where('aluno.matricula', $aluno);
            $dados = $this->db->get()->row();
            $ficha = [
                'matricula'=>$dados->matricula,
                'nome'=>$dados->nome,
                'datanasc'=>$dados->nascimento,
                'fone_aluno'=>$dados->fone_aluno,
                'email_aluno'=>$dados->email_aluno,
                'mae'=>$dados->mae,
                'fone_mae'=>$dados->fone_mae,
                'pai'=>$dados->pai,
                'fone_pai'=>$dados->fone_pai,
                'pne'=>(($dados->pne == false)?"Não":"Sim"),
                'obs'=>$dados->obs,
                'maior'=>(((date("Y-m-d") - $dados->nascimento)>18)?"Sim":"Não"),
                'foto'=>base_url('assets/fotos/').$dados->foto,
                'curso'=>$dados->nome_curso,
                'cor_curso'=>$dados->cor_curso,
                'turma'=>$dados->turma,
                'termo'=>$dados->termo,
                'turno'=>$dados->turno
            ];
         
            $resposta = ['ficha'=>$ficha];
            return $resposta;    
        }
     

        public function atualizarAluno(){
            $matricula = $this->input->post('matricula');
            $dados = [
                'nome'=>strtoupper($this->input->post('nome_aluno')),
                'nascimento'=>$this->input->post('nascimento'),
                'fone_aluno'=>$this->input->post('fone_aluno'),
                'email_aluno'=>$this->input->post('email_aluno'),
                'mae'=>strtoupper($this->input->post('mae')),
                'fone_mae'=>$this->input->post('fone_mae'),
                'pai'=>strtoupper($this->input->post('pai')),
                'fone_pai'=>$this->input->post('fone_pai'),
                'pne'=>$this->input->post('pne'),
                'obs'=>$this->input->post('obs'),
                'updated_at'=> date("Y-m-d H:i:s")
            ];

            $query = $this->db->where('matricula', $matricula)->update('aluno', $dados);
        
            if($query){
                $resultado = [
                    'resposta'=>true,
                    'mensagem'=>"Ficha de aluno atualizada"
                ];
            }else{
                $resultado = [
                    'resposta'=>false,
                    'mensagem'=>"Erro no envio dos dados"
                ];
            }
            return $resultado;
        }

        public function fichaOcorrencias(){
            $aluno = $this->input->post('busca');
            $this->db->select('ocorrencia.id, ocorrencia.descricao, ocorrencia.anexo, ocorrencia.created_at, ocorrencia.updated_at, usuario.nome');
            $this->db->from('ocorrencia');
            $this->db->join('usuario', 'usuario.ni = ocorrencia.usuario_id');
            $this->db->where('aluno_id', $aluno);
            $this->db->order_by('ocorrencia.id', 'DESC');
            $query = $this->db->get();
            $ocorrencias = [];
            foreach($query->result()as $ocorrencia){
                $dados = [
                    'id'=>$ocorrencia->id,
                    'descricao'=>$ocorrencia->descricao,
                    'criado_em'=>date('d/m/Y', strtotime($ocorrencia->created_at)),
                    'atualizado'=>date('d/m/Y H:i:s', strtotime($ocorrencia->updated_at)),
                    'criado_por'=>$ocorrencia->nome,
                    'anexo'=>$ocorrencia->anexo
                ];
                array_push($ocorrencias, $dados);
            }
            $resposta = ['ocorrencias'=> $ocorrencias];
            return $resposta; 
        }

        public function salvaOcorrencia(){
            $dados = [
                'usuario_id'=>$this->session->ni,
                'aluno_id'=>$this->input->post('matricula'),
                'descricao'=>$this->input->post('descricao'),
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ];
    
            $query = $this->db->insert('ocorrencia', $dados);
    
            $resultado = [
                'resposta'=>$query,
                'mensagem'=>"Ocorrência cadatrada"
            ];
    
            return $resultado;
        }

        public function atualizaOcorrencia(){
            if($this->input->post('id_ocorrencia') != '' && $this->input->post('descricao') != '' ){
                $id = $this->input->post('id_ocorrencia');
                $dados = [
                    'descricao'=>$this->input->post('descricao'),
                    'updated_at'=>date("Y-m-d H:i:s")
                ];
                $query = $this->db->where('id', $id)->update('ocorrencia', $dados);
                if($query){
                    $resultado = [
                        'resposta'=>true,
                        'mensagem'=>"Ocorrência atualizada !"
                    ];
                }

            }else{
                $resultado = [
                    'resposta'=>false,
                    'mensagem'=>"Erro! interno"
                ];
            }
            return $resultado;
    
        }

        public function excluirOcorrencia(){
            if($this->input->post('id_ocorrencia') != ''){
                $id = $this->input->post('id_ocorrencia');
                $this->db->from('ocorrencia');
                $this->db->where('id',$id);
                $ocorrencia = $this->db->get()->row();

                $dados = [
                    'id'=> $ocorrencia->id,
                    'usuario_id'=>$ocorrencia->usuario_id,
                    'aluno_id'=>$ocorrencia->aluno_id,
                    'descricao'=>$ocorrencia->descricao,
                    'created_at'=>$ocorrencia->created_at,
                    'updated_at'=>$ocorrencia->updated_at,
                    'excluido_at'=>date("Y-m-d H:i:s"),
                    'excluido_por'=>$this->session->nome
                ];

                $query = $this->db->insert('trashocorrencia', $dados);
               
                if($query){
                    $this->db->delete('ocorrencia', array('id' => $id));
                    $resultado = [
                        'resposta'=>$query,
                        'mensagem'=>"Ocorrência movida para lixeira!"
                    ];
                }else{
                    $resultado = [
                        'resposta'=>$query,
                        'mensagem'=>"Erro! ao mover ocorrência para lixeira."
                    ];
                }
            }else{
                $resultado = [
                    'resposta'=>false,
                    'mensagem'=>"Erro! interno"
                ];
            }
            return $resultado;
        }

        public function anexarDocumento(){

            $config['upload_path']='./assets/dococorrencia';
            $config['allowed_types']='bmp|jpg|png|pdf';
            $config['max_size']=500;
            $config['overwrite']=true;

            //renomea o arquivo para matricula + numero de ocorrencia;
            $arquivo= $_FILES["arquivo"]["name"];
            $arquivo_extensao = pathinfo($arquivo,PATHINFO_EXTENSION);
            //$arquivo_original_sem_extensao = pathinfo($arquivo, PATHINFO_FILENAME);
            $nome_arquivo = $this->input->post('matricula').'_'.$this->input->post('ocorrencia').'.'. $arquivo_extensao;
            $config['file_name'] = $nome_arquivo;
        
            //inicia library upload
            $this->load->library('upload', $config);

            if($this->upload->do_upload('arquivo')){
                //inclui o nome do arquivo na ocorrencia.

                $id = $this->input->post('ocorrencia');
                $dados = [
                    'anexo'=>$nome_arquivo,
                    'updated_at'=>date("Y-m-d H:i:s")
                ];
                $query = $this->db->where('id', $id)->update('ocorrencia', $dados);
                if($query){
                    $resultado = [
                        'resposta'=>true,
                        'nome'=>$nome_arquivo,
                        'mensagem'=>"Documento anexado com sucesso."
                    ];
                }else{
                    $resultado = [
                        'resposta'=>false,
                        'mensagem'=>'Erro no bando de dados.'
                    ];
                }

               
            }else{
                $resultado = [
                    'resposta'=>false,
                    'mensagem'=>$this->upload->display_errors()
                ];
            }

            return $resultado;
        }



    
    }
    

?>



                

                
