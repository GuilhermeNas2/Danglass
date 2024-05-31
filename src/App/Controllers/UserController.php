<?php 
namespace App\Controllers;
use App\Models\Conexao;
use App\Models\UserModels;

class UserController{
    private $result;
    private $key;
    private $id;

    private static function getPostId(){
        if(isset($_POST['key']) && $_POST['key'] != '') {
            $id = $_POST['key'];            
        };        
        return $id;
    }   

    public static function getUser() {
        $data = $_POST['valor'];

        $key = 'email';
        $result = new UserModels();
        $result = $result->getUser($data, $key);
       
        echo json_encode($result);
    }

    public static function updateUser() {
        $data = $_POST['valor'];
        $result = new UserModels();
        $id = UserController::getPostId();        
        $result = $result->updateUser($data, $id);

        echo json_encode($result);
    }

    public static function deleteUser() {
        $result = new UserModels();
        $id = UserController::getPostId();

        $result = $result->deleteUser($id);

        echo json_encode($result);
    }
}

?>