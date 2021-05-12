$(document).ready(()=>{
    const loginForm = $(".login .form-container");
    //Click en el boton de ingresar
    loginForm.on("click", ".login-btn", function(e){
        e.preventDefault();
        let inUser = loginForm.find("#in-user").val();
        let inPass = loginForm.find("#in-password").val();
        
        //Metodo AJAX para ingresar al sistema     
        var data = new FormData();
        data.append("action", "login");
        data.append("user", inUser);
        data.append("pass", inPass);

        $.ajax({
            url: "ajax/users.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: () => {
                console.log("Enviando datos de ingreso...");
            },
            success: ans => {
                if(ans["type"] == "success"){
                    console.log(ans);
                    window.location.reload();
                }else{
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrio un error, por favor verirfica tus datos',
                        icon: 'warning',
                        confirmButtonText: 'Aceptar'
                    })
                }
            }
        });
    })
});