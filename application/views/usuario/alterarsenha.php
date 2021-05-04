<?php
  defined('BASEPATH') OR exit('URL inválida.');
?>

<main class="container">
    <div class="row border mt-4 p-4 shadow-lg p-3 mb-5 bg-white rounded">
      <div class="col">
        <h1>Alterar Senha</h1>
        <hr>
        <div class="" role="alert" id="mensagem"></div>
        <form action="" method="POST" id="alterar-senha">
          <div class="mb-3">
            <label for="nova-senha" class="form-label"><strong>Nova senha: <strong class="campo-obrigatorio"> * </strong></label>
            <input type="password" class="form-control" id="nova-senha" required>
          </div>
          <div class="mb-3">
            <label for="confirma-senha" class="form-label">Confirma senha: <strong class="campo-obrigatorio"> * </strong></label>
            <input type="password" class="form-control" id="confirma-senha" required>
          </div>
          
          <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight">
              <a type="button" class="btn btn-primary" id="btn-voltar" href="<?php echo site_url('/main');?>"><i class="fas fa-undo"></i> Voltar</a>
            </div>
            <div class="p-2 bd-highlight">
            <button type="button" class="btn btn-danger" id="btn-cancelar"><i class="fas fa-times"></i> Cancelar</button>
            </div>
            <div class="ml-auto p-2 bd-highlight">
              <button type="button" class="btn btn-success" id="btn-salvar"><i class="fas fa-save"></i> Salvar</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </main>

  <script>
    $(function(){
      //carrega event nos botoões
      $("#btn-salvar").click(altearSenha);
      $("#btn-cancelar").click(function(event){
        //função limpa campos no main.js
        limpaCampos("#alterar-senha");
        $("#nova-senha").focus();
      });
    });

    function altearSenha(){
      /*verifica campos se estão preenchidos e envia POST via AJAX, toma ações após recebimento
      da variável dados que tem um retorno de um array*/

      var novaSenha = $("#nova-senha").val();
      var confSenha = $("#confirma-senha").val();
      var usuario = <?php echo $this->session->ni;?>;

      if((novaSenha == '' || novaSenha == undefined)||
      (confSenha == '' || confSenha == undefined)){
        mensagem('Atenção! ', 'Informe todos os campos', 'alert alert-warning');

      }else if(novaSenha != confSenha){
        mensagem('Atenção! ', 'Nova senha não confere', 'alert alert-warning');

      }else{
        var dados = {'text_usuario':usuario, 'text_novaSenha':novaSenha};
        $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo site_url('/usuario/alterar_senha');?>',
                async: true,
                data: dados,
                beforeSend:function(){
                    mensagem('Atenção!', 'Salvando...', 'alert alert-primary');
                    $("#btn-cancelar").prop('disabled', true);
                    $("#btn-salvar").prop('disabled', true);
                },
                success: function(dados) {
                    if(dados.resposta == true){
                      mensagem('Sucesso!', dados.mensagem, 'alert alert-success');
                      limpaCampos("#alterar-senha");
                      $("#btn-cancelar").prop('disabled', false);
                      $("#btn-salvar").prop('disabled', false);
                    }else{
                      mensagem('Erroo!', dados.mensagem, 'alert alert-danger');
                    }
                    $("#btn-cancelar").prop('disabled', false);
                    $("#btn-salvar").prop('disabled', false);
                },
                error: function(erro, ajaxOptions, mensagemError){
                    mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
                    $("#btn-cancelar").prop('disabled', false);
                    $("#btn-salvar").prop('disabled', false);
                }
            });

      }
      
    }
</script>