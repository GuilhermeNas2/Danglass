let carrinho = []
let divCar = document.getElementById("carrinhoEntrada");
let divError = document.createElement("span");

divError.style = "font-size: 2rem; display: flex; align-items: center;"


let z = 0;

const doc = new jsPDF();

function displaySelected() {
    divError.innerText = '';   

    var selectedValue1 = document.getElementById("tipo").value;
    var selectedValue2 = document.getElementById("chapa").value;
    var selectedValue3 = document.getElementById("espessura").value;
    var selectedValue4 = document.getElementById("quantidade").value;
           
    var displayText = "<div data-index='" + z + "'>" + selectedValue1 + ", " + selectedValue2 + ", "
                         + selectedValue3 + "(" + selectedValue4 + ` ) <i class='mx-2 fa-solid fa-xmark'></i> </div>`; 
                        
    carrinho.push({
       "id": z, 
       "tipo": selectedValue1, 
       "chapa": selectedValue2,
       "espessura": selectedValue3,
       "quantidade": selectedValue4,
    });
       
    divCar.innerHTML += displayText;
    
    document.getElementById("tipo").value = "";
    document.getElementById("chapa").value = "";
    document.getElementById("espessura").value = "";
    document.getElementById("quantidade").value = "";

    document.querySelectorAll('.fa-xmark').forEach(icon => {
        icon.addEventListener('click', function() {
            var index = parseInt(this.parentNode.getAttribute('data-index'));
            var indexi = carrinho.map(function(o) { return o.id; }).indexOf(index);             
            // Remove o item do array
            carrinho.splice(indexi, 1);            
            // Remove a div correspondente
            this.parentNode.remove();           
           
        });
    });
    z++;    
    
};



function enviaBanco(event, modulo){     
   
    if (event) {
        event.preventDefault();
    }; 

    z = 0;
    
    $.ajax({
        url:"updatesEstoque.php",
        method: "POST",
        dataType: "json",
        data:{
            array:carrinho,
            modo:modulo 
        }
    }).done((res)=>{
        divError.innerText = 'Operação feita com sucesso';   
        divCar.appendChild(divError) ;             
        geraPdf(carrinho);
        carrinho = [];
        
    }).fail((res)=>{      
        divError.innerText = 'O Estoque não possui essa quantidade, refaça a operação.'; 
        divCar.appendChild(divError) ;  
        carrinho = [];     
    });    
    divCar.innerHTML = "";       
    
};

function enviarInformacao() {
    var tipoReq = document.getElementById("tipoReq").value;
    var chapaReq = document.getElementById("chapaReq").value;
    var espessuraReq = document.getElementById("espessuraReq").value;
    var quantidadeReq = document.getElementById("quantdadeReq").value;

    $.ajax({
        url:"requsicaoADM.php",
        method: "POST",
        dataType: "json",
        data:{
          tipoReq,
          chapaReq,
          espessuraReq,
          quantidadeReq 
    }
    }).done((res)=>{
        console.log(res);
        divCar.innerText = ''
    }).fail((res)=>{
        console.log("nao estou aqui", res)
        divCar.innerText = ''
        
    }       
    );
        
};


function geraPdf(data) {    
    let arrayPdf = []
    const caracteristicas = ['tipo','chapa','espessura','quantidade'];
    let x = 70;
    let y = 40;

    doc.text('Alterações no estoque',x,10);
    
    let date = getDate();
    doc.text(date, x, 20);    
    
    doc.setFontSize(20);
    data.forEach(element => {
        caracteristicas.map((key)=> {
            arrayPdf.push(element[key]);
        });    
       
    });    

    arrayPdf.map((key) => {            
        doc.text(key,x,y);
        y += 10;
    });
    doc.save('a5.pdf');
};



function getDate() {
    let dataAtual = new Date();

    let dia = String(dataAtual.getDate()).padStart(2, '0');
    let mes = String(dataAtual.getMonth() + 1).padStart(2, '0'); 
    let ano = dataAtual.getFullYear();
    let hora = String(dataAtual.getHours()).padStart(2, '0');
    let minutos = String(dataAtual.getMinutes()).padStart(2, '0');
    let segundos = String(dataAtual.getSeconds()).padStart(2, '0');
    
    let horaFormatada = hora + ':' + minutos + ':' + segundos;    
    let dataFormatada = horaFormatada +" "+ dia + '/' + mes + '/' + ano;

    return dataFormatada
}