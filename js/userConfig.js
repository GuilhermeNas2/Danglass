let changeArr = []
let id = '';

const div = document.querySelector('#mensagem');
const h2 = document.createElement('h2');

function sendData(event) {    
    event.preventDefault();
    h2.innerText = '';

    const input = document.querySelector('#uEmail').value;
    const divU = document.querySelector('#user');

    $.ajax({
        url: "./backEnd/getUser.php",
        method: "POST",
        dataType: "json",
        data: {
            valor: input
        }
    }).done((res)=> {

        const form = document.createElement('form');  
        form.setAttribute('class', 'd-flex flex-column align-items-center justify-content-center mt-4')
        id = res['id'];
        let ninfos = Object.keys(res);

        ninfos = ninfos.filter( x => x != 'id');
        ninfos.forEach((info) => {

            const inputC = document.createElement('input');
            const label = document.createElement('label');
            const titulo = document.createElement('span');
            console.log(res[info])
           
            titulo.setAttribute('class', 'w-50')
            inputC.setAttribute('readonly', true);
            inputC.setAttribute('value', res[info]);            

            if(info != 'tipoUsuario') {                
                info = info[0].toUpperCase() + info.substring(1);;
                console.log(info)
                
            };

            if(info == 'tipoUsuario') {
                info = "Tipo"
            };      

            inputC.setAttribute('id', info);
            inputC.setAttribute('class', 'infoU w-50 ');
            inputC.setAttribute('onchange', `getChange(${info})`);
            label.setAttribute('class', 'w-50 d-flex align-items-center justify-content-start my-3')

            titulo.innerText = info;         

            label.appendChild(titulo);
            label.appendChild(inputC);
            form.appendChild(label);
        })

        const btnEdit = document.createElement('button');
        const btnSend = document.createElement('button');
        const btnDelete = document.createElement('button');
        const btnDiv = document.createElement('div');
        const icon = document.createElement('i');

        btnSend.innerText = 'Salvar';
        btnDelete.innerText = 'Deletar';   

        icon.setAttribute('class', 'fa-solid fa-pen')
        btnEdit.setAttribute('onclick', 'enableEdit()');
        btnEdit.setAttribute('type', 'button');
        btnDelete.setAttribute('onclick', 'deleteUser(event)');
        btnSend.setAttribute('type', 'submit');
        form.setAttribute('onsubmit', 'updateUser(event)');     
        btnDiv.setAttribute('class', 'container mt-5')      
            
        btnEdit.appendChild(icon);
        btnDiv.appendChild(btnDelete);
        btnDiv.appendChild(btnSend);
        btnDiv.appendChild(btnEdit);
        form.appendChild(btnDiv)
        divU.appendChild(form);

        let arrBtn = document.querySelector('#user').querySelectorAll("button"); 
        
        arrBtn.forEach(btn => {            
            btn.setAttribute('class', 'btn-md btn btn-outline-light mx-2');  
                      
        });

    }).fail((res)=> {
       h2.innerText = 'Algo deu errado';
       div.appendChild(h2); 
    });
};


function enableEdit() {
    document.querySelectorAll('.infoU').forEach(element => {
        element.removeAttribute('readonly');
        
    });
};

function getChange(tag) {
    let id = tag.getAttribute('id');       
    const e = document.querySelector(`#${id}`).value;
    if(id != 'Tipo') {                
        id = id[0].toLowerCase() + id.substring(1);    
    };

    if(id == 'Tipo') {
        id = "tipoUsuario"
    }; 
    console.log(id);
    changeArr.push({id, e});
}


function updateUser(event) {
    event.preventDefault();   
   console.log(changeArr)

    $.ajax({
        url: "./backEnd/updateUser.php",
        method: "POST",
        dataType: "json",
        data: {
            valor: changeArr,
            key: id
        }
    }).done((res)=> {
        h2.innerText = res['value'];
        div.appendChild(h2); 
    }).fail((res)=> {
        h2.innerText = res['value'];
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
       h2.innerText = res['value'];
       div.appendChild(h2); 
       
    }).fail((res)=> {
        h2.innerText = res['value']; 
        div.appendChild(h2); 
    });
};