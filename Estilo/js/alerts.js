/*let boton = document.querySelector("#inicio");

boton.addEventListener("click",validar);*/
/*
            datos = {correoU:nombre,contrasenaU:pass,action:'entra'},

            $.ajax({
                type:'POST',
                url:'Controlador/ControladorUsuarios.php',
               // data:$("#formlogin").serialize(),
               data:datos,
                success: function (r){
                    //alert('REGRESÉ'+r);
                    console.log(r);
                    
                    if (r == "error"){
                        Swal.fire({
                            icon: 'error',
                          title: 'Datos incorrectos',
                          text: 'Los datos no son validos',
                          
                        })
                   }
                }
                });*/
$(".save").click(function(e){
        e.preventDefault();
        let nombre = document.getElementById("login").value;
        let pass = document.querySelector("#password").value;
                if(!nombre.trim() || !pass.trim()){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Todos los campos son obligatorios.',
                        showDenyButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: `Cerrar`
                    }).then((result) => {
                        if (result.isConfirmed) {
                        Swal.fire('OK', '', 'error')}
                    })
                }else{
                        doAjax(function (r){
                            //console.log(r);
                                if(r==1){
                                    //console.log("entre a admin");
                                    window.location="Vista/admin.php";
                                }if(r==2){
                                    //console.log("entre a admin");
                                    window.location="Vista/usuariousu.php";
                                }if(r==0){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Datos incorrectos',
                                        text: 'Los datos no son validos'
                                    });
                                }
                            
                        });
                    
                }
});

var doAjax = function (callback){
    let nombre = document.getElementById("login").value;
    let pass = document.querySelector("#password").value;

    datos = {correoU:nombre,contrasenaU:pass,action:'entra'},

    $.ajax({
        type:'POST',
        url:'Controlador/ControladorUsuarios.php',
       data:datos,
        success: function (rr){
            callback(rr);
        }

        });
};





