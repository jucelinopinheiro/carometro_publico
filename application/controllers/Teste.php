<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Teste extends CI_Controller{

        public function upload_foto(){
            
            $nome = $this->input->post('nome');
            $config['upload_path']= './assets/uploadfotos/';
            $config['allowed_types']= 'pdf';
            $config['max_size']=500;
            $config['file_name']=$nome;

            //carrega a biblioteca 'upload'
            $this->load->library('upload', $config);

            //tenta fazer o upload da imagem
            if($this->upload->do_upload('foto')){
              $resultado = $this->upload->data();
              var_dump($resultado);

            } else {
                //ocorreu um erro no carregamento da fotografia
                echo $this->upload->display_errors();
                
            }


        }

        public function imagem(){


            if(isset($_POST["image"]))
                {
                    $data = $_POST["image"];

                    $image_array_1 = explode(";", $data);

                    $image_array_2 = explode(",", $image_array_1[1]);

                    $data = base64_decode($image_array_2[1]);

                    $imageName = time() . '.png';

                    file_put_contents($imageName, $data);

                    echo '<img src="'.$imageName.'" class="img-thumbnail" />';
                }

        }
            
    }

?>