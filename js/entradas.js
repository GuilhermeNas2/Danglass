let carrinho = []
let divCar = document.getElementById("carrinhoEntrada");
let divError = document.createElement("span");
let nome = 0;
let z = 0;
const caracteristicas = ['tipo','chapa','espessura','quantidade'];

divError.style = "font-size: 2rem; display: flex; align-items: center;"

function displaySelected() {
    divError.innerText = '';   

    var input1 = document.getElementById("tipo").value;
    var input2 = document.getElementById("chapa").value;
    var input3 = document.getElementById("espessura").value;
    var input4 = document.getElementById("quantidade").value;
    
    if(input1 == ""  || input2 == "" || input3 == "" || input4 == "" ){
        divError.innerText = 'Os campos devem ser preenchidos.';
        divCar.appendChild(divError);
        return
    } 
    
    var displayText = "<div data-index='" + z + "'>" + input1 + ", " + input2 + ", "
                         + input3 + "(" + input4 + ` ) <i class='mx-2 fa-solid fa-xmark'></i> </div>`;                        
                       
    carrinho.push({
       "id": z, 
       "tipo": input1, 
       "chapa": input2,
       "espessura": input3,
       "quantidade": input4,
    });
       
    divCar.innerHTML += displayText;
    
    caracteristicas.map((element) => {
        document.getElementById(element).value = "";
    });   

    document.querySelectorAll('.fa-xmark').forEach(icon => {
        icon.addEventListener('click', function() {
            var index = parseInt(this.parentNode.getAttribute('data-index'));
            var indexi = carrinho.map(function(o) { return o.id; }).indexOf(index);             
            
            carrinho.splice(indexi, 1);            
            
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
        if(!(res['error'])){
            divError.innerText = res['value'];   
            divCar.appendChild(divError) ;             
            geraPdf(carrinho);
            carrinho = [];
            nome++
        } else {
            divError.innerText = res['value']; 
            divCar.appendChild(divError) ;  
            carrinho = [];  
        }
        
        
    }).fail((res)=>{          
        divError.innerText = 'Falha durante a execução tente novamente'; 
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
    const doc = new jsPDF();
     
    let arrayPdf = []    
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
    doc.save(nome+'.pdf');   
   
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
};