<?php
/*
 * Classe filha de todas as Models
 * aqui fica os metodos e propriedades que usamos em todas as Model
 * aqui fica a conexão com o servidor de banco de dados
 * MODIFICAR VARIAVEIS: $username, $password, $servidor PARA CONEXAO COM O SERVIODR 
*/

namespace Models;

use PDO;

class Model
{
    protected object $PDO;
    protected $username, $password, $servidor, $port, $banco, $caminhoMysql;
    function __construct()
    {
        //VARIAVEIS DE CONFIGURAÇÃO DO BANCO
        $this->username = "root";
        $this->password = "";
        $this->servidor = "localhost";
        $this->port = "3306";
        $this->banco = "db_blog";
        
        //Atenção a essa variavel, É totalmente necessario para tarefa de backup do banco de dados
        $this->caminhoMysql = "C:\\xampp\\mysql\\bin\\";

        try {
            $this->PDO = new \PDO('mysql:host=' . $this->servidor . ':' . $this->port . ';dbname=' . $this->banco, $this->username, $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    function verificarEmail($email = null)
    {
        $query = $this->PDO->prepare("SELECT nm_email FROM tb_usuario WHERE nm_email = :email LIMIT 1");
        $query->bindParam(":email", $email);
        $query->execute();
        $email = $query->fetch();

        if (!empty($email) || $email == "root@root") {
            return true;
        } else {
            return false;
        }
    }

    function getUserById($iduser)
    {
        $sql = "SELECT * from tb_usuario WHERE id_usuario = :idusuario limit 1";
        $query = $this->PDO->prepare($sql);
        $query->bindparam(":idusuario", $iduser);
        $query->execute();
        $query = $query->fetch($this->PDO::FETCH_ASSOC);
        $query["nm_senha"] = base64_decode($query["nm_senha"]);
        return $query;
    }
}
