
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Controle de estoque - Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleEstoque.css">  

</head>                          
                <div id="fEP1" class="container vstack mt-4 gap-4">                
                    <div id="tiposEntrada" class="card text-center">            
                        <div class="card-body">
                            <h4 class="card-title">
                                Tipo
                            </h4>
                            <select  class="form-select form-select-lg mb-3" name="tipo" id ="tipo" aria-label="Large select example">
                                <option value ="" selected>Selecione</option>
                                <?php
                                    foreach($tipo as $item){
                                        ?> 
                                            <option value="<?php echo $item['tipo']; ?>"><?php echo $item['tipo']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>                        
                    </div>                                
                    <div  id="espessuraEntrada" class="card text-center">            
                        <div class="card-body">
                            <h4 class="card-title">
                                Espessura
                            </h4>
                            <select  class="form-select form-select-lg mb-3" name="espessura" id ="espessura" aria-label="Large select example">
                                <option value ="" selected>Selecione</option>
                                <?php
                                    foreach($espec as $item){
                                        ?> 
                                            <option value="<?php echo $item['espessura']; ?>"><?php echo $item['espessura']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>                        
                    </div>                  
                    <div id="chapaEntrada" class="card text-center">            
                        <div class="card-body ">
                            <h4 class="card-title">
                                Chapa
                            </h4>
                            <select  class="form-select form-select-lg mb-3" name="chapa" id ="chapa" aria-label="Large select example">
                                <option value ="" selected>Selecione</option>
                                <?php
                                    foreach($chapa as $item){
                                        ?> 
                                            <option value="<?php echo $item['chapa']; ?>"><?php echo $item['chapa']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>                 
    
</html>

