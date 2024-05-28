let selecionados = [];
document.querySelectorAll("#check").forEach(item=>{
    item.addEventListener("click",()=>{      
        if (item.checked ==true){
            selecionados.push(item.getAttribute("data-id"));
        }else{
            selecionados = selecionados.filter(coisa=>coisa!=item.getAttribute("data-id"));
        }
    })
})


const btnFinalizar = document.getElementById("btnFinalizar")
btnFinalizar.addEventListener("click",(e)=>{
    e.preventDefault();
    $.ajax({
        url:"deleteRequisicoes.php",
        method:"POST",
        dataType:"json",
        data:{
            selecionados:selecionados
        }
    })
    .done((res)=>{
         
        location.reload(true);
        Swal.fire(res['status']);  
    })
    .fail((error)=>{
        console.log('2')
    })
})