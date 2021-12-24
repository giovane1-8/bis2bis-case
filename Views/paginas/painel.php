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
<link rel="stylesheet" type="text/css" href="<?php echo VENDOR_PATH ?>recursos/css/jquery.Jcrop.css" />
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
        <form action="<?php echo VENDOR_PATH; ?>painel/atualizar/nome" method="POST">

            <div class="form-group">
                <label for="nome">Nome e sobrenome</label>

                <div class="input-group mb-3">
                    <input type="text" maxlength="45" class="form-control disable" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" value='<?php echo $_SESSION["nm_usuario"]; ?>'>

                    <div class="input-group-append">

                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Atualizar</button>
                    </div>
                </div>
        </form>

        <form action="<?php echo VENDOR_PATH; ?>painel/atualizar/email" method="POST">

            <label for="email">Email</label>

            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Seu email" value="<?php echo $_SESSION["nm_email"]; ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Atualizar</button>
                </div>
            </div>
        </form>

        <form action="<?php echo VENDOR_PATH; ?>painel/atualizar/senha" method="POST">

            <label for="senha">Senha</label>
            <div class="input-group mb-3">

                <input type="password" name="senha" class="form-control" id="senha" value="<?php echo base64_decode($_SESSION["nm_senha"]); ?>">

                <div class="input-group-append">
                    <button class="btn btn-outline-info" type="button" id="senhaToggle" onclick='mostrarSenha(_("senha"),_("senhaToggle"))'>mostrar</button>
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Atualizar</button>

                </div>
            </div>
        </form>
        <script>
            function mostrarSenha(input, button) {
                if (input.type == "text") {
                    input.type = "password"
                    button.innerHTML = "Mostrar"
                } else if (input.type == "password") {
                    input.type = "text"
                    button.innerHTML = "Esconde"
                }
            }
        </script>


    </div>
</div>
</div>
<script>
</script>