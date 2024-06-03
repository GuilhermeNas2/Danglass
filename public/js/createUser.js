const inputArray = ['nome', 'senha', 'email', 'tipoUsuario']

function sendUser(event) {
    if (event) {
        event.preventDefault();
    }; 

    let input1 = document.querySelector('#nome').value;
    let input2 = document.querySelector('#senha').value;
    let input3 = document.querySelector('#email').value;
    let input4 = document.querySelector('#tipoUsuario').value;

    let userObj = {
        nome: input1,
        senha: input2,
        email: input3,
        tipouser: input4
    }

    inputArray.map((element) => {
        document.getElementById(element).value = "";
    });   

    $.ajax({
        url:'enviaUsuario',
        method:'POST',
        dataType: "json",
        data: {
            data: userObj
        }
    }).done((res) => {
        Swal.fire(res['value'])
    }).fail((res) => {
        Swal.fire(res['value'])
    })
}