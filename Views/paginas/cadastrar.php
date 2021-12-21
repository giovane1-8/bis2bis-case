<div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>EMAIL EM USO</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Use outro email ou recupere a senha
            </div>
            <div class='modal-footer'>
                <a href='<?php echo VENDOR_PATH ?>login/recuperarsenha'> <button class='btn btn-primary'>RECUPERAR SENHA</button><a>
                        <a href='<?php echo VENDOR_PATH ?>login'> <button class='btn btn-primary'>Fazer Login</button><a>
            </div>
        </div>
    </div>
</div>



<div class='modal fade' id='senhaerr' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>As senhas não coincidem </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Confirme as senhas novamente
            </div>
        </div>
    </div>
</div>


<div class=" h-100 d-flex text-center ">

    <div class="mx-auto">

        <div class="d-flex">
            <form method="POST" action="<?php echo VENDOR_PATH."home/cadastrar" ?>">
                    <div class="form-group">
                        <label for="nome">Nome e sobrenome</label>
                        <input type="text" class="form-control" maxlength="45" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" value="<?php if (isset($_SESSION["nm_nome"])) {
                                                                                                                                                                    echo $_SESSION["nm_nome"];
                                                                                                                                                                } ?>" required>
                    </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" maxlength="45" name="email" id="email" aria-describedby="emailHelp" placeholder="Seu email" value="<?php if (isset($_SESSION["nm_email"])) {
                                                                                                                                                                    echo $_SESSION["nm_email"];
                                                                                                                                                                } ?>" required>
                    <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" maxlength='45' name="senha" class="form-control" id="senha" placeholder="Senha" value="<?php if (isset($_SESSION["nm_senha"])) {
                                                                                                                                        echo $_SESSION["nm_senha"];
                                                                                                                                    } ?>" required>
                </div>
                <div class="form-group">
                    <label for="confirmaSenha">Confirmar senha:</label>
                    <input type="password" maxlength='45' name="confirmaSenha" class="form-control" id="confirmaSenha" placeholder="Confirmar senha" value="" required>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href=" <?php echo VENDOR_PATH ?>" class="darkmode-ignore btn btn-dark">Click aqui se ja tiver um login</a>

            </form>
        </div>
    </div>
</div>