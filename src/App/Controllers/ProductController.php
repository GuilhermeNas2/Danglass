<?php
namespace App\Controllers;
use App\Models\ProductModels;

class ProductController {

    public static function getAllAtt($screen) {    
        $data = new ProductModels();
        $espec = $data->getEspessura();
        $chapa = $data->getChapa();
        $tipo = $data->getTipo();

        require $screen;
    }

    public static function getChapa() {
        $data = new ProductModels();
        $chapa = $data->getChapa();
        return $chapa;
    }

    public static function getTipo() {
        $data = new ProductModels();
        $tipo = $data->getTipo();
        return $tipo;
    }

    public static function getEspessura() {
        $data = new ProductModels();
        $espec = $data->getEspessura();
        return $espec;
    }
}

?>