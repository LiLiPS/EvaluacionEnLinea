const btnRegistrar = document.querySelector('#registrar');

eventListeners();

function eventListeners() {

    btnRegistrar.addEventListener('onlick', campos);

}

function campos() {

    const correo = document.querySelector('#correo').value,
        psw = document.querySelector('#psw').value;

    console.log(correo);


}