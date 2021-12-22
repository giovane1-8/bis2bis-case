<?php
/*
 * Classe Model da pagina Post
*/

namespace Models;

class PostModel extends Model{

    private $resultado = false;

    function getResultado(): bool{
        return $this->resultado;
        $this -> resultado = false;
    }
    function newPost($dados = null){
        $sql = "INSERT INTO tb_post (nm_titulo,nm_corpo,dt_post,id_usuario) 
                       VALUES (?,?,?,?)";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1, $dados["titulo"], \PDO::PARAM_STR);
        $smtm->bindParam(2, $dados["corpoPost"], \PDO::PARAM_STR);
        $smtm->bindParam(3, $dados["data"], \PDO::PARAM_STR);
        $smtm->bindParam(4, $_SESSION["id_usuario"], \PDO::PARAM_STR);

        if ($smtm->execute()) {
            $this->resultado = true;
        }
    }
    function msnDelSucc(){
    }
    
    function getPostById($idpost){
        $sql = "SELECT * from tb_post WHERE id_post = :idpost limit 1";
        $query = $this -> PDO ->prepare($sql);
        $query -> bindparam(":idpost", $idpost);
        $query -> execute();
        $query = $query -> fetch($this -> PDO::FETCH_ASSOC);
        return $query;
    }

    function getUserById($iduser){
        $sql = "SELECT * from tb_usuario WHERE id_usuario = :idusuario limit 1";
        $query = $this -> PDO ->prepare($sql);
        $query -> bindparam(":idusuario", $iduser);
        $query -> execute();
        $query = $query -> fetch($this -> PDO::FETCH_ASSOC);
        return $query;
    }

}