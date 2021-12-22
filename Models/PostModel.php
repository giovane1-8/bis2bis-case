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
    function newPost($dados = null){
        $sql = "INSERT INTO tb_post (nm_titulo,nm_corpo,dt_post) 
                       VALUES (?,?,?)";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1, $dados["titulo"], \PDO::PARAM_STR);
        $smtm->bindParam(2, $dados["corpoPost"], \PDO::PARAM_STR);
        $smtm->bindParam(3, $dados["data"], \PDO::PARAM_STR);

        if ($smtm->execute()) {
            $this->resultado = true;
        }
    }
}