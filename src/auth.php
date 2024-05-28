<?php
session_start();

class Auth {
    public function login($email, $senha){
        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email" , $email);
        $sql->bindValue("senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();            
            $_SESSION['idUser'] = $dado['id'];          
            $_SESSION['tipoUser'] = $dado['tipoUsuario'];  
            $_SESSION['logged_in'] = true
          
        }else{
            $_SESSION['logged_in'] = false
            
        }

    }

    public static function check() {
       return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public static function logout() {
        session_destroy();
        header("Location: /login");
        exit();
    }
    
    public function logged($id){
            global $pdo;
            $array = array();
            $sql = "SELECT nome FROM usuarios WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }

            return $array;
    }
   
}
?>