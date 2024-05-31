

function sendData(event) {

    if (event) {
        event.preventDefault();
    } 

    let titulo = document.querySelector("#tituloEstoque")
    let body = document.querySelector("#body");
    body.innerHTML = '';
    titulo.textContent = '';
    
    let xhr = new XMLHttpRequest();
    let url = "recebeEstoque"; 
    let data = new FormData();
    let tipo = document.getElementById("tipo").value; 
    let chapa = document.getElementById("chapa").value;  
    let espessura = document.getElementById("espessura").value; 

    data.append("tipo", tipo);  
    data.append("chapa", chapa); 
    data.append("espessura", espessura);   

    xhr.open("POST", url, true);

    xhr.onreadystatechange = function () {

            if (xhr.readyState === 4 && xhr.status === 200) {
                let responseData = JSON.parse(xhr.responseText);                 
                if(!(responseData.erro)){
                    titulo.textContent = responseData.tipo;
                    titulo.setAttribute('class', 'border-bottom border-2 p-2') // Define o texto do novo elemento como os dados recebidos    
                    let infos = programa(responseData.data);
                    
                    for (const espessura in infos) {
                        if (infos.hasOwnProperty(espessura)) {                                  
                                
                                let divF = document.createElement("div");
                                let div = document.createElement("div");
                                let span = document.createElement("span");
                                let divU = document.createElement("div");
                                
                                
                                span.textContent = espessura;
                                divF.setAttribute("class", "w-100 d-flex");
                                div.setAttribute("class", "w-50 h-auto p-2 text-center d-flex align-items-center justify-content-center fs-1 border-bottom border-2" ) 
                                div.appendChild(span);
                                divF.appendChild(div);
    
                               
                            //Criar logica para inserir TR, depois inserir as linhas (para as espessuras)
                            infos[espessura].forEach(chapa => {   
    
                                let div = document.createElement("div");
                                let span = document.createElement("span");
                                span.textContent = chapa.espessura + " (" + chapa.quantidade + ")";  
                                span.style = "font-size: 1.1rem; width:100%;" 
                                if(infos[espessura].length > 1){
                                    divU.setAttribute("class", "w-50 h-auto d-flex flex-column align-items-center justify-content-center" );
                                    div.setAttribute('class', 'w-100 h-auto p-2 text-center border-bottom border-1');
                                } else {
                                    divU.setAttribute("class", "w-50 h-auto d-flex flex-column align-items-center  border-bottom border-1 justify-content-center" );
                                    div.setAttribute('class', 'w-100 h-auto p-2 text-center');
                                }
                                 
    
                                div.appendChild(span);
                                divU.appendChild(div);  
                               
                                
                            });
                            x = 0;
                            divF.appendChild(divU);
                            body.appendChild(divF);
                        }
                    } 
                }
                else{
                    Swal.fire(responseData.erro); 
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