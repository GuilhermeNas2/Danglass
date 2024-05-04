<?php

$conexao = mysqli_connect("localhost", "root", "", "cadastrodanglass");
class Usuario{

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
            
            return true;
        }else{
            return false;
        }

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
   
        //public function verificatipo ($id){
           // global $pdo;
          //  $sql = "SELECT tipoUsuario FROM usuarios WHERE id =:id";           
           // $resultado = mysqli_query($conexao, $sql);
        }

    

    
    





