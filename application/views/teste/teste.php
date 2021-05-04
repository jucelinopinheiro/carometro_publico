<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<main class="container d-flex justify-content-center flex-wrap p-0">
    <div class="col-md-12 p-2 m-2">
        <!--Para fazer REST da busca recebe nome da busca e local da URL  da API-->        
        <h5>Busca Por: <span id="aluno-matricula" data-url="<?php echo site_url('');?>">12346</span></h5>
        <hr>
        <div class="" role="alert" id="mensagem"></div>
    </div>
    
</main>



<!-- MODAL criar ocorrencia -->
<form id="nova-ocorrencia">
    <div class="modal fade" id="Modal_Novaocorrencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Criar ocorrência</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Aluno:</label>
                        <div class="col-md-10">
                            <input type="text" id="aluno_nome" class="form-control" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Descrição:</label>
                        <div class="col-md-10">
                          <textarea class="form-control" id="descricao" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btn-cancelar" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="button" class="btn btn-success" id="btn-salvarocorrencia"><i class="fas fa-save"></i> Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL Criar ocorrencia-->

<!-- MODAL editar ocorrencia -->
<form id="editar-ocorrencia">
    <div class="modal fade" id="Modal_Editaocorrencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ocorrência</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Aluno:</label>
                        <div class="col-md-10">
                            <input type="text" id="aluno_nome_ocorrencia" class="form-control" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Descrição:</label>
                        <div class="col-md-10">
                          <textarea class="form-control" id="descricao_ocorrencia" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btn-cancelar" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="button" class="btn btn-success" id="btn-atualizar"><i class="fas fa-save"></i> Atualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL editar ocorrencia-->

<!-- Modal Editar dados do aluno -->
<div class="modal fade" id="Modal_Dados_aluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Aluno(a): <span id="m_matricula_aluno"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="m_nome_aluno">Nome</label>
                            <input type="text" class="form-control" id="m_nome_aluno" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="m_nascimento">Nascimento</label>
                            <input type="date" class="form-control" id="m_nascimento" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="m_email_aluno">Email</label>
                            <input type="email" class="form-control" id="m_email_aluno" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="m_fone_aluno">Tel: Aluno</label>
                            <input type="text" class="form-control" id="m_fone_aluno" placeholder="">
                            <small class="form-text text-muted">Ex:(11) 912344567</small>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="m_nome_mae">Mãe</label>
                            <input type="text" class="form-control" id="m_nome_mae" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="m_fone_mae">Tel: Mãe</label>
                            <input type="text" class="form-control" id="m_fone_mae" placeholder="">
                            <small class="form-text text-muted">Ex:(11) 912344567</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="m_nome_pai">Pai</label>
                            <input type="text" class="form-control" id="m_nome_pai" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="m_fone_pai">Tel: Pai</label>
                            <input type="text" class="form-control" id="m_fone_pai" placeholder="">
                            <small class="form-text text-muted">Ex:(11) 912344567</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="m_pne">PNE</label>
                            <select id="m_pne" class="form-control">
                                <option value="">---</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div> 
                        <div class="form-group col-md-10">
                            <label for="m_obs">OBS</label>
                            <input type="text" class="form-control" id="m_obs" placeholder="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="btn-atualiazar"><i class="fas fa-save"></i> Atualizar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Editar dados do aluno -->

<!--MODAL dialogo -->
<div class="modal fade" id="Modal_dialogo" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atenção!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modal-messagem"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
        <button type="button" id="confirma-exclusao" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
      </div>
    </div>
  </div>
</div>
<!--END MODAL dialogo -->

<script>
$(function(){
    buscafichaAluno();
    $("#btn-salvarocorrencia").click(salvarocorrencia);
    $("#btn-atualizar").click(atualizarocorrencia);
    $("#btn-cancelar").on('click', function(){
        limpaCampos("#nova-ocorrencia");
    });


}); //end ready

