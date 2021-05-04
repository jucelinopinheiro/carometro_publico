$(function(){
    /**essa função escuta a busca na nav bar */
    $("#busca").click(buscaAluno);
    $("#nome_aluno").keypress(function(event){
        if(event.which == 13){
            event.preventDefault();
            buscaAluno();
        }
    });
});

function buscaAluno(){
    /** essa função faz o redirecionamento da pagina passando o nome de busca
     * para o controler
     */
    if ($("#nome_aluno").val() != '' && $("#nome_aluno").val() != undefined){
        var nome = $("#nome_aluno").val();
        var local = $("#busca_aluno").data('url');
        window.location.href = local+nome;
    }

}

function mensagem(titulo, frase, classeAlerta){

    /*Essa função recebe 3 pagramtros para criação de mensagens padronizadas nas telas */
    var corpoMensagem = $("#mensagem").find("p");
    corpoMensagem.remove();
    $("#mensagem").removeAttr('class')
    $("#mensagem").append("<p><strong>"+titulo+"</strong></p>");
    $("#mensagem").append("<p>"+frase+"</p>");
    $("#mensagem").attr('class', classeAlerta);  
    $("#mensagem").show();
    setTimeout(function(){
        $("#mensagem").hide();
    },5000);

}

function limpaCampos(formulario){
    /**Limpa campos  */
    $(formulario).trigger("reset");
}

