<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<main>
<!-- Modal login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="">Login</h4>
      </div>
      <div class="modal-body">
      <div class="" role="alert" id="mensagem"></div>
        <form id="login" action="" method="post">
          <div class="mb-3">
            <label for="text_login" class="form-label"><strong>NIF:</strong></label>
            <input type="number" class="form-control" id="text_login" required>
          </div>
          <div class="mb-3">
            <label for="text_senha" class="form-label"><strong>Senha:</strong></label>
            <input type="password" class="form-control" id="text_senha" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btn-login">Login</button>
      </div>
    </div>
  </div>
</div>
</main>
<!-- script login -->
<script>

$(function(){
    $("#login").modal({
        backdrop:'static',
        keyboard:false
    });

    $('#login').on('shown.bs.modal', function () {
      $('#text_login').focus();
    });  
  
    
    $("#btn-login").click(efetuarLogin);
    $("#text_senha").keypress(function(event){
        if(event.which == 13){
            event.preventDefault();
            efetuarLogin();
        }
    })

    
});
function efetuarLogin(){
    var campo = 0;
    var login = $("#text_login").val();
    var senha = $("#text_senha").val();
    if(login == '' || login == undefined){
        mensagem('Atenção! ', 'Informe seu login', 'alert alert-warning');
        campo =1;
    }
    if(senha == '' || senha == undefined){
        mensagem('Atenção! ', 'Informe sua senha', 'alert alert-warning');
        campo =2;
    }
    if (campo == 0){
        $("#mensagem").hide();
        
        var dados = {'text_login':login,'text_senha':senha};
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo site_url('usuario/login');?>',
                async: true,
                data: dados,
                beforeSend:function(){
                    /* não implementado */
                },
                success: function(resposta) {
                    if(resposta.login == true){
                        window.location.href = resposta.home;
                    }else{
                        mensagem('Erro! ', 'Usuário ou senha inválidos', 'alert alert-danger');
                    }
                },
                error: function(erro, ajaxOptions, mensagemError){
                    mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
                }
            });
    
    }

}
</script>