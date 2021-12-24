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
        $dados["senha"] = base64_encode($dados["senha"]);
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
    function criarDb()
    {
        $PDO = new \PDO('mysql:host=' . $this->servidor . ':' . $this->port . ';', $this->username, $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $sql = <<<__sql
CREATE DATABASE IF NOT EXISTS db_blog;

USE db_blog;


CREATE TABLE IF NOT EXISTS `tb_usuario` (
    `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
    `nm_usuario` varchar(45) NOT NULL,
    `nm_email` varchar(100) NOT NULL,
    `nm_senha` varchar(100) NOT NULL,
    `nm_privilegio` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id_usuario`)
  ) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tb_post` (
    `id_post` int(11) NOT NULL AUTO_INCREMENT,
    `nm_titulo` varchar(100) NOT NULL,
    `nm_corpo` text NOT NULL,
    `id_usuario` int(11) NOT NULL,
    `dt_post` date NOT NULL,
    PRIMARY KEY (`id_post`),
    KEY `fk_tb_post_tb_usuario_idx` (`id_usuario`),
    CONSTRAINT `fk_tb_post_tb_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
  
  
__sql;
        $PDO->exec($sql);
    }
}
