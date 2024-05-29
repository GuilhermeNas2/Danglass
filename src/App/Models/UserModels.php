<?php
namespace App\Models;
use App\Models\Conexao;

class UserModels{
    private $conn;    
    
    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
    }

    public function getUserLogin($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email ='".$email."' AND senha ='".$senha."'";
        $response = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($response);
        return $row;
    }
}

?>