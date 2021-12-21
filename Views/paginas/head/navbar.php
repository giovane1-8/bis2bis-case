<?php include_once("head.php") ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="navbar" style="transition: 0.5s;">
      <a class="navbar-brand" href="<?php echo VENDOR_PATH ?>">MangasKindles</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto nav-pills nav-fill">
          <li class="col nav-item">
            <a class="nav-link" href="#">vip</a>
          </li>
          <li class="col nav-item">
            <a class="nav-link" href="#">contato</a>
          </li>
          <?php if ($_SESSION['isLogado']) : ?>
            <li class="col nav-item">
              <a class="nav-link" style="color: <?php echo $_SESSION['nm_cor_favorita'] ?>" href="<?php echo VENDOR_PATH ?>painel"><?php echo $_SESSION['nm_nickname'] ?></a>
            </li>
            <li class="col nav-item">
              <a class="nav-link" style="color: red" href="<?php echo VENDOR_PATH ?>login/sair">Sair</a>
            </li>

          <?php else : ?>
            <li class="col nav-item">
              <a class="nav-link" href="<?php echo VENDOR_PATH ?>login">Login</a>
            </li>
            <li class="col nav-item">
              <a class="nav-link" href="<?php echo VENDOR_PATH ?>cadastrar">Cadastrar</a>
            </li>
          <?php endif; ?>

          <?php if (@$_SESSION['nm_vip'] == "gm") : ?>
            <center>
              <div class="dropdown">
                <a class="nav-link dropdown-toggle" style="cursor: pointer;" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  configurações do servidor
                </a>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                  <a class="dropdown-item" href="<?php echo VENDOR_PATH ?>setup">Adicionar dados</a>
                  <a class="dropdown-item" href="<?php echo VENDOR_PATH ?>setup/excluir">Excluir dados</a>
                </div>
              </div>
            </center>
          <?php endif; ?>

        </ul>
        <form autocomplete="off" class="form-inline my-2 my-lg-0">

          <div class="dropdown">
            <input class="form-control mr-sm-2 dropdown-toggle" type="search" id="pesquisarMangaAjax" placeholder="Pesquisar" aria-label="Pesquisar" data-toggle="dropdown">

            <div class="dropdown-menu" id='dropPesquisa' aria-labelledby="dropdownMenuButton">

            </div>

          </div>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
    </nav>