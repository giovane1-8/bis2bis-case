<?php
/*
 * Classe Model da pagina Administrativa
*/

namespace Models;

class AdmModel extends Model
{

    private $resultado = false;

    function getResultado(): bool
    {
        return $this->resultado;
        $this->resultado = false;
    }
}