function editarAluno(){

    var local =  $("#aluno-matricula").data('url')+'aluno/ficha_aluno';
    var dados = {'busca':$("#aluno-matricula").text()};
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
            if(resposta.ficha.length !=0){
                $("#m_matricula_aluno").text(resposta.ficha.matricula);
                $("#m_nome_aluno").val(resposta.ficha.nome);
                $("#m_nascimento").val(resposta.ficha.datanasc);
                $("#m_email_aluno").val(resposta.ficha.email_aluno);
                $("#m_fone_aluno").val(resposta.ficha.fone_aluno);
                $("#m_nome_pai").val(resposta.ficha.pai);
                $("#m_nome_mae").val(resposta.ficha.mae);
                $("#m_fone_pai").val(resposta.ficha.fone_pai);
                $("#m_fone_mae").val(resposta.ficha.fone_mae);
                $("#m_pne").val( $('option:contains('+resposta.ficha.pne+')').val() );
                $("#m_obs").val(resposta.ficha.obs);
                $("#Modal_Dados_aluno").modal({
                    backdrop:'static',
                    keyboard:false
                });

                $("#btn-atualiazar").click(function(){
                    atualizarAluno();
                });
            }else{
               
            }  
        },
        error: function(erro, ajaxOptions, mensagemError){
            mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
    });

   
}

