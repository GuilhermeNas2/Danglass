<?php 
namespace App\Controllers;
use App\Models\Conexao;
use App\Models\EstoqueModels;

class EstoqueController{      
    private $result = array();
    private int $contador;

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

        if($tipo != ''){
            $estoque = new EstoqueModels();
            $result = $estoque->getEstoque($cond);    
            $contador = $estoque->count($result);     
            $tipo .= " ".$chapa." ".$espessura." (".$contador.")";
        
            $response = array(
                "tipo"=> $tipo,
                "chapa"=> $cond,
                "espessura"=> $espessura,
                "quantidade"=> $contador,
                "data"=> $result
            );
        };     
        
        $response = array(
            "erro"=>'Tipo do vidro é obrigatório'
        );
    
    
        echo json_encode($response);
    }
    
    public static function updateEstoque() {
        $data = $_POST["array"];
        $modulo = $_POST["modo"];

        $estoque = new EstoqueModels();
        $result = $estoque->updateEstoque($data, $modulo);
        echo json_encode($result);
    }
    

   
    

   

}
?>





