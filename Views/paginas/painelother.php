<div class='modal fade' id='sucessoModal' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>Post
                    <font color='red'>deletado</font>
                    com
                    <font color='green'>SUCESSO</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<link href="<?php echo VENDOR_PATH ?>recursos/css/simditor.css" rel="stylesheet" type="text/css" />

<div class="modal modal_alert_painel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex col">
                <output id="result"></output>
            </div>
            <div id="modal-footer" class="modal-footer">

            </div>
        </div>
    </div>
</div>
<div class="row card-deck mt-3">




    <div class="container form-group col-lg-6">

            <div class="form-group">
                <label for="nome">Nome e sobrenome</label>

                <div class="input-group mb-3">
                    <p type="text" maxlength="45" class="form-control disable" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" ><?php echo $this->dados["nm_usuario"]; ?></p>

                </div>



           
     

      
    </div>
</div>
<div id="userConteudo" class="container"></div>
<script>
    window.addEventListener("load", function() {
        var limiteoffset = 0

        function carregarPostUserAjax() {
            $.ajax({
                dataType: "json",
                url: DEFAULT_PATH + 'painel/infiteScrool/<?php echo $this->dados["id_usuario"] ?>', //Página PHP que seleciona postagens
                method: 'POST', // método post, GET ...
                data: {
                    offset: limiteoffset
                }, //seus paramêtros
                success: function(dados) { // sucesso de retorno executar função

                    data = dados["dt_post"].split("-");

                    $("#userConteudo").append("<div class='simditor bg-white mb-5'><div class='simditor-body'><font class='float-right mr-3' style='font-weight: 100;'>Postado em: <i>" + data[2] + "/" + data[1] + "/" + data[0] + " </i></font><center><h1><a href='" + DEFAULT_PATH + "post/view/" + dados['id_post'] + "'>" + dados['nm_titulo'] + "</a></h1></center>" + dados['nm_corpo'] + "</div></div>"); // adiciona o resultado na div #conteudo
                },
                error: function(x, y) {
                    console.log(x, y)
                } // fim success
            }); // fim ajax
            limiteoffset++
        }
        carregarPostUserAjax()
        $(document).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                //requisição ajax para selecionar postagens

                carregarPostUserAjax()


            } // fim do if
        }); // fim scroll
    })
</script>