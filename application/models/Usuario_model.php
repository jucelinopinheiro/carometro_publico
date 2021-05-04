<?php
    defined('BASEPATH') OR exit('URL inválida.');

    /**Esse model controle todas as ações referente ao usuário e
     *  contém todas as regra de negócios e tomadas de decisão.
     */
    
    class Usuario_model extends CI_Model{
    
        public function Login(){
            $query = $this->db->from('usuario')
                            ->where('ni', $this->input->post('text_login'))
                            ->where('senha', md5($this->input->post('text_senha')))
                            ->get();
            
            if($query->num_rows()==0){
                $resposta = [
                    "login"=>false,
                    "home"=>''
                ];
                return $resposta;
            }else{
                $usuario = $query->row();
                $this->session->set_userdata('ni', $usuario->ni);
                $this->session->set_userdata('nome', $usuario->nome);
                $this->session->set_userdata('acesso', $usuario->acesso);
                $resposta = [
                    "login"=>true,
                    "home"=>site_url('main')
                ];
                return $resposta;
            }
        }

        public function alterarSenha(){
            $usuario = $this->input->post('text_usuario');
            $novaSenha =  md5($this->input->post('text_novaSenha'));

            if ($usuario != '' && $novaSenha != ''){
                $dados = array(
                    'senha'=> $novaSenha,
                    'updated_at'=>date("Y-m-d H:i:s")
                );
                $query = $this->db->where('ni', $usuario)->update('usuario',$dados);
                if($query){
                    $resultado = [
                        'resposta'=>true,
                        'mensagem'=>"Senha atulizada com Sucesso!"
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

        
    
    }
?>