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
    function getEmailUser($offset, $nm_usuario = ""){
        if($nm_usuario){
            $nm_usuario = "WHERE nm_email like '%$nm_usuario%'";
        }
        $sql = "SELECT * from tb_usuario $nm_usuario LIMIT 6 OFFSET $offset";
        $query = $this->PDO->prepare($sql);
        $query->execute();
        $query = $query->fetchAll($this->PDO::FETCH_ASSOC);
        return json_encode($query, JSON_UNESCAPED_UNICODE);
    }
}
