<?php

    namespace Controllers;


    class Controller{
        protected $view;
        protected $model;
        public function __construct($view, $model){
            $this->view = $view;
            $this->model = $model;
            if (@explode("/",$_GET["url"])[0] != "adm" && @$_SESSION["nm_email"] == "root@root"){
                echo" voce só pode acesasr adm";
                session_destroy();
                die();

            }
        }
        
    }