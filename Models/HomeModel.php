<?php
/*
 * Classe Model da pagina home
*/
    namespace Models;

    class HomeModel extends Model{
        function getResultado(): bool{
            return $this->resultado;
        }

        public function validarLogin(array $dados = null){
            
            $query = "SELECT * FROM tb_usuario WHERE nm_email = :email AND nm_senha = :senha LIMIT 1";
            $result = $this -> PDO ->prepare($query);
            $result -> bindParam(':email', $dados['usuario'], \PDO::PARAM_STR);
            $result -> bindParam(':senha', $dados['senha'], \PDO::PARAM_STR);
            $result -> execute();
            $return = $result -> fetch();
            
            if(!empty($return)){
                $_SESSION['isLogado'] = true;
                $_SESSION['id_usuario'] = $return['id_usuario'];
                $_SESSION['nm_usuario'] = $return['nm_usuario'];
                $_SESSION['nm_senha'] = $return['nm_senha'];
                $_SESSION['nm_email'] = $return['nm_email'];
                $_SESSION['nm_vip'] = $return['nm_vip'];
                $this -> resultado = true;
            }else{ 
                $_SESSION['isLogado'] = false;
                $this -> resultado = false;
            }
        }
    }
