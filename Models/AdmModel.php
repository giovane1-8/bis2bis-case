<?php
/*
 * Classe Model da pagina Administrativa
*/

namespace Models;

class AdmModel extends Model
{
    private $resultado = false;

    private $sql, $removeAI;


    function getResultado(): bool
    {
        return $this->resultado;
        $this->resultado = false;
    }
    function getEmailUser($offset, $nm_usuario = "")
    {
        if ($nm_usuario) {
            $nm_usuario = "WHERE nm_email like '%$nm_usuario%'";
        }
        $sql = "SELECT * from tb_usuario $nm_usuario LIMIT 10 OFFSET $offset";
        $query = $this->PDO->prepare($sql);
        $query->execute();
        $query = $query->fetchAll($this->PDO::FETCH_ASSOC);
        return json_encode($query, JSON_UNESCAPED_UNICODE);
    }
    function altUser($dados)
    {
        $sql = "UPDATE tb_usuario SET nm_usuario = :nomeUsuario, nm_email = :emailUsuario, nm_senha = :userSenha,nm_privilegio = :userPrivilegio WHERE id_usuario = :iduser;";
        $query = $this->PDO->prepare($sql);
        $query->bindparam(":nomeUsuario", $dados["nome"], \PDO::PARAM_STR);
        $query->bindparam(":emailUsuario", $dados["email"], \PDO::PARAM_STR);
        $query->bindparam(":userSenha", $dados["senha"], \PDO::PARAM_STR);
        $query->bindparam(":userPrivilegio", $dados["privilegio"], \PDO::PARAM_STR);
        $query->bindparam(":iduser", $dados["idHidden"], \PDO::PARAM_STR);
        $query->execute();
    }

    function excluiUser($idUser)
    {
        $sql = "DELETE from tb_usuario Where id_usuario = :iduser";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(":iduser", $idUser);
        $smtm->execute();
    }



    function getBackupBanco()
    {

        $dbhost = $this->servidor;
        $dbport = $this->port;
        $dbuser = $this->username;
        $dbpass = $this->password;
        $dbname = $this->banco;
        $caminhoMySql = $this->caminhoMysql;

        $backupfile = 'backupBD/Autobackup_' . date("Ymd") . '.sql';

        system($caminhoMySql . "mysqldump -h $dbhost -P $dbport -u $dbuser $dbname> " . $backupfile);
    }
}
