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
    function getEmailUser($offset, $nm_usuario = ""){
        if ($nm_usuario) {
            $nm_usuario = "WHERE nm_email like '%$nm_usuario%'";
        }
        $sql = "SELECT * from tb_usuario $nm_usuario LIMIT 10 OFFSET $offset";
        $query = $this->PDO->prepare($sql);
        $query->execute();
        $query = $query->fetchAll($this->PDO::FETCH_ASSOC);
        return json_encode($query, JSON_UNESCAPED_UNICODE);
    }
    function altUser($dados){
        $sql = "UPDATE tb_usuario SET nm_usuario = :nomeUsuario, nm_email = :emailUsuario, nm_senha = :userSenha,nm_privilegio = :userPrivilegio WHERE id_usuario = :iduser;";
        $query = $this->PDO->prepare($sql);
        $query->bindparam(":nomeUsuario", $dados["nome"], \PDO::PARAM_STR);
        $query->bindparam(":emailUsuario", $dados["email"], \PDO::PARAM_STR);
        $query->bindparam(":userSenha", $dados["senha"], \PDO::PARAM_STR);
        $query->bindparam(":userPrivilegio", $dados["privilegio"], \PDO::PARAM_STR);
        $query->bindparam(":iduser", $dados["idHidden"], \PDO::PARAM_STR);
        $query->execute();
    }

    function excluiUser($idUser){
        $sql = "DELETE from tb_usuario Where id_usuario = :iduser";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(":iduser", $idUser);
        $smtm->execute();
    }






















    private function ln($text = '')
    {
        $this->sql = $this->sql . $text . "\n";
    }

    public function dump($file)
    {
        $this->ln("SET FOREIGN_KEY_CHECKS=0;\n");

        $tables = $this->PDO->query('SHOW TABLES')->fetchAll($this->PDO::FETCH_BOTH);

        foreach ($tables as $table) {
            $table = $table[0];
            $this->ln('DROP TABLE IF EXISTS `' . $table . '`;');

            $schemas = $this->PDO->query("SHOW CREATE TABLE `{$table}`")->fetchAll($this->PDO::FETCH_ASSOC);

            foreach ($schemas as $schema) {
                $schema = $schema['Create Table'];
                if ($this->removeAI) $schema = preg_replace('/AUTO_INCREMENT=([0-9]+)(\s{0,1})/', '', $schema);
                $this->ln($schema . ";\n\n");
            }
        }

        file_put_contents($file, $this->sql);
    }
}
