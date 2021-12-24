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
}
