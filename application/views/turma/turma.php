<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<main class="container d-flex justify-content-center flex-wrap p-0">
    <div class="col-md-12 p-2 m-2">
        <!--Para fazer REST da busca recebe nome da busca e local da URL  da API-->        
        <h3 id="turma-atual" data-url="<?php echo site_url('/');?>" data-turma_id="<?php echo (isset($turma) ? $turma : 0);?>">Turma: <span id="turma_atual"></span><h3>
        <hr>
        <div class="" role="alert" id="mensagem"></div>
    </div>
</main>
<nav id="pager" aria-label="Page navigation example">
    <ul id="paginas" class="pagination justify-content-center"></ul>
</nav>

<script>
$(function(){
    buscaTurma();
});

function buscaTurma(){
/*Após carregar a página, 
 efetua o post para busca considerando o parâmetro passado na tag h1 id turma-atual".
*/
    var local =  $("#turma-atual").data('url')+'/turma/busca_turma';
    var dados = {'busca':$("#turma-atual").data('turma_id')};
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: local,
        async: true,
        data: dados,
        beforeSend:function(){
            /* não implementado */
        },
        success: function(resposta) {     
            if(resposta.dados.length !=0){
                paginacao(resposta.dados);
                $("#turma_atual").text(resposta.sigla+ ' | '+resposta.curso);
                
            }else{
                mensagem('Atenção! ', 'Nenhum aluno encontrado', 'alert alert-warning');
            }  
        },
        error: function(erro, ajaxOptions, mensagemError){
            mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
        
    });
}

function paginacao(registros){
/*
 efetuar a paginação dos resultados utilizando a lib twbsPagination
*/
    var regporPagina = 6;
    var paginas = Math.ceil(registros.length / regporPagina);
    $('#paginas').twbsPagination({
        totalPages: paginas,
        visiblePages: 3,
        onPageClick: function (event, page) {
           paginar(registros, page, regporPagina);
           //reposiciona página para o top
           window.scrollTo(0, 0);
        }
    });
}

function paginar(registros, pagina, regporpagina){
/* 
    Efetua ação de apontar os registros que vão ser exibidos na tela.
*/

    $(".ficha").remove();

    //inireg aponsta para o primerio registro da página a ser exibida
    var inireg = regporpagina *(pagina-1);
    for(var i=0; i < regporpagina; i++){
        if (inireg <= (registros.length) -1){
            montafichas(registros[inireg]);
            inireg++;
        }else{
            break;
        }
    }

}

function montafichas(aluno){
/* 
    Essa função apenas recebe os dados e 
    efetuar apresentação na tela conforme ordenação da função anterior.
*/
    var ficha = '<div class="ficha p-2 card col-xs-12 m-2">'+
        '<a href="'+aluno.local+'"><div class="d-flex p-2 mb-2 bd-highlight text-light" style="background:'+aluno.cor_curso+'">'+aluno.turma+' | '+aluno.curso+'</div></a>'+        
        '<div class="d-flex flex-wrap">'+
            '<div class="foto col-md-5 d-flex justify-content-center" >'+
                '<img class="foto-ficha img-thumbnail" src="'+aluno.foto+'" alt="">'+
            '</div>'+

            '<div class="info col-md-7 d-flex flex-column justify-content-center">'+
                '<div class="mt-3">'+
                    '<p class="m-0 lh-1"><span class="font-weight-bolder">Aluno: </span>'+aluno.nome+'</p>'+
                    '<p class="m-0 ms-4"><span class="font-weight-bolder">Tel: </span>'+aluno.fone_aluno+'</p>'+
                    '<p class="m-0 ms-4"><span class="font-weight-bolder">email: </span>'+aluno.email_aluno+'</p>'+
                '</div>'+

                '<div class="mt-3">'+
                    '<p class="m-0 lh-1"><span class="font-weight-bolder">Mãe: </span>'+aluno.mae+'</p>'+
                    '<p class="m-0 ms-4"><span class="font-weight-bolder">Tel: </span>'+aluno.fone_mae+'</p>'+
                '</div>'+

                '<div class="mt-3">'+
                    '<p class="m-0 lh-1"><span class="font-weight-bolder">Pai: </span>'+aluno.pai+'</p>'+          
                    '<p class="m-0 ms-4"><span class="font-weight-bolder">Tel: </span>'+aluno.fone_pai+'</p>'+
                '</div>'+
            '</div>'+
        '</div>'+

        '<div class="d-flex mt-3">'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Matrícula: </span>'+aluno.matricula+'</p>'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">PNE: </span>'+aluno.pne+'</p>'+
        '</div>'+
        '<p class="m-0"><span class="font-weight-bolder text-nowrap">OBS: </span>'+aluno.obs+'</p>'+
        ''+
    '</div>';

    $("main").append(ficha);
}

</script>