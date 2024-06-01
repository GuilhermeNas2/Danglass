const divConteudo = document.getElementById("conteudo");
const caracteristicas = ['tipo','chapa','espessura','quantidade'];

function adicionarNaDiv() {
    let select1 = document.getElementById("tipo").value;
    let select2 = document.getElementById("chapa").value;
    let select3 = document.getElementById("espessura").value;
    let input1 = document.getElementById("quantidade").value;  
    
    if(select1 == ""  || select2 == "" || select3 == "" || input1 == "" ){
        divError.innerText = 'Os campos devem ser preenchidos.';
        divCar.appendChild(divError);
        return
    } 

    
    
    let novoParagrafo = document.createElement("p");  
    
    novoParagrafo.textContent = `${select1} - ${select2} - ${select3} - ${input1}`;

    divConteudo.appendChild(novoParagrafo);
    divConteudo.appendChild(document.createElement("br"));

    caracteristicas.map((element) => {
        document.getElementById(element).value = "";
    });   
}


function salvarNoBancoDeDados(event) {
    event.preventDefault()
    let conteudoDiv = document.getElementById("conteudo").getElementsByTagName("p");
    let dados = [];  
        
    for (let i = 0; i < conteudoDiv.length; i++) {
        let dadosLinha = conteudoDiv[i].textContent.split(" - ");
        dados.push({
            tipo: dadosLinha[0],
            chapa: dadosLinha[1],
            espessura: dadosLinha[2],
            quantidade: dadosLinha[3]
                
        });
    }
        
    $.ajax({
        url:"updateReq", 
        method:"POST",
        dataType: "json",
        data: {
            data:dados
        }
        }).done((res)=> {            
            Swal.fire(res['value']);  
            divConteudo.innerHTML = '';
        }).fail((res)=> {            
            Swal.fire('Ocorreu algum erro, tente novamente');  
        })
           
}
    