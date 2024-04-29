

let carrinho = []
let divCar = document.getElementById("carrinhoEntrada");

function displaySelected() {
    var selectedValue1 = document.getElementById("tipo").value;
    var selectedValue2 = document.getElementById("chapa").value;
    var selectedValue3 = document.getElementById("espessura").value;
    var selectedValue4 = document.getElementById("quantidade").value;
           
    var displayText = "<div>" + selectedValue1 + ", " + selectedValue2 + ", " + selectedValue3 + "(" + selectedValue4 + ") </div>";    
    
    const doc = new jsPDF();

    doc.text(displayText, 10, 10);
    doc.save("a4.pdf");

    carrinho.push({
       tipo: selectedValue1, 
       chapa: selectedValue2,
       espessura: selectedValue3,
       quantidade: selectedValue4,
    })
        
    divCar.innerHTML += displayText;
    
    document.getElementById("tipo").value = "";
    document.getElementById("chapa").value = "";
    document.getElementById("espessura").value = "";
    document.getElementById("quantidade").value = "";
}


function enviaBanco(event, modulo){     
    if (event) {
        event.preventDefault();
    }    
    $.ajax({
        url:"updatesEstoque.php",
        method: "POST",
        dataType: "json",
        data:{
            array:carrinho,
            modo:modulo 
        }
    }).done((res)=>{
        console.log(res);
        divCar.innerText = ''
    }).fail((res)=>{
        console.log("nao estou aqui", res)});
        divCar.innerText = ''
    
}

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
        console.log("nao estou aqui", res)});
        divCar.innerText = ''
}
    




