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
        $this->view->render("adm", 'Home', "navbar", "navfooter");

    }
}
