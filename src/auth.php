<?php
session_start();

class Auth {    

    public function login($email, $senha){  
            
            require '../conexao/conexao.php';

            $conexao = new Conexao();
            $conn = $conexao->getConn();
            $sql = "SELECT * FROM usuarios WHERE email ='".$email."' AND senha ='".$senha."'";
            $response = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($response);
            
            if($response){                            
                $_SESSION['idUser'] = $row['id'];          
                $_SESSION['tipoUser'] = $row['tipoUsuario'];  
                $_SESSION['logged_in'] = true;
                header("Location: /Danglass/public/home");
                exit();
            }else{
                header("Location: /Danglass/public/login");
                exit();            
            }
    }

    public static function check() {
       return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public static function logout() {
        session_destroy();
        header("Location: /Danglass/public/login");
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