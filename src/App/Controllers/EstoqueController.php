<?php 
namespace App\Controllers;
use App\Models\Conexao;
use App\Models\EstoqueModels;

class EstoqueController{
    // header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    // header("Access-Control-Allow-Headers: Content-Type");    
    private $result = array();
    
    public static function getEstoque(){            
        $cond ="";

        if(isset($_POST['tipo']) && !empty($_POST['tipo'])){
            $tipo = $_POST['tipo'];
            $cond .="tipo ='".$tipo."'" ;
        }else{
            $tipo = ""; 
        }

        if(isset($_POST['chapa']) && !empty($_POST['chapa'])){
            $chapa = $_POST['chapa']; 
            $cond .="AND chapa ='".$chapa."'";
        }else{
            $chapa = ""; 
        }
        
        if(isset($_POST['espessura']) && !empty($_POST['espessura'])){
            $espessura = $_POST['espessura']; 
            $cond .="AND espessura ='".$espessura."'";
        }else{
            $espessura = ""; 
        };

        $estoque = new EstoqueModels();
        $result = $estoque->getEstoque($cond);
    
        $contador = 0;
        foreach($result as $qtd) {
            $contador += $qtd['quantidade'];
        }
    
        $tipo .= " ".$chapa." ".$espessura." (".$contador.")";
    
        $response = array(
            "tipo"=> $tipo,
            "chapa"=> $cond,
            "espessura"=> $espessura,
            "quantidade"=> $contador,
            "data"=> $result
        );
    
    
        echo json_encode($response);
    }
   
    //Recebendo as informações do formulário (estoque.php)


    //Identificando o ID do produto a partir das informações (Tipo, Chapa, Espessura)

   
    

   

}
?>





