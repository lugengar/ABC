// SE ENCARGA DE HACER UTILES LOS BOTONES DE LOS CARRUCELES
const imagenes = document.querySelectorAll('.imagen');

// Verifica si hay imágenes suficientes para mostrar el carrusel
if (imagenes.length > 1) {
    const circulos2 = document.querySelectorAll('.circulo2');
    const carousel = document.getElementById('carrusel');

    // Verificar que existan los elementos antes de operar
    if (circulos2.length && carousel) {

        // Asigna eventos a los botones de los carruseles
        circulos2.forEach((circulo) => {
            circulo.addEventListener('click', () => {
                let imagenes = circulo.closest('.contenedor-carrusel').querySelectorAll(".imagenuni");
                let circulos = circulo.parentNode.querySelectorAll(".circulo2");
                let index = Array.from(circulos).indexOf(circulo);
                
                // Resetea clases activas
                circulos.forEach(c => c.classList.remove('activo'));
                imagenes.forEach(img => img.classList.remove('activo'));

                // Activa la imagen y el círculo correspondiente
                circulo.classList.add('activo');
                if (imagenes[index]) imagenes[index].classList.add('activo');
            });
        });

        const circulos = document.querySelectorAll('.circulo');
        let currentIndex = 0;
        let intervalId;
        let click = false;

        function changeImage(index) {
            const imagenActiva = document.querySelector('.imagen.activo');
            const nuevaImagen = imagenes[index];

            if (!nuevaImagen || !imagenActiva) return;

            circulos.forEach(circulo => circulo.classList.remove('activo'));
            circulos[index].classList.add('activo');

            if (imagenActiva === nuevaImagen) return;

            imagenActiva.classList.add('saliente');
            imagenActiva.addEventListener('transitionend', () => {
                imagenActiva.classList.remove('saliente', 'activo');
                if (click) {
                    setTimeout(() => click = false, 100);
                }
            }, { once: true });

            nuevaImagen.classList.add('activo');
        }

        function resetInterval() {
            clearInterval(intervalId);
            intervalId = setInterval(() => {
                currentIndex = (currentIndex + 1) % imagenes.length;
                changeImage(currentIndex);
            }, 5000);
        }

        // Asigna eventos de clic a los botones circulares
        circulos.forEach((circulo, index) => {
            circulo.addEventListener('click', () => {
                if (!click) {
                    click = true;
                    currentIndex = index;
                    changeImage(index);
                    resetInterval();
                }
            });
        });

        resetInterval();

        // Detectar deslizamiento en el carrusel
        let startX = 0;
        let endX = 0;

        carousel.addEventListener('touchstart', (event) => {
            startX = event.touches[0].clientX;
        });

        carousel.addEventListener('touchend', (event) => {
            endX = event.changedTouches[0].clientX;

            if (startX > endX) {
                slideLeft();
            } else if (startX < endX) {
                slideRight();
            }
        });

        function slideLeft() {
            currentIndex = (currentIndex + 1) % imagenes.length;
            changeImage(currentIndex);
            resetInterval();
        }

        function slideRight() {
            currentIndex = (currentIndex - 1 + imagenes.length) % imagenes.length;
            changeImage(currentIndex);
            resetInterval();
        }
    } else {
        console.warn('No se encontraron elementos de carrusel o círculos.');
    }
}
