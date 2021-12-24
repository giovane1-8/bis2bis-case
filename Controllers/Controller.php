<?php

    namespace Controllers;


    class Controller{
        protected $view;
        protected $model;
        /*
         * metodo para não deixar o usuario root sair da pagina ADM PARA NÃO DAR ERRO 
        */
        public function __construct($view, $model){
            $this->view = $view;
            $this->model = $model;
            if (@$_SESSION["nm_email"] == "root@root"){
                $rota = @explode("/",$_GET["url"])[0];
                if($_GET["url"] == "post/infiteScrool"){
                    header("location: ".VENDOR_PATH."adm");
                }elseif($rota != "adm"){
                    session_destroy();
                    header("location: ". VENDOR_PATH);
                    die();
                }
            }

           

        }
        
    }