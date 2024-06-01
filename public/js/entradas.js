let carrinho = []
const divCar = document.getElementById("conteudo");
divCar.style = "font-size: 1.2rem;";

const divError = document.createElement("span");
let nome = 0;
let z = 0;
const caracteristicas = ['tipo','chapa','espessura','quantidade'];

divError.style = "font-size: 1.6rem; margin-top: 1em; display: flex; align-items: center;"

function displaySelected() {
    divError.innerText = '';   

    const input1 = document.getElementById("tipo").value;
    const input2 = document.getElementById("chapa").value;
    const input3 = document.getElementById("espessura").value;
    const input4 = document.getElementById("quantidade").value;
    
    if(input1 == ""  || input2 == "" || input3 == "" || input4 == "" ){
        divError.innerText = 'Os campos devem ser preenchidos.';
        divCar.appendChild(divError);
        return
    } 
    
    const displayText = "<div data-index='" + z + "'>" + input1 + ", " + input2 + ", "
                         + input3 + " ( "+ input4 + " ) <i class='mx-2 fa-solid fa-xmark'></i> </div>";                        
                       
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
        url:"updateEstoque",
        method: "POST",
        dataType: "json",
        data:{
            array:carrinho,
            modo:modulo 
        }
    }).done((res)=>{
        if(!(res['error'])){
            Swal.fire(res['value']);            
            const qtd = res['newQtd'];            
            carrinho.forEach(element => {                
                qtd.map((key) => {
                    if(element.id == key.id){                        
                        element.qtd = key.qtd
                    }
                })
                
            }); 

            geraPdf(carrinho);
            carrinho = [];            
            nome++
        } else {
            Swal.fire(res['value']);                       
            carrinho = []; 
        };        
        
    }).fail((res)=>{      
        Swal.fire('Falha durante a execução tente novamente');            
        carrinho = []; 
    });             
    divCar.innerHTML = ""; 
};


function geraPdf(data) {   
    const doc = new jsPDF();
    const teste = ['tipo','chapa','espessura','qtd']; 
    let arrayPdf = []    
    let x = 70;
    let y = 40;   

    doc.text('Alterações no estoque',x,10);
    
    let date = getDate();
    doc.text(date, x, 20);    
    
    doc.setFontSize(20);
    data.forEach(element => {
        teste.map((key)=> {
            let info = element[key].toString()
            arrayPdf.push(info);
        });    
       
    });    
    console.log(arrayPdf)
    arrayPdf.map((key) => {           
        if(y < 200){
            doc.text(key,x,y);
            y += 10;
        }              
    });

    doc.save(nome+'.pdf');   
    y = 70;
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