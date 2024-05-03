<?php

class Conexao {
    private $localhost = "localhost";
    private $user = "root";
    private $passw = "";
    private $banco = "cadastrodanglass";
    private $conexao;

    public function __construct(){
        $this->conexao = mysqli_connect($this->localhost, $this->user,$this->passw, $this->banco);

        if(mysqli_connect_error()){
            die('Erro de conexão: ' . mysqli_connect_error());
        }
    } 

    public function getConn() {
        return $this->conexao;
    }
    
}
?>