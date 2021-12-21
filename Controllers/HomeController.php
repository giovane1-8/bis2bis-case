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
                    $_SESSION['nm_email'] = $dados['usuario'];
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
                if (!empty($_POST)) {

                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $_SESSION["nm_nome"] = trim($dados["nome"]);
                    $_SESSION["nm_email"] = trim($dados["email"]);
                    $_SESSION["nm_senha"] = trim($dados["senha"]);
                    if (!empty($dados["nome"]) && !empty($dados["email"]) && !empty($dados["senha"]) && !empty($dados["confirmaSenha"])) {
                        if ($this->model->verificarEmail($dados["email"])) {
                            $_SESSION['usuario'] = $dados["email"];
                            header("Location: " . VENDOR_PATH . "home/cadastrar/emailemuso");
                            die('recarregue a pagina');
                        } elseif ($dados["senha"] != $dados["confirmaSenha"]) {
                            $_SESSION['usuario'] = $dados["email"];
                            header("Location: " . VENDOR_PATH . "home/cadastrar/senha");
                            die('recarregue a pagina');
                        } else {
                            $this->model->cadastrarUsuario($dados);
                        }
                    }


                    if ($this->model->getResultado()) {
                        header("Location: " . VENDOR_PATH . "login/cadastro");
                    } else {
                        header("Location: " . VENDOR_PATH . "cadastrar/erro");
                    }
                }
                $this->view->render("cadastrar", 'Cadastro');
            });
            \Router::rota("home/cadastrar/emailemuso", function () {
                $this->view->render("cadastrar", "Cadastro");
                $this->view->msgEmail();
            });

            \Router::rota("home/cadastrar/senha", function () {
                $this->view->render("cadastrar", "Cadastro");
                $this->view->msgSenha();
            });
            $this->view->render("login", 'Home');
        }
    }
}
