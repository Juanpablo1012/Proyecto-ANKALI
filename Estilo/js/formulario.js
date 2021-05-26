
let boton = document.querySelector("#inicio");

boton.addEventListener("click",validar);

function validar(){
    let nombre = document.getElementById("login").value;
    let pass = document.querySelector("#password").value;
        if(!nombre.trim() || !pass.trim()){
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Todos los campos son obligatorios',
              })
              //ACA EN EL ELSE, MANDAR POR AJAX O FETCH, LOS DATOS AL CONTROLADOR,
              //Y VERIFICAR SI SON CORRECTOS O NO
        }else{
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
              )
              console.log(nombre,pass);

        }
    
}