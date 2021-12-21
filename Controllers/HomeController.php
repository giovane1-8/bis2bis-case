<?php
/*
 * Classe controller da pagina home
*/

    namespace Controllers;
    class HomeController extends Controller{
        public function __construct($view, $model){
            parent::__construct($view,$model);
        }
        public function index(){
    
            if($_SESSION['isLogado']){

            //render("NOME DO ARQUIVOU DO CORPO", 'TITULO DA PAGINA', 'CABEÇA DA PAGINA , FOOTER DA PAGINA')            
            $this->view->render("home", 'Home');
            }else{
                $this->view->render("login", 'Home');

            }
        }
    }
    