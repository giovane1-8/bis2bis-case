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
        $this->view->render("post", 'Postar', "navbar", "navfooter");

    }
}