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
                    $this -> view ->echoString($dados);
                }
            });

            \Router::rota("adm/getUserById", function () {
                if (!empty($_POST)) {
                    $dados = $this->model->getUserById($_POST["id_usuario"]);
                    $this -> view ->echoString(json_encode($dados, JSON_UNESCAPED_UNICODE));

                }
            });
            

            $this->view->render("adm", 'Home', "navbar", "navfooter");
        } else {
            header("location: " . VENDOR_PATH);
        }
    }
}
