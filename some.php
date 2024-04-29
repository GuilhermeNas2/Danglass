
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

    <script>
         function sendata() {
            event.preventDefault()       
            
            var xhr = new XMLHttpRequest();
            var url = "recebeEstoque.php"; // Script PHP para buscar os dados
            var data = new FormData()
            var tipo = document.getElementById("tipo").value  
            var chapa = document.getElementById("chapa").value  
            var espessura = document.getElementById("espessura").value    
             


            data.append("tipo", tipo)  
            data.append("chapa", chapa) 
            data.append("espessura", espessura)                        
            console.log(chapa)

            xhr.open("POST", url, true);

                    xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var responseData = JSON.parse(xhr.responseText) // Recebe os dados do servidor
                        var titulo = document.querySelector("th"); // Obtém o elemento contêiner onde o novo elemento será adicionado
                        //var newElement = document.createElement("div"); // Cria um novo elemento <div>
                        titulo.textContent = responseData.tipo; // Define o texto do novo elemento como os dados recebidos
                        var respessura = responseData.data
                        console.log(respessura)
                        let teste = respessura.map(x=>x.espessura)
                        console.log(teste)
                        function programa(data){
                            return data.reduce((acc, item) => {
                            // Se a espessura já está no acumulador, adiciona as chapas ao array existente
                            if (acc[item.chapa]) {
                                acc[item.chapa].push({
                                    espessura: item.espessura,
                                    quantidade: item.quantidade
                                });
                            } else {
                                // Caso contrário, cria um novo array para essa espessura
                                acc[item.chapa] = [{
                                    espessura: item.espessura,
                                    quantidade: item.quantidade
                                }];
                            }
                            return acc;
                        }, {});

                        }
                            
                        let infos = programa(responseData.data);
                        for (const espessura in infos) {
                            if (infos.hasOwnProperty(espessura)) {
                                console.log(`Chapa: ${espessura}`);                              
                                let tr = document.createElement("tr");
                                    let td = document.createElement("td");

                                    // Defina o atributo rowspan na célula da nova linha
                                    td.textContent = espessura;
                                    td.setAttribute("rowspan", "7");

                                    // Adicione a célula à nova linha
                                    tr.appendChild(td);

                                    // Adicione a nova linha à tabela
                                    document.querySelector("tbody").appendChild(tr);

                                
                                //Criar logica para inserir TR, depois inserir as linhas (para as espessuras)
                                infos[espessura].forEach(chapa => {
                                console.log(`Espessura: ${chapa.espessura}`);
                                
                                
                                

                                });
                            }
                            }
                       

                    container.appendChild(newElement); // Adiciona o novo elemento ao contêiner
                   
                }
            };

            xhr.send(data); // Envia a solicitação para buscar os dados
            
        }
                
                
    </script>   


</head>

<?php

try {
    
    $conexao = mysqli_connect("localhost", "root", "", "Nego");
    

    $sql = 'SELECT DISTINCT(tipo) FROM produto';
    $result = mysqli_query($conexao, $sql);
    $tipo = array();
    while($row = mysqli_fetch_array($result)){
        $tipo[] = $row;
    };
    
    $sql = 'SELECT DISTINCT(espessura) FROM produto';
    $result = mysqli_query($conexao, $sql);
    $espec = array();
    while($row = mysqli_fetch_array($result)){
        $espec[] = $row;
    };  

    $sql = 'SELECT DISTINCT(chapa) FROM produto';
    $result = mysqli_query($conexao, $sql);
    $chapa = array();
    while($row = mysqli_fetch_array($result)){
        $chapa[] = $row;
    };  
    
} catch (PDOException $e) {
    // Se ocorrer algum erro na conexão, exibe a mensagem de erro
    
}
?>          
                    
                <div id="fEP1" class="container vstack mt-4 gap-4">
                
                    <div id="tiposEntrada" class="card text-center">
            
                        <div class="card-body">

                            <h4 class="card-title">
                                Tipo
                            </h4>
                            <select class="form-select form-select-lg mb-3" name="tipo" id ="tipo" aria-label="Large select example">
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
                            <select class="form-select form-select-lg mb-3" name="espessura" id ="espessura" aria-label="Large select example">
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
                            <select class="form-select form-select-lg mb-3" name="chapa" id ="chapa" aria-label="Large select example">
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

