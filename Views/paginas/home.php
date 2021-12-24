<link href="<?php echo VENDOR_PATH ?>recursos/css/simditor.css" rel="stylesheet" type="text/css" />

<center>
    <h1>Ultimos Posts</h1>
</center>
<div id="conteudo" style="overflow-y:auto;">

</div>
<script>
    window.addEventListener("load", function() {
        var limiteoffset = 0;

        $(document).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                //requisição ajax para selecionar postagens

                carregarPostAjax()


            } // fim do if
        }); // fim scroll
        function carregarPostAjax() {
            $.ajax({
                dataType: "json",
                url: DEFAULT_PATH + 'post/infiteScrool', //Página PHP que seleciona postagens
                method: 'POST', // método post, GET ...
                data: {
                    offset: limiteoffset
                }, //seus paramêtros
                success: function(dados) { // sucesso de retorno executar função

                    data = dados["dt_post"].split("-");

                    $("#conteudo").append("<div class='simditor bg-white mb-5'><div class='simditor-body'><font class='float-right mr-3' style='font-weight: 100;'>Postado em: <i>" + data[2] + "/" + data[1] + "/" + data[0] + " </i></font><center><h1><a href='" + DEFAULT_PATH + "post/view/" + dados['id_post'] + "'>" + dados['nm_titulo'] + "</a></h1></center>" + dados['nm_corpo'] + "</div></div>"); // adiciona o resultado na div #conteudo
                } // fim success
            }); // fim ajax
            limiteoffset++
        }
        carregarPostAjax()
        carregarPostAjax()

    })
</script>