function atualizarAluno(){
    var local =  $("#aluno-matricula").data('url')+'aluno/atualizar_aluno';
    var dados = {
        'matricula':$("#m_matricula_aluno").text(),
        'nome_aluno': $("#m_nome_aluno").val(),
        'nascimento':$("#m_nascimento").val(),
        'email_aluno':$("#m_email_aluno").val(),
        'fone_aluno': $("#m_fone_aluno").val(),
        'mae':$("#m_nome_mae").val(),
        'fone_mae':$("#m_fone_mae").val(),
        'pai':$("#m_nome_pai").val(),
        'fone_pai':$("#m_fone_pai").val(),
        'pne':$("#m_pne").val(),
        'obs':$("#m_obs").val()
    };

    $.ajax({
        type : "POST",
        url  : local,
        dataType : "JSON",
        data : dados,
        beforeSend:function(){
            $("#btn-atualizar").prop('disabled', true);
        },
        success: function(resposta){
            if(resposta.resposta == true){
                $("#btn-atualizar").prop('disabled', false);
                $('#Modal_Dados_aluno').modal('hide');
                //reposiciona página para o top
                 window.scrollTo(0, 0);
                mensagem('Sucesso!', resposta.mensagem, 'alert alert-success');
                buscafichaAluno();
            }
            else{
                $("#btn-atualizar").prop('disabled', false);
                $('#Modal_Dados_aluno').modal('hide');
                //reposiciona página para o top
                 window.scrollTo(0, 0);
                mensagem('Erro!', resposta.mensagem, 'alert alert-danger');
            }
            
        },
        error: function(erro, ajaxOptions, mensagemError){
            mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
    });   


}

function criarocorrencia(){
    //abre modal com informações para fazer o POST de uma nova ocorrência.
    $("#aluno_nome").val($("#ficha").data('nome'));
    matricula = $("#ficha").data('matricula');
    $("#Modal_Novaocorrencia").modal({
        backdrop:'static',
        keyboard:false
    });
}

function salvarocorrencia(){
    // salva ocorrência criada via post
    var local =  $("#aluno-matricula").data('url')+'aluno/salva_ocorrencia';
    var dados = {
    'matricula': matricula,
    'descricao':$("#descricao").val()
    };

    $.ajax({
        type : "POST",
        url  : local,
        dataType : "JSON",
        data : dados,
        beforeSend:function(){
            $("#btn-salvarocorrencia").prop('disabled', true);
        },
        success: function(resposta){
            limpaCampos("#nova-ocorrencia");
            $("#btn-salvarocorrencia").prop('disabled', false);
            $('#Modal_Novaocorrencia').modal('hide');
            //reposiciona página para o top
            window.scrollTo(0, 0);
            mensagem('Sucesso!', resposta.mensagem, 'alert alert-success');
            buscaOcorrencias();
        },
        error: function(erro, ajaxOptions, mensagemError){
                mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
    });   

}

function editarOcorrencia(dados){
    /**
        essa função recebe objeto que foi clicado
        passa os parametros para o modal editar ocorrência
        os dados vem da ficha_ocorrencia
     */
    var seletor = '#'+$(dados).data('id');
    id_ocorrencia = $(dados).data('id');
    $("#aluno_nome_ocorrencia").val($("#ficha").data('nome'));
    $("#descricao_ocorrencia").val($(seletor).text());
    $("#Modal_Editaocorrencia").modal({
        backdrop:'static',
        keyboard:false
    });

}

function atualizarocorrencia(){
     // atualiza ocorrência criada via post
    var local =  $("#aluno-matricula").data('url')+'aluno/atualiza_ocorrencia';
    var dados = {
    'id_ocorrencia': id_ocorrencia,
    'descricao':$("#descricao_ocorrencia").val()
    };

    $.ajax({
        type : "POST",
        url  : local,
        dataType : "JSON",
        data : dados,
        beforeSend:function(){
            $("#btn-atualizar").prop('disabled', true);
        },
        success: function(resposta){
            limpaCampos("#editar-ocorrencia");
            $("#btn-atualizar").prop('disabled', false);
            $('#Modal_Editaocorrencia').modal('hide');
            //reposiciona página para o top
            window.scrollTo(0, 0);
            mensagem('Sucesso!', resposta.mensagem, 'alert alert-success');
            buscaOcorrencias();
        },
        error: function(erro, ajaxOptions, mensagemError){
                mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
    });   
}

function excluirOcorrencia(id){
    $("#modal-messagem").text("Confirma mover ocorrência para lixeira? " +id);
    $("#confirma-exclusao").attr('data-id',id);
    $("#Modal_dialogo").modal({
        backdrop:'static',
        keyboard:false
    });

    $("#confirma-exclusao").on('click', function(){
        var local =  $("#aluno-matricula").data('url')+'aluno/excluir_ocorrencia';
        var dados = {'id_ocorrencia': id};
        $.ajax({
            type : "POST",
            url  : local,
            dataType : "JSON",
            data : dados,
            beforeSend:function(){
                $("#confirma-exclusao").prop('disabled', true);
            },
            success: function(resposta){
                if(resposta.resposta == true){
                    $("#confirma-exclusao").prop('disabled', false);
                    $("#Modal_dialogo").modal('hide');
                    //reposiciona página para o top
                    window.scrollTo(0, 0);
                    mensagem('Sucesso!', resposta.mensagem, 'alert alert-success');
                    buscaOcorrencias();
                }else{
                    $("#confirma-exclusao").prop('disabled', false);
                    $("#Modal_dialogo").modal('hide');
                    //reposiciona página para o top
                    window.scrollTo(0, 0);
                    mensagem('Erro!', resposta.mensagem, 'alert alert-danger');
                }
                
            },
            error: function(erro, ajaxOptions, mensagemError){
                $("#confirma-exclusao").prop('disabled', false);
                $("#Modal_dialogo").modal('hide');
                window.scrollTo(0, 0);
                mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
            }
        });
        
    });
}

function buscafichaAluno(){
/*Após carregar a página, 
 efetua o post para busca de aluno considerando o parâmetro passado na tag “span id="aluno-matricula".
*/
    var local =  $("#aluno-matricula").data('url')+'aluno/ficha_aluno';
    var dados = {'busca':$("#aluno-matricula").text()};
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
            if(resposta.ficha.length !=0){
                montaFicha(resposta.ficha);
                buscaOcorrencias();
            }else{
                mensagem('Atenção! ', 'Nenhum aluno encontrado', 'alert alert-warning');
            }  
        },
        error: function(erro, ajaxOptions, mensagemError){
            mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
    });
    
}

function buscaOcorrencias(){
/*Após carregar a página, 
 efetua o post para busca ocorrencias de cada aluno com base da tag “span id="aluno-matricula".
*/
    $(".ocorrencias").remove();
    var local =  $("#aluno-matricula").data('url')+'aluno/ficha_ocorrencias';
    var dados = {'busca':$("#aluno-matricula").text()};
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
            if(resposta.ocorrencias.length != 0){
                resposta.ocorrencias.forEach(function(ocorrencia){
                    montaOcorrencia(ocorrencia);
                });
            }else{
                semOcorrencia();
            }  
        },
        error: function(erro, ajaxOptions, mensagemError){
            mensagem('Erro!',erro.status + ' '+ mensagemError, 'alert alert-danger');
        }
    });
    
}


