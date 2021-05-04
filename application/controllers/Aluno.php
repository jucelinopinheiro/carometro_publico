<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    /**Esse controller faz todo fluxo das requisições ajax para o model e retorna 
     * um JSON, com o resultado do processamento do Model
     *  
     */

    class Aluno extends CI_Controller{
    
        function __construct(){
            parent::__construct();
            $this->load->model('aluno_model', 'aluno');
        }

        public function busca_aluno(){
            if ($this->session->has_userdata('ni')){
                if($this->input->method() == 'post'){
                    $resultado = $this->aluno->buscaAluno();
                    echo json_encode($resultado);
                }
            }
   
        }

        public function ficha_aluno(){
            if ($this->session->has_userdata('ni')){
                if($this->input->method() == 'post'){
                    $resultado = $this->aluno->fichaAluno();
                    echo json_encode($resultado);
                }
            }
        }

        public function atualizar_aluno(){
            if ($this->session->has_userdata('ni')){
                if($this->input->method() == 'post'){
                    $resultado = $this->aluno->atualizarAluno();
                    echo json_encode($resultado);
                }
            }
        }

        public function ficha_ocorrencias(){
            if ($this->session->has_userdata('ni')){
                if($this->input->method() == 'post'){
                    $resultado = $this->aluno->fichaOcorrencias();
                    echo json_encode($resultado);
                }
            }
        }

        public function salva_ocorrencia(){
            if ($this->session->has_userdata('ni')){
                if($this->input->method() == 'post'){
                    $resultado = $this->aluno->salvaOcorrencia();
                    echo json_encode($resultado);
                }
            }
        }

        public function atualiza_ocorrencia(){
            if ($this->session->has_userdata('ni')){
                if($this->input->method() == 'post'){
                    $resultado = $this->aluno->atualizaOcorrencia();
                    echo json_encode($resultado);
                }
            }
        }

        public function excluir_ocorrencia(){
            if ($this->session->has_userdata('ni')){
                if($this->input->method() == 'post'){
                    $resultado = $this->aluno->excluirOcorrencia();
                    echo json_encode($resultado);
                }
            }
        }

        public function anexar_documento(){
            if ($this->session->has_userdata('ni')){
                if($this->input->method() == 'post'){
                    $resultado = $this->aluno->anexarDocumento();
                    echo json_encode($resultado);
                }
            }
        }

    }
?>