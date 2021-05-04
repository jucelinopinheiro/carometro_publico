<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    /**Esse controller faz todo fluxo das requisições ajax para o model e retorna 
     * um JSON, com o resultado do processamento do Model
     *  
     */

    class Turma extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('turma_model', 'turma');
        }

        public function turma_curso(){
            if ($this->session->has_userdata('ni')){
                $resultado = $this->turma->turmaPorcurso();
                echo json_encode($resultado);
            }
            
        }

        public function busca_turma(){
            if ($this->session->has_userdata('ni')){
                $resultado = $this->turma->buscaTurma();
                echo json_encode($resultado);
            }
        }


    
    }
?>