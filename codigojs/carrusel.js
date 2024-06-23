
const circulos2 = document.querySelectorAll('.circulo2');

circulos2.forEach((circulo) => {
    circulo.addEventListener('click', () => {
        let imagenes = circulo.parentNode.parentNode.querySelectorAll(".imagenuni")
        let circulos = circulo.parentNode.querySelectorAll(".circulo2")
        let index = Array.from(circulos).indexOf(circulo);
        circulos.forEach(circulo => circulo.classList.remove('activo'));
        imagenes.forEach(imagen => imagen.classList.remove('activo'));
        
        circulo.classList.add('activo');
        imagenes[index].classList.add('activo');
    });
});
    

const circulos = document.querySelectorAll('.circulo');
const imagenes = document.querySelectorAll('.imagen');
let currentIndex = 0;

function changeImage(index) {
    const imagenActiva = document.querySelector('.imagen.activo');
    const nuevaImagen = imagenes[index];

    circulos.forEach(circulo => circulo.classList.remove('activo'));
    circulos[index].classList.add('activo');

    if (imagenActiva === nuevaImagen) return;

    imagenActiva.classList.add('saliente');
    imagenActiva.addEventListener('transitionend', () => {
        imagenActiva.classList.remove('saliente');
        imagenActiva.classList.remove('activo');
    }, { once: true });

    nuevaImagen.classList.add('activo');
}

circulos.forEach((circulo, index) => {
    circulo.addEventListener('click', () => {
        currentIndex = index; 
        changeImage(index);
    });
});

setInterval(() => {
    currentIndex = (currentIndex + 1) % imagenes.length; 
    changeImage(currentIndex);
}, 5000); 
