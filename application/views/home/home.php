<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>


<main class="container d-flex justify-content-center flex-wrap p-0">
    <div id="menu-cursos" class="col-md-12 p-2 m-2">
        <!--Para fazer REST da busca recebe nome da busca e local da URL  da API-->        
        <h1 id="turmas-por-curso" data-url="<?php echo site_url('/');?>">Turmas por Curso</h1>
        <hr>
        <div class="" role="alert" id="mensagem"></div>
    </div>
</main>

<script>
    
$(function(){ 
    buscaTurmas();
});

function buscaTurmas(){
    /*
    * efetura o carregamento das informações das turmas por curso
     */
    var url_base =$("#turmas-por-curso").data('url')+'main/turma/';
    var local =  $("#turmas-por-curso").data('url')+'turma/turma_curso';

    $.ajax({
        type : "GET",
        url  : local,
        dataType : "JSON",
        beforeSend:function(){
            //Implementar
        },
        success: function(resposta){
            if (resposta.cursos.length != 0){
                resposta.cursos.forEach(function(curso){
                    var titulo = '<h4 style="color:'+curso[1]+'">'+curso[0]+'</h4>';
                    $('#menu-cursos').append(titulo);
                    if(curso[2].length != 0){
                        var menu_turma = '<ul class="menu-turma">';
                        curso[2].forEach(function(turma){
                            menu_turma += '<li><a href="'+url_base+turma.id+'"><i class="fas fa-arrow-right"></i> '+turma.sigla+' | '+turma.descricao+'</a></li>';
                        });
                        menu_turma +='<li><hr class="divisor"></li>';
                        menu_turma +='</ul>';

                        $('#menu-cursos').append(menu_turma);
                    }
                });
            }
        },
        error: function(erro, ajaxOptions, mensagemError){
                mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
    });   
}

</script>


