<?php
/*
 * Classe controller da pagina post
*/

namespace Controllers;

class PostController extends Controller
{
    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }
    public function index()
    {
        if ($_SESSION["isLogado"]) {


            \Router::rota("post/infiteScrool", function () {
                if (!empty($_POST)) {
                    $dados = $this->model->getOnePosts($_POST["offset"]);
                    $this -> view ->echoString($dados);
                }
            });
            \Router::rota("post/procurarPost", function () {
                if (!empty($_POST)) {
                    $request = $_POST["post"];
                    $dados = $this->model->procurarPost($request);
                    $this -> view ->echoString($dados);
                }
            });

            \Router::rota("post/view/?/delete", function ($par) {
                $dados = $this->model->getPostById($par[2]);

                if ($_SESSION['nm_privilegio'] == "gm" || $_SESSION['id_usuario'] == $dados["id_usuario"]) {
                    $this->model->deletePost($par[2]);
                    $this->view->render("painel", 'Painel de Usuario', "navbar", "navfooter");
                    $this->view->msnDelSucc();
                } else {
                    header("location: " . VENDOR_PATH . "post/view/" . $par[2]);
                    die("Recarregue a pagina");
                }
            });
            \Router::rota("post/view/?", function ($par) {
                $dados = $this->model->getPostById($par[2]);



                if (!empty($dados)) {
                    if ($_SESSION['nm_privilegio'] == "gm" || $_SESSION['id_usuario'] == $dados["id_usuario"]) {
                        if (!empty($_POST)) {
                            $dados = array_merge($dados, filter_input_array(INPUT_POST, FILTER_DEFAULT));
                            $dados['data'] = date('Y/m/d');
                            $this->model->alterarPost($dados);
                            $dados = $this->model->getPostById($par[2]);
                            $dados = array_merge($dados, $this->model->getUserById($dados['id_usuario']));
                            $this->view->dados = $dados;
                            $this->view->render("postview", 'Post', "navbar", "navfooter");
                            $this->view->msnAltSucc();
                            die();
                        }
                    }
                    $dados = array_merge($dados, $this->model->getUserById($dados['id_usuario']));
                    $this->view->dados = $dados;
                    $this->view->render("postview", 'Post', "navbar", "navfooter");
                } else {
                    $this->view->render("postview", 'Post', "navbar", "navfooter");
                    $this->view->msnErro();
                }
            });

            if ($_SESSION['nm_privilegio'] == "gm" ||  $_SESSION['nm_privilegio'] == "mod") {
                $this->view->render("post", 'Postar', "navbar", "navfooter");


                if (!empty($_POST)) {
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $dados['data'] = date('Y/m/d');

                    $this->model->newPost($dados);
                    if ($this->model->getResultado()) {
                        header("location: " . VENDOR_PATH . "post/sucesso");
                        die("recarregue a Pagina");
                    } else {
                        header("location: " . VENDOR_PATH . "post/erro");
                        die("recarregue a Pagina");
                    }
                }

                \Router::rota("post/erro", function () {
                    $this->view->errMsg();
                });

                \Router::rota("post/sucesso", function () {
                    $this->view->sucessMsg();
                });
            } else {
                header("location: " . VENDOR_PATH);
            }
        } else {
            header("location: " . VENDOR_PATH);
        }
    }
}
