const circulos = document.querySelectorAll('.circulo');
const imagenes = document.querySelectorAll('.imagen');

circulos.forEach((circulo, index) => {
    circulo.addEventListener('click', () => {
        circulos.forEach(circulo => circulo.classList.remove('activo'));
        imagenes.forEach(imagen => imagen.classList.remove('activo'));
        
        circulo.classList.add('activo');
        imagenes[index].classList.add('activo');
    });
});
    