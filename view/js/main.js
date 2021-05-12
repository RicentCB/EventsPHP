const eventsContainer = $('main .events-container');
//Metodo AJAX
$.ajax({
    url: "ajax/events.ajax.php?action=readEvents",
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success: ans => {
        if(ans["type"]==="success"){
            let events = ans["message"];
            eventsContainer.html(
                events.map(event => {
                    return `
                    <div class="event" id="${event["eventoID"]}">
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
                    </div>`;
                })
                )
        }else{
            console.log("error")
        }
    }
});

$(document).ready(()=>{
    // console.log("listo");
})