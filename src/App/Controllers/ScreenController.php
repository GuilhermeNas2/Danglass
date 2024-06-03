<?php
namespace App\Controllers;
use App\Models\ScreenModels;
use App\Models\UserModels;

class ScreenController {

    public function getScreens() {
        $id = $_SESSION['idUser'];

        $user = new UserModels();
        $screen = new ScreenModels();

        $type = $user->getUserBasic($id,'id');        
        $screen = $screen->getScreens($type['tipoUsuario']);

        return $screen;
    }
}

?>