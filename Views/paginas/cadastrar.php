<div class=" h-100 d-flex text-center ">

    <div class="mx-auto">

        <div class="d-flex">
            <form method="POST" action="#">
                    <div class="form-group">
                        <label for="nome">Nome e sobrenome</label>
                        <input type="text" class="form-control" maxlength="45" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" value="<?php if (isset($_SESSION["nm_usuario"])) {
                                                                                                                                                                    echo $_SESSION["nm_usuario"];
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
                    <input type="password" maxlength='45' name="confirmaSenha" class="form-control" id="confirmaSenha" placeholder="confirmaSenha" value="<?php if (isset($_SESSION["nm_senha"])) {
                                                                                                                                        echo $_SESSION["nm_senha"];
                                                                                                                                    } ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href=" <?php echo VENDOR_PATH ?>" class="darkmode-ignore btn btn-dark">Click aqui se ja tiver um login</a>

            </form>
        </div>
    </div>
</div>