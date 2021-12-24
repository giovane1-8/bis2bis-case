<?php

namespace Models;

class PainelModel extends Model
{
    function atualizar($valor, $chave)
    {
        for ($i = 0; $i < count($valor); $i++) {
            $sql = "UPDATE tb_usuario SET $chave[$i] = :valor WHERE id_usuario = :usuario_id ";
            $smtm = $this->PDO->prepare($sql);
            $smtm->bindParam(":valor", $valor[$i]);
            $smtm->bindParam(":usuario_id", $_SESSION['id_usuario']);
            if ($smtm->execute()) {
            } else {
                return false;
            }
        }
        return true;
    }
    function getOnePostsByUserId($offset,$idUser){
        $sql = "SELECT * from tb_post WHERE id_usuario = :iduser ORDER BY id_post DESC LIMIT 1 OFFSET $offset";
        $query = $this->PDO->prepare($sql);
        $query -> bindParam(":iduser", $idUser);
        $query->execute();
        $query = $query->fetch($this->PDO::FETCH_ASSOC);
        return json_encode($query, JSON_UNESCAPED_UNICODE);
    }
}
