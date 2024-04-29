
let carrinho = []
let divCar = document.getElementById("carrinhoEntrada");

function displaySelected() {
    var selectedValue1 = document.getElementById("tipo").value;
    var selectedValue2 = document.getElementById("chapa").value;
    var selectedValue3 = document.getElementById("espessura").value;
    var selectedValue4 = document.getElementById("quantidade").value;
           
    var displayText = "<div>" + selectedValue1 + ", " + selectedValue2 + ", " + selectedValue3 + "(" + selectedValue4 + ") </div>";    
    
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


function enviaBanco(event){   
    if (event) {
        event.preventDefault();
    }

    $.ajax({
        url:"teste.php",
        method: "POST",
        dataType: "json",
        data:{
            array:carrinho
        }
    }).done((res)=>{
        console.log(res);
        divCar.innerText = ''
    }).fail((res)=>{
        console.log("nao estou aqui", res)});
        divCar.innerText = ''
    
}    
