let changeArr = []
let id = '';


const div = document.querySelector('#mensagem');
const h2 = document.createElement('h2');

function sendData(event) {    
    event.preventDefault();
    h2.innerText = '';

    const input = document.querySelector('#email').value;    
    
    $.ajax({
        url: "./backEnd/getUser.php",
        method: "POST",
        dataType: "json",
        data: {
            valor: input
        }
    }).done((res)=> {

        const  divv = document.querySelector('#user');
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
       h2.innerText = 'Usuário não encontrado';
       div.appendChild(h2); 
    });
};




function updateUser(event) {
   event.preventDefault();   
   const input = document.querySelector('select').value;   
    
    $.ajax({
        url: "./backEnd/updateUser.php",
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
        url: "./backEnd/updateUser.php",
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