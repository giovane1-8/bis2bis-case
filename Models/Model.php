<?php
/*
 * Classe filha de todas as Models
 * aqui fica os metodos e propriedades que usamos em todas as Model
 * aqui fica a conexão com o servidor de banco de dados
*/

namespace Models;

use PDO;

class Model
{
    protected object $PDO;
    function __construct()
    {
        /*
        $username = "root";
        $password = "";
        try {
            $this->PDO = new \PDO('mysql:host=localhost:3306;dbname=db_mangakindle', $username, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        */
    }
}
