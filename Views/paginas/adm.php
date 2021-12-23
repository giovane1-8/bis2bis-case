<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog bd-example-modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Editar e excluir Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo VENDOR_PATH . "adm/alterarUsuario" ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Id: </span>
                        </div>
                        <p type="text" class="form-control" id="iduser" aria-describedby="emailHelp" placeholder="Seu nome"></p>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nome e sobrenome</span>
                        </div>
                        <input type="text" class="form-control" maxlength="45" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                        </div>
                        <input type="email" class="form-control" maxlength="45" name="email" id="email" aria-describedby="emailHelp" placeholder="Seu email" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Privilegios</span>
                        </div>
                        <select class="form-control" name="privilegio" id="privilegio">
                            <option value="">Nenhum</option>
                            <option value="gm">Administrador Geral</option>
                            <option value="mod">Moderador</option>

                        </select>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Senha</span>
                        </div>
                        <input type="password" maxlength='45' name="senha" class="form-control" id="senha" placeholder="Senha" required>
                        <div class="input-group-append">
                            <input class="form-control" type="button" id="toogleSenhaId" value="Mostrar">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-primary" value="Salvar mudanças">
                <a type="button" class="btn btn-danger">Excluir usuario</a>
            </div>
            </form>

        </div>
    </div>
</div>
<h1> Editar ou Excluir usuario: </h1>
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

                        dropdownMenu.innerHTML += "<label id='" + user['id_usuario'] + "' style='cursor: pointer; color: black;' class='dropdown-item'><input type='button'  value='" + user['id_usuario'] + "' name='usuarios[]'> " + user['nm_email'] + "</label>";


                    });
                },
                error: function(obg, erro, op) {
                    console.log(erro)
                },
                complete: function(obg, msn) {
                    iniciarEvento()
                }
            })



        })

        function iniciarEvento() {

            $("input[name='usuarios[]']").on("click", function() {
                $("#ExemploModalCentralizado").modal("show");
                $.ajax({
                    dataType: "json",
                    url: DEFAULT_PATH + "adm/getUserById",
                    data: {
                        id_usuario: $(this).val()
                    },
                    method: "POST",
                    success: function(dados, string, obg) {
                        console.log(dados)
                        $("#iduser").text(dados["id_usuario"])
                        $("#nome").val(dados["nm_usuario"])
                        $("#privilegio").val(dados["nm_privilegio"])

                        $("#email").val(dados["nm_email"])
                        $("#senha").val(dados["nm_senha"])
                    },
                    error: function(obg, erro, op) {
                        console.log(erro)
                    },
                    complete: function(obg, msn) {

                    }
                })
            })
        }
        $("#toogleSenhaId").on("click", () => {
            input = _("senha")
            botao = _("toogleSenhaId")
            if (input.type == "text") {
                input.type = "password";
                botao.value = "Mostrar"
            } else {
                input.type = "text";
                botao.value = "Esconder"
            }
        })

    })
</script>