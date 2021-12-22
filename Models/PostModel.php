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
        $sql = "INSERT INTO tb_post (nm_post,nm_corpo,dt_post) 
                       VALUES (?,?,?)";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1, $dados["nome"], \PDO::PARAM_STR);
        $smtm->bindParam(2, $dados["email"], \PDO::PARAM_STR);
        $smtm->bindParam(3, $dados["senha"], \PDO::PARAM_STR);

        if ($smtm->execute()) {
            $this->resultado = true;
            
        }
    
    }
}