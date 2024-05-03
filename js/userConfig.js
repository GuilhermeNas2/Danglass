let changeArr = []
let id = '';

function sendData(event) {
    event.preventDefault();

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
        id = res['id'];
        let ninfos = Object.keys(res);
        ninfos = ninfos.filter( x => x != 'id')
        ninfos.forEach((info) => {
            const inputC = document.createElement('input');
            inputC.setAttribute('readonly', true);
            inputC.setAttribute('value', res[info]);
            inputC.setAttribute('id', info);
            inputC.setAttribute('class', 'infoU');
            inputC.setAttribute('onchange', `getChange(${info})`);
            form.appendChild(inputC);
        })

        const btnEdit = document.createElement('button');
        const btnSend = document.createElement('button');
        const icon = document.createElement('i');

        btnSend.innerText = 'Salvar';
        
        icon.setAttribute('class', 'fa-solid fa-pen')
        btnEdit.setAttribute('onclick', 'enableEdit()');
        btnSend.setAttribute('type', 'submit');
        form.setAttribute('onsubmit', 'updateUser(event)');           
            
        btnEdit.appendChild(icon);
        form.appendChild(btnSend);
        form.appendChild(btnEdit);
        divU.appendChild(form);

    }).fail((res)=> {

    });
};


function enableEdit() {
    document.querySelectorAll('.infoU').forEach(element => {
        element.removeAttribute('readonly');
        
    });
};

function getChange(tag) {
    const id = tag.getAttribute('id');
    const e = document.querySelector(`#${id}`).value;
    changeArr.push({id, e});
}


function updateUser(event) {
    event.preventDefault();   
   

    $.ajax({
        url: "./backEnd/updateUser.php",
        method: "POST",
        dataType: "json",
        data: {
            valor: changeArr,
            key: id
        }
    }).done((res)=> {
       
    }).fail((res)=> {

    });
}