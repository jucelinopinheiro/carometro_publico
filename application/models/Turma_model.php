<?php
    defined('BASEPATH') OR exit('URL inválida.');
    /**Esse model controle todas as ações referente a turma e
     *  contém todas as regra de negócios e tomadas de decisão.
     */

    class Turma_model extends CI_Model{
        
        public function turmaPorcurso(){
            
            $this->db->from('curso');
            $this->db->order_by('nome_curso', 'ASC');
            $cursos = $this->db->get();
            $fichaCursos =[];
            foreach($cursos->result()as $curso){
                $this->db->from('turma');
                $this->db->where('turma.curso_id', $curso->id);
                $this->db->order_by('turma.sigla', 'ASC');
                $turmas = $this->db->get()->result();

                $dados =[
                    $curso->nome_curso,
                    $curso->cor_curso,
                    $turmas
                ];
                array_push($fichaCursos, $dados);
            }
            $resultado = ['cursos'=>$fichaCursos];
            return $resultado;
        }

        public function buscaTurma(){
            //recebe o id da turma, efetua a busca e retorna informações da turma e de alunos inturmado
            if($this->input->post('busca') != ''){
                $turma_id = $this->input->post('busca');
                $this->db->select('*');
                $this->db->from('aluno');
                $this->db->join('turma', 'turma.id = aluno.turma_id');
                $this->db->join('curso', 'curso.id = turma.curso_id');
                $this->db->where('aluno.turma_id', $turma_id);
                $this->db->order_by('aluno.nome','ASC');
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
                    //monta array com informações da turma e add um arrayu com informações de todos alunos inturmados.
                    $resultado = [
                        'curso'=>$aluno_atual->nome_curso,
                        'sigla'=>$aluno_atual->sigla,
                        'dados'=>$alunos

                    ];
                }else{
                    $resultado = [
                        'resposta'=>false,
                        'mensagem'=>"Erro no envio da solicitação"
                    ];
                }
                return $resultado;
            }
        
    }
?>