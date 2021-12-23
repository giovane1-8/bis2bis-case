<?php
/*
 * Classe Model da pagina Post
*/

namespace Models;

class PostModel extends Model
{

    private $resultado = false;

    function getResultado(): bool
    {
        return $this->resultado;
        $this->resultado = false;
    }
    function newPost($dados = null)
    {
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
    function deletePost($idpost)
    {
        $sql = "DELETE from tb_post Where id_post = :idpost";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(":idpost", $idpost);
        $smtm->execute();
    }

    function getPostById($idpost)
    {
        $sql = "SELECT * from tb_post WHERE id_post = :idpost limit 1";
        $query = $this->PDO->prepare($sql);
        $query->bindParam(":idpost", $idpost);
        $query->execute();
        $query = $query->fetch($this->PDO::FETCH_ASSOC);
        return $query;
    }


    function alterarPost($dados)
    {
        $sql = "UPDATE tb_post SET nm_titulo = :tituloPost, nm_corpo = :corpoPost, dt_post = :dtdata WHERE id_post = :idPost;";
        $query = $this->PDO->prepare($sql);
        $query->bindparam(":tituloPost", $dados["titulo"], \PDO::PARAM_STR);
        $query->bindparam(":corpoPost", $dados["corpoPost"], \PDO::PARAM_STR);
        $query->bindparam(":dtdata", $dados["data"], \PDO::PARAM_STR);
        $query->bindparam(":idPost", $dados["id_post"], \PDO::PARAM_STR);
        $query->execute();
    }
    function procurarPost($nome_post)
    {
        $sql = "SELECT * FROM tb_post WHERE nm_titulo like '%$nome_post%' limit 10";
        $query = $this->PDO->prepare($sql);
        $query->execute();
        $return = $query->fetchAll($this->PDO::FETCH_ASSOC);
        return json_encode($return, JSON_UNESCAPED_UNICODE);
    }


    function getOnePosts($offset)
    {
        $sql = "SELECT * from tb_post ORDER BY id_post DESC LIMIT 1 OFFSET $offset";
        $query = $this->PDO->prepare($sql);
        $query->execute();
        $query = $query->fetch($this->PDO::FETCH_ASSOC);
        return json_encode($query, JSON_UNESCAPED_UNICODE);
    }

}
