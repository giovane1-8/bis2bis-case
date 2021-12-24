<?php

namespace Controllers;

class PainelController extends Controller
{
    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }

    public function index()
    {
        if ($_SESSION["isLogado"]) {

            \Router::rota("painel/infiteScrool/?", function ($par) {
                if (!empty($_POST)) {
                    $dados = $this->model->getOnePostsByUserId($_POST["offset"], $par[2]);
                    $this->view->echoString($dados);
                }
            });

            \Router::rota("painel/otherUser/?", function ($par) {
                
                $this -> view->dados = $this->model->getUserById($par[2]);
                if(!empty($this -> view->dados)){
                    $this->view->render("painelother", 'Painel Do Usuario', "navbar", "navfooter");

                }else{
                    $this->view->render("painel", 'Painel Do Usuario', "navbar", "navfooter");
                }
            });

            \Router::rota("painel/atualizar/nome", function () {
                if (!empty($_POST['nome'])) {
                    $nome = trim($_POST['nome']);
                    if (strlen($nome) <= 45) {

                        if ($this->model->atualizar([$nome], ["nm_usuario"])) {
                            $_SESSION['nm_usuario'] = $nome;
                        };
                        header("location: " . VENDOR_PATH . "painel");
                    } else {
                        $this->view->render("painel", 'Painel Do Usuario');
                        $this->view->avisoModal("Numero maximo permitido é de 45 caracteres");
                    }
                } else {
                    header("location: " . VENDOR_PATH . "painel");
                }
            });


            \Router::rota("painel/atualizar/email", function () {
                if (!empty($_POST['email'])) {
                    $email = trim($_POST['email']);
                    if (!$this->model->verificarEmail($email)) {
                        if ($this->model->atualizar([$email], ["nm_email"])) {
                            $_SESSION['nm_email'] = $email;
                        };
                        header("location: " . VENDOR_PATH . "painel");
                    } else {
                        $this->view->render("painel", 'Painel Do Usuario');
                        $this->view->avisoModal("Email já esta em uso");
                    }
                } else {
                    header("location: " . VENDOR_PATH . "painel");
                }
            });
            \Router::rota("painel/atualizar/senha", function () {
                if (!empty($_POST['senha'])) {
                    $senha = base64_encode(trim($_POST['senha']));
                    if ($this->model->atualizar([$senha], ["nm_senha"])) {
                        $_SESSION['nm_senha'] = $senha;
                    };
                    header("location: " . VENDOR_PATH . "painel");
                } else {
                    header("location: " . VENDOR_PATH . "painel");
                }
            });


            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')

            $this->view->render("painel", 'Painel Do Usuario', "navbar", "navfooter");
        } else {
            header('location: ' . VENDOR_PATH);
        }
    }
}
