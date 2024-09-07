//SOLO ES UN EFECTO VISUAL PARA LAS BARRAS 
const barra = document.querySelectorAll('.barradebusqueda');
/*
const error = document.querySelectorAll('.error');
const carreras = document.querySelectorAll('.carreraindice');
const tecnicaturas = document.querySelectorAll('.tecnicaturaindice');
let display = "flex"
let display2 = "flex"*/
function barradebusqueda(id){
    barra.forEach(barra => barra.classList.remove('activo'));
    document.getElementById(id).classList.add('activo');
    document.getElementById("identificador2").scrollIntoView({ behavior: 'smooth' });
    /*
    let cantidad = (carreras.length > 0);
    let cantidad2 = (tecnicaturas.length > 0);
    let cantidad3 = (error.length > 1);
    if(!cantidad3){
        error[0].style.display = "none"
    }
    if(id == "carrera"){
        display2 = "none"
        display = "flex"
        if(!cantidad){if(cantidad3){error[0].textContent ="No se encontraron resultados"}else{error[0].style.display = "flex"}}
    }else if(id == "tecnicatura"){
        display = "none"
        display2 = "flex"
        if(!cantidad2){if(cantidad3){error[0].textContent ="No se encontraron resultados"}else{error[0].style.display = "flex"}}
    }else{
        display = "flex"
        display2 = "flex"
        if(!cantidad && !cantidad2){if(cantidad3){error[0].textContent ="No se encontraron resultados"}else{error[0].style.display = "flex"}}
    }
    if(cantidad){
        carreras.forEach((carrera) => {
            carrera.parentNode.style.display = display;
        })
    }
    if(cantidad2){
        tecnicaturas.forEach((tecnicatura) => {
            tecnicatura.parentNode.style.display = display2;
        })
    }
    */
}
