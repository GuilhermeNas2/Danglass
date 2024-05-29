<?php
namespace App\Core;
use App\Models\UserModels;

session_start();

class Auth {    
    private $userModel;

    public function __construct(){
        $this->userModel = new UserModels();
    }

    public function login($email, $senha){  
            $response = $this->userModel->getUserLogin($email, $senha);
            if($response){                            
                $_SESSION['idUser'] = $response['id'];          
                $_SESSION['tipoUser'] = $response['tipoUsuario'];  
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