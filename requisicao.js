
function adicionarNaDiv() {
    var select1 = document.getElementById("tipoReq").value;
    var select2 = document.getElementById("chapaReq").value;
    var select3 = document.getElementById("espessuraReq").value;
    var input1 = document.getElementById("quantidadeReq").value;
  
    var divConteudo = document.getElementById("conteudo");
    
    var novoParagrafo = document.createElement("p");  
    novoParagrafo.textContent = `${select1} - ${select2} - ${select3} - ${input1}`;
    divConteudo.appendChild(novoParagrafo);
    divConteudo.appendChild(document.createElement("br"));
    }

function salvarNoBancoDeDados(event) {
    event.preventDefault()
    var conteudoDiv = document.getElementById("conteudo").getElementsByTagName("p");
    var dados = [];  
        
    for (var i = 0; i < conteudoDiv.length; i++) {
        var dadosLinha = conteudoDiv[i].textContent.split(" - ");
        dados.push({
            tipo: dadosLinha[0],
            chapa: dadosLinha[1],
            espessura: dadosLinha[2],
            quantidade: dadosLinha[3]
                
        });
    }
        
    $.ajax({
        url:"reqBanco.php", 
        method:"POST",
        dataType: "json",
        data: {
            data:dados
        }
        }).done((res)=> {            
            Swal.fire(res['value']);  
        }).fail((res)=> {            
            Swal.fire(res['value']);  
        })
           
}
    