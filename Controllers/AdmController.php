<?php
/*
 * Classe controller da pagina administrativa
*/

namespace Controllers;

class AdmController extends Controller
{
    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }
    public function index()
    {
        if ($_SESSION["isLogado"] && $_SESSION['nm_privilegio'] == "gm") {

            \Router::rota("adm/userScroll", function () {
                if (!empty($_POST)) {
                    $dados = $this->model->getEmailUser($_POST["offset"], @$_POST["nm_usuario"]);
                    $this->view->echoString($dados);
                }
            });

            \Router::rota("adm/criarDB", function () {
                if (!empty($_POST)) {
                    $this->model->criarDb();
                    $this->view->render("adm", 'Home', "navbar", "navfooter");
                    $this->view->msgCriarDb();
                }
            });

            \Router::rota("adm/user/?/delete", function ($par) {
                $user_id = @$par[2];
                $iduser = $this->model->getUserById($user_id)["id_usuario"];
                $this->model->excluiUser($user_id);
                if ($iduser == $_SESSION["id_usuario"]) {
                    header("location: " . VENDOR_PATH . "home/sair");
                }
                $this->view->render("adm", 'Home', "navbar", "navfooter");
                $this->view->msgDelUser();
            });

            \Router::rota("adm/getUserById", function () {
                if (!empty($_POST)) {
                    $dados = $this->model->getUserById($_POST["id_usuario"]);
                    $this->view->echoString(json_encode($dados, JSON_UNESCAPED_UNICODE));
                }
            });



            \Router::rota("adm/setBackupBanco", function () {
                if (!empty($_POST)) {
                    $this->model->getBackupBanco();
                    $this->view->render("adm", 'Home', "navbar", "navfooter");
                    $this->view->msnBackupDb();
                } else {
                    header("location: " . VENDOR_PATH . "adm");
                }
            });
            \Router::rota("adm/alterarUsuario", function () {
                if (!empty($_POST)) {
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    foreach ($dados as $key => $value) {
                        $dados[$key] = trim($dados[$key]);
                    }
                    $email = $this->model->getUserById($dados["idHidden"]);
                    $email = $email["nm_email"];
                    if ($this->model->verificarEmail($dados["email"]) && $email != $dados["email"]) {
                        $this->view->render("adm", 'Home', "navbar", "navfooter");
                        $this->view->msgEmail();
                    } else {

                        $_SESSION['id_usuario'] = $dados['idHidden'];
                        $_SESSION['nm_usuario'] = $dados['nome'];
                        $_SESSION['nm_senha'] = base64_encode($dados['senha']);
                        $_SESSION['nm_email'] = $dados['email'];
                        $_SESSION['nm_privilegio'] = $dados['privilegio'];
                        $this->model->altUser($dados);
                        $this->view->render("adm", 'Home', "navbar", "navfooter");
                        $this->view->AltUserSucc();
                    }
                } else {
                    header("location: " . VENDOR_PATH);
                    die();
                }
            });

            $this->view->render("adm", 'Home', "navbar", "navfooter");
        } else {
            header("location: " . VENDOR_PATH);
        }
    }
}
