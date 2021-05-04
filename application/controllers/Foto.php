<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    /**
     * Para esse controler funcionar é necessário a instação da biblioteca GD.
     * verifique no phpinfo se consta a biblioteca.
     * 
     * instalação no ubuntu:
     * $sudo apt-get install php5-gd && sudo service apache2 restart
     * 
     * No Windows:
     * Lembrando que é pré-requisito para instalação os pacotes libpng e libjpeg para que o GD possa compilar.
     * No Windows você também irá precisar também do php_gd2.dll que é uma extensão do php.ini.
     * 
     */

    class Foto extends CI_Controller{
    
        public function mostrar_foto(){

            $data = $this->input->post('image');

            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = ($this->input->post('matricula')).'.png';

            $dir = 'assets/uploadfotos';

	        file_put_contents("$dir/$imageName", $data);

            $local = base_url('/assets/uploadfotos/');

	        echo '<img src="'.$local.$imageName.'" class="img-thumbnail" />';

        }
        
        
        public function salvar_foto(){
            $matricula = $this->input->post('matricula');
            $dir_atual = 'assets/uploadfotos/'.$matricula.'.png';

            //cria uma imagem PNG a partir do caminho.
            $imagem = imagecreatefrompng($dir_atual);

            //converte a imagem em jpg devido ao legado do carômetro.
            //vide instalação das bibliotecas para o funcionamento correto.
            $dir_destino = 'assets/fotos/'.$matricula.'.jpg';
           
            //$resposta = imagejpeg($imagem,$dir_destino,100);
            $resposta = rename( $dir_atual, $dir_destino);

            //apatando arquivo temp
            unlink($dir_atual);

            if($resposta){
                $resultado = [
                    'resposta'=>$resposta,
                    'mensagem'=>'Foto Alterada com sucesso.'
                ];
            }else{
                $resultado = [
                    'resposta'=>$resposta,
                    'mensagem'=>'Erro Interno.'
                ];
            }
            echo json_encode($resultado);
        }

        public function download_anexo($anexo){
            if($anexo !=''){
                $local = './assets/dococorrencia/';
                $arquivo = $local.$anexo;
                $this->load->helper('download');
                force_download($arquivo,null,true);
            }
            
        }

    }
?>

