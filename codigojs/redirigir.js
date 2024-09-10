//ACTIVA UNA ANIMACION SCROLL HACIA DONDE SE INDIQUE EL HREF

function redirigir(href){
    document.getElementById(href).scrollIntoView({ behavior: 'smooth' });
}
function redirigircentro(href) {
    document.getElementById(href).scrollIntoView({
        behavior: 'smooth',   // Desplazamiento suave
        block: 'center',      // Centrar el elemento en la parte central del viewport
        inline: 'center'      // Para centrar en horizontal si es necesario
    });
}

window.onload = function() {
    if (window.location.hash == "#carreraelegida" || window.location.hash == "#carreraelegida2") {
        var hash = window.location.hash.substring(1);
        // Extraer el valor del hash, sin el símbolo '#'
        if(window.location.hash == "#carreraelegida2"){
            redirigircentro("carreraelegida");
        }else{
            redirigircentro(hash);
        }
        
    }
}
