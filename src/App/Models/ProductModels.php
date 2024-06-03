<?php
namespace App\Models;
use App\Models\Conexao;
use Log\Logs;

class ProductModels{  
    private $conn;

    public function __construct(){
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
    }

    public function getEspessura() {
        $sql = 'SELECT espessura FROM espessuraglass';
        $result = mysqli_query($this->conn, $sql);
        $espec = array();

        while($row = mysqli_fetch_array($result)){
            $espec[] = $row;
        };  

        return $espec;
    }

    public function getChapa() {
        $sql = 'SELECT chapa FROM chapaglass';
        $result = mysqli_query($this->conn, $sql);
        $chapa = array();

        while($row = mysqli_fetch_array($result)){
            $chapa[] = $row;
        };  

        return $chapa;
    }

    public function getTipo(){
        $sql = 'SELECT tipo FROM tipoglass';
        $result = mysqli_query($this->conn, $sql);
        $tipo = array();

        while($row = mysqli_fetch_array($result)){
            $tipo[] = $row;
        };

        return $tipo;
    }
}


?>