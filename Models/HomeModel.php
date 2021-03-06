<?php
/*
 * Classe Model da pagina home
*/

namespace Models;

class HomeModel extends Model{

    private $resultado = false;

    function getResultado(): bool{
        return $this->resultado;
        $this -> resultado = false;
    }
















    public function validarLogin(array $dados = null){

        $query = "SELECT * FROM tb_usuario WHERE nm_email = :email AND nm_senha = :senha LIMIT 1";
        $result = $this->PDO->prepare($query);
        $result->bindParam(':email', $dados['usuario'], \PDO::PARAM_STR);
        $result->bindParam(':senha', base64_encode($dados['senha']));
        $result->execute();
        $return = $result->fetch();

        if (!empty($return)) {
            $_SESSION['isLogado'] = true;
            $_SESSION['id_usuario'] = $return['id_usuario'];
            $_SESSION['nm_usuario'] = $return['nm_usuario'];
            $_SESSION['nm_senha'] = $return['nm_senha'];
            $_SESSION['nm_email'] = $return['nm_email'];
            $_SESSION['nm_privilegio'] = $return['nm_privilegio'];
            $this->resultado = true;
        } else {
            $_SESSION['isLogado'] = false;
            $this->resultado = false;
        }
    }

    function cadastrarUsuario(array $dados = null){
        foreach ($dados as $key => $value) {
            $dados[$key] = trim($dados[$key]);
        }
        $sql = "INSERT INTO tb_usuario (nm_usuario,nm_email,nm_senha) 
                       VALUES (?,?,?)";
        $smtm = $this->PDO->prepare($sql);
        $smtm->bindParam(1, $dados["nome"], \PDO::PARAM_STR);
        $smtm->bindParam(2, $dados["email"], \PDO::PARAM_STR);
        $smtm->bindParam(3, base64_encode($dados["senha"]), \PDO::PARAM_STR);

        if ($smtm->execute()) {
            $this->resultado = true;
            
        }
    }


}
