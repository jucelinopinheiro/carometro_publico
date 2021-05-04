<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<main class="container d-flex justify-content-center flex-wrap p-0">
    <div class="col-md-12 p-2 m-2">
        <!--Para fazer REST da busca matricula da busca e local da URL  da API-->        
        <h5>Alterar Foto: <span id="aluno-matricula" data-url="<?php echo site_url('/');?>"><?php echo (isset($matricula) ? $matricula :'Erro');?></span></h5>
        <hr>
        <div class="" role="alert" id="mensagem"></div>


    <div class="form-group row">
        <label class="col-md-2 col-form-label">Selecione a foto:</label>
        <div class="col-md-10">
            <input type="file" name="upload_image" id="upload_image">
        </div>
    </div>
    <hr>
    <div id="uploaded_image"></div>
    <br>
    <div>
      <button id="voltar" class="btn btn-primary" onclick="window.history.back()"><i class="fas fa-undo-alt"></i> Voltar</button>
      <button id="salvar_foto" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
    </div>
</main>

<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" class="quadro-foto"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button id="corte_foto" class="btn btn-success"><i class="fas fa-cut"></i> Corte Imagem</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
      		</div>
    	</div>
    </div>
</div>

<script> 

$(function(){
  /*
    esse modoulo trabalha com a lib croppe do em jquery
  */
    $("#salvar_foto").prop('disabled', true);
    $("#salvar_foto").click(function(){salvarNovafoto();});

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
        width:300,
        height:300,
        type:'square' //circle
        },
        boundary:{
        width:320,
        height:320
        }
    });

    $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
        $image_crop.croppie('bind', {
        url: event.target.result
        }).then(function(){
        
        });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
    });

  $('#corte_foto').click(function(event){
    /*
      essa função envia para o controler o corte do croope e retorna um png
    */
    var local =  $("#aluno-matricula").data('url')+'foto/mostrar_foto';
    var matricula = $("#aluno-matricula").text();
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport',
      format:'jpg'
    }).then(function(response){
      $.ajax({
        url:local,
        type: "POST",
        data:{"matricula":matricula, "image": response},
        success:function(data)
        {
          $("#salvar_foto").prop('disabled', false);
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});

function salvarNovafoto(){
  /*
    ao salvar o resultado da função croppie envia para o perfil do aluno nova foto
  */
    var local =  $("#aluno-matricula").data('url')+'foto/salvar_foto';
    var matricula = $("#aluno-matricula").text();
    var dados = {'matricula': matricula};

    $.ajax({
        type : "POST",
        url  : local,
        dataType : "JSON",
        data : dados,
        beforeSend:function(){
           //não implementado.
        },
        success: function(resposta){
          if(resposta.resposta){
            mensagem('Sucesso!', resposta.mensagem, 'alert alert-success');
          }else{
            mensagem('Erro!', resposta.mensagem, 'alert alert-danger');
          }   
        },
        error: function(erro, ajaxOptions, mensagemError){
           mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
    });   
}

</script>