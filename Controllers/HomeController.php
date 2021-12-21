<?php
/*
 * Classe controller da pagina home
*/

namespace Controllers;

class HomeController extends Controller
{
    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }
    public function index()
    {
        if ($_SESSION['isLogado']) {

            \Router::rota("home/sair", function () {
                session_destroy();
                $_SESSION['isLogado'] = false;
                header("Location: " . VENDOR_PATH);
                die("recarregue a Pagina");
            });




            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')            
            $this->view->render("home", 'Home');
        } else {

            \Router::rota("home/login", function () {
                if (!empty($_POST)) {
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $_SESSION['usuario'] = $this->dados['usuario'];
                    $this->model->validarLogin($dados);
                    if ($this->model->getResultado()) {
                        header("location: " . VENDOR_PATH);
                        die("recarregue a Pagina");
                    } else {
                        header("location: " . VENDOR_PATH . "home/erro");
                        die("recarregue a Pagina");
                    }
                }
            });


            \Router::rota("home/erro", function () {
                $this->view->render("login", 'Erro Login');
                $this->view->errMsg();
            });

            \Router::rota("home/cadastrar", function () {
                $this->view->render("cadastrar", 'Cadastro');
                if (!empty($_POST)) {

                    $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $_SESSION["nm_usuario"] = trim($this->dados["nome"]);
                    $_SESSION["nm_nickname"] = trim($this->dados["nickname"]);
                    $_SESSION["nm_email"] = trim($this->dados["email"]);
                    $_SESSION["nm_senha"] = trim($this->dados["senha"]);
                    $_SESSION['nm_cor_favorita'] = trim($this->dados["cor"]);
                    if (!empty($this->dados["nome"]) && !empty($this->dados["nickname"]) && !empty($this->dados["email"]) && !empty($this->dados["senha"]) && !empty($this->dados["cor"])) {
                        if ($this->model->verificarEmail($this->dados["email"])) {
                            $_SESSION['usuario'] = $this->dados["email"];
                            header("Location: " . VENDOR_PATH . "cadastrar/emailemuso");
                            die('recarregue a pagina');
                        } elseif ($this->model->verificarNickname($this->dados["nickname"])) {
                            $_SESSION['usuario'] = $this->dados["nickname"];
                            header("Location: " . VENDOR_PATH . "cadastrar/nicknameemuso");
                            die('recarregue a pagina');
                        } else {
                            $this->model->cadastrarUsuario($this->dados);
                        }
                    }


                    if ($this->model->getResultado()) {
                        header("Location: " . VENDOR_PATH . "login/cadastro");
                    } else {
                        header("Location: " . VENDOR_PATH . "cadastrar/erro");
                    }
                }
            });
            $this->view->render("login", 'Home');
        }
    }
}
