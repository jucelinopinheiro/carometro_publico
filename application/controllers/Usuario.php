<?php
    defined('BASEPATH') OR exit('URL inválida.');

    /**Esse controller faz todo fluxo das requisições ajax para o model e retorna 
     * um JSON, com o resultado do processamento do Model
     *  A unica ação tomada aqui é a criação da session.
     */
    
    class Usuario extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->model('usuario_model', 'usuario');
        }

        public function Login(){
            $resposta = $this->usuario->login();
            echo json_encode($resposta);
        }

        public function Logout(){
            //faz o logout do usuário
            if($this->session->has_userdata('ni')){
                //destroi os dados da sessão  
                $this->session->unset_userdata('ni');              
                $this->session->unset_userdata('nome');
                $this->session->unset_userdata('acesso');
                redirect('main');
            } else {
                redirect('main');
            }
        }

        public function alterar_senha(){
            if($this->session->has_userdata('ni')){
               $resposta = $this->usuario->alterarsenha();
               echo json_encode($resposta);
            } 
            
        }


    
    }
?>