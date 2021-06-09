//INICIO DE SESIÓN
$(".save").click(function(e)
    {
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
                    })
                }else{
                        doAjax(function (r){
                            //console.log(r);
                                if(r==1){
                                    window.location="Vista/admin.php";
                                }if(r==2){
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
//REGISTRO
$(".formregistro").click(function(e)
    {
        //console.log("entre");
        e.preventDefault();
        let documento = document.getElementById("Documento").value;
        let tel = document.querySelector("#Telefono").value;
        let nombre = document.querySelector("#Nombre").value;
        let direc = document.querySelector("#Direccion").value;
        let correo = document.querySelector("#Correo").value;
        let pass = document.querySelector("#Contrasena").value;
        
                if(!documento.trim() || !tel.trim() || !nombre.trim() || !direc.trim() || !correo.trim() ||!pass.trim()){
                    Swal.fire({
                        icon: 'warning',
                        html: '<h3>Todos los campos son obligatorios.</h3>',
                        allowOutsideClick: false,
                        background: '#fff',
                        confirmButtonColor: '#FC3E3E',
                        confirmButtonText: 'Cerrar'
                      });
                    //console.log(documento+'----'+tel+'----'+nombre+'----'+direc+'----'+correo+'----'+pass);
                }else{
                    //alert("ERROR");
                    doRegistro(function (r){
                        //console.log(r);
                            if(r==1){
                                Swal.fire({
                                    title: 'Registrado exitosamente',
                                    text: 'Ahora inicia sesión para disfrutar de nuestro sitio web',
                                    icon: 'success',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Cerrar'
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "../index.php";
                                    }
                                  });
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

var doRegistro = function (callback){
        let documento = document.getElementById("Documento").value;
        let tel = document.querySelector("#Telefono").value;
        let nombre = document.querySelector("#Nombre").value;
        let direc = document.querySelector("#Direccion").value;
        let correo = document.querySelector("#Correo").value;
        let pass = document.querySelector("#Contrasena").value;

    datos = {Documento:documento,Telefono:tel,Nombre:nombre,Direccion:direc,Correo:correo,Contrasena:pass,action:'registro'},
    $.ajax({
            type:'POST',
            url:'../Controlador/ControladorUsuarios.php',
            data:datos,
            success: function (rr){
            callback(rr);
        }
        });
};
//RECUPERAR CONTRASEÑA
$(".RecuperarContra").click(function(e)
    {
        //console.log("entre");
        e.preventDefault();
        let correo = document.querySelector("#Correo").value;
        
                if(!correo.trim() ){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Todos los datos son obligatorios'
                    });
                    
                }else{
                    doRecuperarContra(function (r){
                        if(r==1){
                            Swal.fire({
                                title: 'Correo enviado existosamente',
                                text: 'Verifica tu correo para restablecer tu contraseña',
                                icon: 'success',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Cerrar'
                              }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "../index.php";
                                }
                              });
                            }if(r==0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Datos incorrectos',
                                    text: 'El correo ingresado no existe'
                                });
                            }
                    });
                    
                }
    });

var doRecuperarContra = function (callback){
        let correo = document.querySelector("#Correo").value;

    datos = {Correo:correo,action:'recuperarcontra'},
    $.ajax({
            type:'POST',
            url:'../Controlador/ControladorUsuarios.php',
            data:datos,
            success: function (rr){
            callback(rr);
        }
        });
};
//REGISTRO ADMIN
$(".registraradmin").click(function(e)
    {
        //console.log("entre");
        e.preventDefault();
        let rol = document.querySelector("#IdRol").value;
        let documento = document.getElementById("Documento").value;
        let tel = document.querySelector("#Telefono").value;
        let nombre = document.querySelector("#Nombre").value;
        let direc = document.querySelector("#Direccion").value;
        let correo = document.querySelector("#Correo").value;
        let pass = document.querySelector("#Contrasena").value;
        
                if(!rol.trim() || !documento.trim() || !tel.trim() || !nombre.trim() || !direc.trim() || !correo.trim() ||!pass.trim()){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Todos los datos son obligatorios'
                    });
                    //console.log(documento+'----'+tel+'----'+nombre+'----'+direc+'----'+correo+'----'+pass);
                }else{
                    //alert("ERROR");
                    doRegistroAdmin(function (r){
                        //console.log(r);
                            if(r==1){
                                Swal.fire({
                                    title: 'Registrado exitosamente',
                                    text: 'Ahora inicia sesión para disfrutar de nuestro sitio web',
                                    icon: 'success',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Cerrar'
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "../Vista/Usuariosadmin.php";
                                    }
                                  });
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

var doRegistroAdmin = function (callback){
        let rol = document.getElementById("IdRol").value;
        let documento = document.getElementById("Documento").value;
        let tel = document.querySelector("#Telefono").value;
        let nombre = document.querySelector("#Nombre").value;
        let direc = document.querySelector("#Direccion").value;
        let correo = document.querySelector("#Correo").value;
        let pass = document.querySelector("#Contrasena").value;

    datos = {IdRol:rol,Documento:documento,Telefono:tel,Nombre:nombre,Direccion:direc,Correo:correo,Contrasena:pass,action:'registroAdmin'},
    $.ajax({
            type:'POST',
            url:'../Controlador/ControladorUsuarios.php',
            data:datos,
            success: function (rr){
            callback(rr);
        }
        });
};
