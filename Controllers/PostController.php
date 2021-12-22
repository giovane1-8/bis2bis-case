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

        \Router::rota("post/view/?/delete", function ($par) {
            echo $par[2];
            $dados = $this->model->getPostById($par[2]);

        });
        
        \Router::rota("post/view/?", function ($par) {
            $dados = $this->model->getPostById($par[2]);

            if (!empty($dados)) {
                $dados = array_merge($dados, $this->model->getUserById($dados['id_usuario']));
                $this->view->dados = $dados;
                $this->view->render("postview", 'Post', "navbar", "navfooter");
            } else {
                $this->view->render("postview", 'Post', "navbar", "navfooter");
                $this->view->msnErro();
            }
        });

        if ($_SESSION["isLogado"] && $_SESSION['nm_privilegio'] == "gm") {
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
    }
}