function montaFicha(aluno){
    $("#ficha").remove();
    var ficha = '<div id="ficha" class="ficha-aluno p-2 card col-xs-12 m-2" data-nome="'+aluno.nome+'" data-matricula="'+aluno.matricula+'">'+
        '<div class="d-flex p-2 mb-2 bd-highlight text-light" style="background:'+aluno.cor_curso+'">'+aluno.turma+' | '+aluno.curso+'</div>'+           
        '<div class="d-flex flex-wrap">'+
            '<div class="foto col-md-5 d-flex justify-content-center" >'+
                '<img class="foto-ficha img-thumbnail" src="'+aluno.foto+'" alt="Foto do Aluno(a)">'+
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
            '<p class="m-0 flex-fill"></p>'+
        '</div>'+

        '<div class="d-flex mt-3">'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Matrícula: </span>'+aluno.matricula+'</p>'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Turma: </span>'+aluno.turma+'</p>'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Termo: </span>'+aluno.termo+'</p>'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Turno: </span>'+aluno.turno+'</p>'+
        '</div>'+
        '<div class="d-flex">'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Nascimento: </span>'+aluno.datanasc+'</p>'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Maio de 18: </span>'+aluno.maior+'</p>'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">PNE: </span>'+aluno.pne+'</p>'+
        '</div>'+
        '<p class="m-0"><span class="font-weight-bolder text-nowrap">OBS: </span>'+aluno.obs+'</p>'+
        '<hr>'+   
        
        '<div class="d-flex bd-highlight mb-1">'+
            '<div class="mr-auto bd-highlight"><button class="btn btn-danger disabled" disabled><i class="fas fa-trash-alt"></i> Excluir</button></div>'+
            '<div class="mr-auto bd-highlight"><button class="btn btn-primary"  onclick="alterarFoto('+aluno.matricula+')"><i class="fas fa-portrait"></i> Alterar Foto</button></div>'+
            '<div class="ml-1 bd-highlight"><button class="btn btn-primary" onclick="window.history.back()" ><i class="fas fa-undo-alt"></i> Voltar</button></div>'+
            '<div class="ml-1 bd-highlight"><button class="btn btn-secondary" onclick="editarAluno()"><i class="fas fa-user-edit"></i> Editar</button></div>'+
            '<div class="ml-1 bd-highlight"><button class="btn btn-success" onclick="criarocorrencia()"><i class="far fa-file"></i> Criar Ocorrência</button></div>'+
        '</div>'+
    '</div>';

    $("main").append(ficha);

}

function semOcorrencia(){
    var sem_ocorrencia = '<div class="ocorrencias ficha-aluno p-2 card col-xs-12 m-2"><div class="d-flex p-2 mb-2 bd-highlight text-light bg-info"><span class="font-weight-bolder">Sem Ocorrências</span></div></div>';
    $("main").append(sem_ocorrencia);
}

function montaOcorrencia(ocorrencia){
    var ficha_ocorrencia = '<div class="ocorrencias ficha-aluno p-2 card col-xs-12 m-2">'+  
        '<div class="d-flex p-2 mb-2 bd-highlight text-light bg-info"><span class="font-weight-bolder">Ocorrência |</span>'+ocorrencia.criado_em+'</div>'+            
        '<div class="d-flex mt-3">'+
            '<p id="'+ocorrencia.id+'" class="m-0 flex-fill">'+ocorrencia.descricao+'</p>'+
        '</div>'+
        '<div class="d-flex mt-3">'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Criação: </span>'+ocorrencia.criado_em+'</p>'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Criado por: </span>'+ocorrencia.criado_por+'</p>'+
            '<p class="m-0 flex-fill"><span class="font-weight-bolder">Atulizado: </span>'+ocorrencia.atualizado+'</p>'+
        '</div>'+
        '<hr>'+
        '<div class="d-flex bd-highlight mb-1">'+
            '<div class="mr-auto bd-highlight"><button class="btn btn-danger" onclick="excluirOcorrencia('+ocorrencia.id+')"><i class="fas fa-trash-alt"></i> Excluir</button></div>'+
            '<div class="ml-1 bd-highlight"><button class="btn btn-secondary" onclick="editarOcorrencia(this)" data-id="'+ocorrencia.id+'"><i class="fas fa-user-edit"></i> Editar</button></div>'+
        '</div>'+
    '</div>';

    $("main").append(ficha_ocorrencia);

}

</script>