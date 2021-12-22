<?php
/*
 * Classe Model da pagina Post
*/

namespace Models;

class PostModel extends Model{

    private $resultado = false;

    function getResultado(): bool{
        return $this->resultado;
    }
    
}