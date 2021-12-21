<div style='color: black' class='modal fade' id='err' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>Email ou Senha <font color='red'>INCORRETOS</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Se não tiver um conta crie uma;
            </div>
            <div class='modal-footer'>
                <a href='<?php echo VENDOR_PATH ?>cadastrar'> <button class='btn btn-primary'>CRIAR UMA CONTA</button><a>
            </div>
        </div>
    </div>
</div>
<div class=" h-100 d-flex text-center ">

    <div class="mx-auto">
        <div style="max-width: 300px; color: red;">
            <h2>Você precisa esta logado para acessar o blog</h2>
        </div>

        <form class="col" method="post" action="#">

            <div class="form-group">
                <label for="exampleInputEmail1">Endereço de email ou Nickname</label>
                <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Seu email ou nickname" value="<?php if (isset($_SESSION["usuario"])) {
                                                                                                                                                    echo $_SESSION["usuario"];
                                                                                                                                                } ?>" required>
                <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
            </div>


            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Logar</button>

                <!-- <a href="#" class="btn btn-warning">esqueceu a senha</a> -->

            </div>
            <div class="container mt-2">
                <p>
                    <a href="<?php echo VENDOR_PATH ?>cadastrar" class="darkmode-ignore btn btn-dark">Click aqui para fazer cadastro</a>
                </p>
            </div>

        </form>
    </div>
</div>