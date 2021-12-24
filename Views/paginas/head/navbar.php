<?php include_once("head.php") ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="navbar" style="transition: 0.5s;">
  <a class="navbar-brand" href="<?php echo VENDOR_PATH ?>">Blog GL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto nav-pills nav-fill mx-auto">

      <?php if ($_SESSION['isLogado']) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo VENDOR_PATH ?>painel">Painel de usuario</a>
        </li>

        <?php if ($_SESSION['nm_privilegio'] == "gm" || $_SESSION['nm_privilegio'] == "mod") : ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo VENDOR_PATH ?>post">Post</a>
          </li>
        <?php endif; ?>

          <?php if ($_SESSION['nm_privilegio'] == "gm") : ?>

          <li class="nav-item ">
            <a class="nav-link" href="<?php echo VENDOR_PATH ?>adm">Administração</a>
          </li>
        <?php endif; ?>

        <li class="nav-item ">
          <a class="nav-link" style="color: red" href="<?php echo VENDOR_PATH ?>home/sair">Sair</a>
        </li>

      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo VENDOR_PATH ?>login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo VENDOR_PATH ?>cadastrar">Cadastrar</a>
        </li>


      <?php endif; ?>


    </ul>
    <div class="form-inline my-2 my-lg-0">

      <div class="dropdown">
        <input class="form-control mr-sm-2 dropdown-toggle" type="search" id="pesquisarPostAjax" placeholder="Pesquisar" aria-label="Pesquisar" data-toggle="dropdown">

        <div class="dropdown-menu" autocomplete = "off" id='dropPesquisa' aria-labelledby="dropdownMenuButton">

        </div>

      </div>
      </div>
  </div>
</nav>