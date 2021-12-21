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
    function __construct()
    {

        $username = "root";
        $password = "";
        $servidor = "localhost:3306";
        try {
            $this->PDO = new \PDO('mysql:host=' . $servidor . ';dbname=db_blog', $username, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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

        if (!empty($email) || $email != "root@root") {
            return true;
        } else {
            return false;
        }
    }
}
