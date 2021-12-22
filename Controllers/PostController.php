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
