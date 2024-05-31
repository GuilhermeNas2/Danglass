let changeArr = []
let id = '';


const div = document.querySelector('#mensagem');
const h2 = document.createElement('h2');
const  divv = document.querySelector('#user');

function sendData(event) {    
    event.preventDefault();
    h2.innerText = '';
    

    const input = document.querySelector('#email').value;    
    
    $.ajax({
        url: "getUser",
        method: "POST",
        dataType: "json",
        data: {
            valor: input
        }
    }).done((res)=> {      
        const span = document.querySelector('#userName');        
        const select = document.querySelector('select');     
        
        span.setAttribute('class', 'fw-bolder');
        divv.style = '';
        span.innerText = res['nome'] + ' - ' + res['tipoUsuario'];

        id = res['id'];        
        
        res['tipos'].forEach((type) => {            
            const option = document.createElement('option');  
            option.setAttribute('value', type['tipo']);
            option.innerText = type['tipo'];
            
            select.appendChild(option);
        });    

    }).fail((res)=> {
       divv.innerText = ''; 
       h2.innerText = 'Usuário não encontrado';
       div.appendChild(h2); 
    });
};




function updateUser(event) {
   event.preventDefault();   
   const input = document.querySelector('select').value;   
    
    $.ajax({
        url: "updateUser",
        method: "POST",
        dataType: "json",
        data: {
            valor: input,
            key: id
        }
    }).done((res)=> {
        Swal.fire(res['value']);
        div.appendChild(h2); 
    }).fail((res)=> {
        Swal.fire(res['value']);
        div.appendChild(h2); 
    });
}


function deleteUser(event) {
   event.preventDefault();   

    $.ajax({
        url: "deleteUser",
        method: "POST",
        dataType: "json",
        data: {            
            key: id
        }
    }).done((res)=> {       
       Swal.fire(res['value']);       
       div.appendChild(h2); 
       
    }).fail((res)=> {
        Swal.fire(res['value']); 
        div.appendChild(h2); 
    });
};