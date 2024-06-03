<?php
namespace App\Controllers;
use App\Models\ReqModels;

class ReqController {
    
    public static function getReq() {
        $estoque = new ReqModels();
        $result = $estoque->getReq();
        return $result;
    }
    
    public static function updateReq() {
        $estoque = new ReqModels();
        $dados = $_POST['data'];
        $result = $estoque->updateReq($dados);
        echo json_encode($result);
    }

    public static function deleteReq() {
        $estoque = new ReqModels();

        $infowhere = "";
        $info = $_POST["selecionados"];
        if (count($info)>1){
            foreach ($info as $key => $value) {
                if (count($info)==$key+1){
                    $infowhere.= $value.")";
                } if (count($info)!=$key+1){
                    $infowhere.="id IN (".$value.",";
                }  
            }
        } else{
            $infowhere.= "id=".$info[0]."";
        };

        $result = $estoque->deleteReq($infowhere);
        echo json_encode($result);
    } 
}
    


?>