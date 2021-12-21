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
            });




            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')            
            $this->view->render("home", 'Home');
        } else {
            if (!empty($_POST)) {
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $_SESSION['usuario'] = $this->dados['usuario'];
                $this->model->validarLogin($dados);
                if ($this->model->getResultado()) {
                    header("location: " . VENDOR_PATH);
                } else {
                    header("location: " . VENDOR_PATH . "home/erro");
                }
            }

            \Router::rota("home/erro", function () {
                $this->view->render("login", 'Erro Login');
                $this->view->errMsg();
            });
            
            \Router::rota("home/cadastrar", function () {
                $this->view->render("cadastrar", 'Cadastro');
            });
            $this->view->render("login", 'Home');
        }
    }
}
