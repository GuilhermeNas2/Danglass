

function sendData(event) {

    if (event) {
        event.preventDefault();
    } 
            
    var titulo = document.querySelector("th")
    let body = document.querySelector("tbody");
    body.innerHTML = '';
    titulo.textContent = '';
    
    var xhr = new XMLHttpRequest();
    var url = "recebeEstoque.php"; // Script PHP para buscar os dados
    var data = new FormData();
    var tipo = document.getElementById("tipo").value; 
    var chapa = document.getElementById("chapa").value;  
    var espessura = document.getElementById("espessura").value; 

    data.append("tipo", tipo);  
    data.append("chapa", chapa); 
    data.append("espessura", espessura);   

    xhr.open("POST", url, true);

    xhr.onreadystatechange = function () {

            if (xhr.readyState === 4 && xhr.status === 200) {
                var responseData = JSON.parse(xhr.responseText) // Recebe os dados do servidor
                ; // Obtém o elemento contêiner onde o novo elemento será adicionado
               
                titulo.textContent = responseData.tipo; // Define o texto do novo elemento como os dados recebidos    

                let infos = programa(responseData.data);
                console.log(infos);
                for (const espessura in infos) {
                    if (infos.hasOwnProperty(espessura)) {
                            let trF = document.createElement("tr");                        
                            let tr = document.createElement("tr");
                            let td = document.createElement("td");
                              
                            // Defina o atributo rowspan na célula da nova linha
                            td.textContent = espessura;
                            td.setAttribute("rowspan", "7");    
                            td.style = "text-align: center; font-size: 2rem";                                                  
                            tr.setAttribute("class", "w-50");
                            
                            // Adicione a célula à nova linha
                            tr.appendChild(td);
                            trF.appendChild(tr);
                            // Adicione a nova linha à tabela                            
                        
                        //Criar logica para inserir TR, depois inserir as linhas (para as espessuras)
                        infos[espessura].forEach(chapa => {                              
                            let tr = document.createElement("tr");
                            let td = document.createElement("td"); 

                            tr.setAttribute("class", "w-100");
                            tr.style = "font-size: 1.1rem; width:50%"
                            td.setAttribute("class", "w-100 px-5");
                            td.textContent = chapa.espessura + " (" + chapa.quantidade + ")";

                            tr.appendChild(td);
                            trF.appendChild(tr);
                            
                        });
                        body.appendChild(trF);
                    }
                } 
        }
    };

    xhr.send(data); // Envia a solicitação para buscar os dados
    
}
        
        
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