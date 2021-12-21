<?php

    namespace Views;

    class View{
        CONST PATH_PAGES = "paginas/";
        
        public $titlePage;

        public function render($fileName, $titlePage, $head = null, $footer = null){ 
            $this -> titlePage = $titlePage;
            
            if ($head == null){
                include(self::PATH_PAGES."head/head.php");
            }else{
                include(self::PATH_PAGES."head/".$head.".php");
            }

            include(self::PATH_PAGES.$fileName.".php");
            
            if($footer == null){
                include(self::PATH_PAGES."footer/footer.php");
            }else{
                include(self::PATH_PAGES."footer/".$footer.".php"); 
            }
        }
    }