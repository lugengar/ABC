function barradebusqueda(id) {
    const formularios = document.querySelectorAll('.barradebusqueda');
    formularios.forEach(formulario => {
        if (formulario.id === id) {
            formulario.classList.add('activo');
        } else {
            formulario.classList.remove('activo');
        }
    });
}