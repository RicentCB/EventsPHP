
const kIdUser = $("main#events").attr("iduser");
const eventsContainer = $('main .events-container');

//Metodo AJAX para consultar eventos disponibles
$.ajax({
    url: `ajax/events.ajax.php?action=readEvents&idUser="${kIdUser}"`,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    beforeSend: () => {
        console.info("Consultando eventos...");
    },
    success: ans => {
        console.log(ans);
        if (ans["type"] === "success") {
            let events = ans["message"];
            eventsContainer.html(
                events.map(event =>
                (`<div class="event" id="${event["eventoID"]}">
                    <h2>${event["titulo"]}</h2>
                    <h3>${event["fecha"]}</h3>
                    <p>${event["descripcion"]}</p>
                    <a href="#" class="start-button sign-event">
                        <span>Registrarme</span>
                        <svg width="13px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </a>
                </div>`)
                )
            );
            // Swal.fire({
            //     title: 'Bienvenido',
            //     text: 'Aqui podrás revisar nuestros ultimos eventos',
            //     icon: 'success',
            //     confirmButtonText: 'Aceptar'
            // })
            console.log("Eventos Cargados");
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Error al mostrar los eventos,',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            })
            console.error(ans["message"]);
        }
    }
});
$(document).ready(() => {
    console.clear();
    //Boton Hambuerguesa
    const btnMenu = $(".hamburger")
    const contentMenu = $(".menu-content");
    btnMenu.on("click", function (e) {
        e.preventDefault();
        if ($(this).hasClass("is-active")) {
            $(this).removeClass("is-active")
            contentMenu.removeClass("is-visible");
            $(".menu-container").removeClass("is-active");
        } else {
            $(this).addClass("is-active")
            contentMenu.addClass("is-visible");
            $(".menu-container").addClass("is-active");
        }
    })
    //Cerrar sesion
    contentMenu.on("click", ".logout-btn", function (e) {
        e.preventDefault();
        //Metodo AJAX para cerrar sesion, llama a un endpoint con parametro post
        let data = new FormData();
        data.append("action", "logout");
        $.ajax({
            url: "ajax/users.ajax.php",
            method: "POST",

            cache: false,
            contentType: false,
            processData: false,
            data: data,
            dataType: "json",
            beforeSend: () => {
                console.info("Cerrando sesion...");
            },
            success: ans => {
                if(ans["type"]=="success")
                    window.location.reload();
                else{
                    Swal.fire({
                        title: 'Error',
                        text: 'Error al cerrar la sesion',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    })
                    console.log(ans);
                }
            }
        });
    })


    //Boton de inscribirse en algun evento
    eventsContainer.on("click", ".sign-event", function (e) {
        e.preventDefault();
        const idEvent = $(this).parent().attr("id");
        const eventTitle = $(this).parent().find("h2").html();
        Swal.fire({
            title: `¿Estas seguro que desas inscribirte al evento?`,
            text: `"${eventTitle}"`,
            showDenyButton: true,
            confirmButtonText: `Si, aceptar`,
            denyButtonText: `No, cancelar`,
        }).then((result) => {
          if (result.isConfirmed) {
            //Metodo AJAX para registrar nuevo evento        
            let data = new FormData();
            data.append("action", "registerEventUser");
            data.append("idEvent", idEvent);
            data.append("idUser", kIdUser);

            $.ajax({
                url: "ajax/eventsUsers.ajax.php",
                method: "POST",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: () => {
                    console.info("Registando evento");
                },
                success: ans => {
                    if(ans["type"]=="success"){
                        Swal.fire('Evento registrado correctamente', '', 'success')
                        .then((result)=>{
                            window.location.reload();
                        });
                    }else{
                        Swal.fire('Error al registar evento', '', 'error');
                        console.log(ans);
                    }
                }
            });      
          } 
        })  
    })
})