<?php
namespace App\Models;

class EstoqueModels{
    private $conn;    
    private $result = array();

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
    }

    public function getEstoque($cond){
       $sql = "SELECT * FROM cadastrodanglass.produto WHERE ".$cond;
       $retorno = mysqli_query($this->conn, $sql);

       while($row = mysqli_fetch_array($retorno)) {    
            $result[] = array(
                'id'=> $row['id'],
                'espessura'=> $row['espessura'],
                'chapa'=> $row['chapa'],    
                'quantidade'=> $row['quantidade']
            );

       };     

       return $result;
    }

}

?>