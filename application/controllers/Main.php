<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    /*função main é ponto central para chamada das páginas
        verifica no index se existe, uma sessão antes de direcionar para uma
        outra página e verifica o níve de login 
    */
    class Main extends CI_Controller{
        
        public function index(){
            if($this->session->has_userdata('ni')){
                $this->home();
            } else {
                $this->login();
            }
        }

        public function login(){
            if (!$this->session->has_userdata('ni')){
                $this->load->view('layout/inicio');
                $this->load->view('login/login');
                $this->load->view('layout/final');
            }else{
                redirect('main');
            }
        }

        public function home(){
            if($this->session->has_userdata('ni')){
                $this->load->view('layout/inicio');
                $this->load->view('layout/header');
                $this->load->view('home/home');
                $this->load->view('layout/footer');
                $this->load->view('layout/final');
            } else {
                redirect('login');
            }
            
        }

        public function alterarSenha(){
            if ($this->session->has_userdata('ni')){
                $this->load->view('layout/inicio');
                $this->load->view('layout/header');
                $this->load->view('usuario/alterarsenha');
                $this->load->view('layout/footer');
                $this->load->view('layout/final');
            }
        }

        public function busca($nome){
            if(!$this->session->has_userdata('ni')){
                redirect('main');
            }else{
                //verifica o nível de acesso do usuario e redireciona caso possa acessar
                if ($this->session->acesso >= 3){
                    $busca['nome'] = strtoupper($nome);
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('buscar/busca_aluno', $busca);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }else{
                    $alerta['mensagem'] = "Você não tem acesso a esse item";
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('layout/sem_acesso', $alerta);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }
            }       
   
        }

        public function aluno($matricula){
            if(!$this->session->has_userdata('ni')){
                redirect('main');
            }else{
                //verifica o nível de acesso do usuario e redireciona caso possa acessar
                if ($this->session->acesso >= 3){
                    $busca['matricula'] = $matricula;
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('aluno/ficha', $busca);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }else{
                    $alerta['mensagem'] = "Você não tem acesso a esse item";
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('layout/sem_acesso', $alerta);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }
            }
            
        }

        public function alterarFoto($matricula){
            if(!$this->session->has_userdata('ni')){
                redirect('main');
            }else{
                //verifica o nível de acesso do usuario e redireciona caso possa acessar
                if ($this->session->acesso >= 3){
                    $busca['matricula'] = $matricula;
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('aluno/alterar_foto', $busca);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }else{
                    $alerta['mensagem'] = "Você não tem acesso a esse item";
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('layout/sem_acesso', $alerta);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }
            }
            
        }

        public function turma($turma){
            if(!$this->session->has_userdata('ni')){
                redirect('main');
            }else{
                //verifica o nível de acesso do usuario e redireciona caso possa acessar
                if ($this->session->acesso >= 3){
                    $busca = ['turma'=>$turma];
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('turma/turma', $busca);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }else{
                    $alerta['mensagem'] = "Você não tem acesso a esse item";
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('layout/sem_acesso', $alerta);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }
            }

        }

        public function teste(){
            /**
             * Essa função foi criada para teste de novos funciomanentos e layout
             */
            if(!$this->session->has_userdata('ni')){
                redirect('main');
            }else{
                if ($this->session->acesso >= 3){
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('teste/teste');
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }else{
                    $alerta['mensagem'] = "Você não tem acesso a esse item";
                    $this->load->view('layout/inicio');
                    $this->load->view('layout/header');
                    $this->load->view('layout/sem_acesso', $alerta);
                    $this->load->view('layout/footer');
                    $this->load->view('layout/final');
                }
            }
                
        }
    
    }
?>

