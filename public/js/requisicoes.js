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
        url:"deleteReq",
        method:"POST",
        dataType:"json",
        data:{
            selecionados:selecionados
        }
    })
    .done((res)=>{    
        Swal.fire({
           text: res['status'],
           preConfirm: async ()=> {
            location.reload(true);
           }
        })
       
              
    })
    .fail((res)=>{
        Swal.fire({
            text: 'A operação falhou tente novamente',
            preConfirm: async ()=> {
             location.reload(true);
            }
         })
    })   
})