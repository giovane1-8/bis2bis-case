<div class="dropdown mt-3">
    <input class="form-control mr-sm-2 dropdown-toggle" type="search" id="pesquisarUserAjax" placeholder="Pesquisar Usuario" aria-label="Pesquisar" data-toggle="dropdown">

    <div class="dropdown-menu" style="height:200px; overflow-y:auto;" id="ajaxUsers" aria-labelledby="dropdownMenuButton">

    </div>

</div>

<script>
    var limiteoffset = 0;

    window.addEventListener("load", function() {

        $(document).on('click', '.dropdown-item', function(event) {
            event.stopPropagation();
        });

        function carregarUsersAjax() {


            $.ajax({
                dataType: "json",
                url: DEFAULT_PATH + 'adm/userScroll', //Página PHP que seleciona postagens
                method: 'POST', // método post, GET ...
                data: {
                    offset: limiteoffset
                }, //seus paramêtros
                success: function(users) { // sucesso de retorno executar função

                    elementopai = $("#ajaxUsers").children()
                    count = 0
                    users.forEach(dados => {
                        if (elementopai[count].id != dados["id_usuario"]) {
                            $("#ajaxUsers").append("<label  id='" + dados['id_usuario'] + "' style='cursor: p!ointer; color: black;' class='dropdown-item'><input type='button' value='" + dados['id_usuario'] + "' name='usuarios[]'>" + dados['nm_email'] + "</label>");
                        }
                    })
                },
                error: function(obg, erro, op) {
                    console.log(erro)
                },
                complete: function(obg, msn) {} // fim success
            }); // fim ajax
            limiteoffset = limiteoffset + 6
        }
        $("#ajaxUsers").scroll(function() {
            if ($(this).scrollTop() + $(this).height() + 16 == $(this).get(0).scrollHeight) {
                //requisição ajax para selecionar postagens
                carregarUsersAjax()
            } // fim do if
        }); // fim scroll
        $("#pesquisarUserAjax").keyup(function() {
            dropdownMenu = document.querySelector("#ajaxUsers");
            $.ajax({
                dataType: "json",
                url: DEFAULT_PATH + "adm/userScroll",
                data: {
                    offset: 0,
                    nm_usuario: $("#pesquisarUserAjax").val()
                },
                method: "POST",
                success: function(dados, string, obg) {
                    dropdownMenu.innerHTML = ""
                    limiteoffset = 0
                    dados.forEach(user => {

                        dropdownMenu.innerHTML += "<label id='" + user['id_usuario'] + "' style='cursor: pointer; color: black;' class='dropdown-item'><input type='button'  value='" + user['id_usuario'] + "' name='usuarios[]'>" + user['nm_email'] + "</label>";


                    });
                },
                error: function(obg, erro, op) {
                    console.log(erro)
                },
                complete: function(obg, msn) {
                    if ($("#ajaxUsers")[0].childElementCount < 6) {

                        carregarUsersAjax()

                    }
                }
            })


        })

    })
</script>