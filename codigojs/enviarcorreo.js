document.getElementById('formulariodecontacto').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    var mailtoLink = 'mailto:destinatario@correo.com' +
    '?subject=' + encodeURIComponent('Mensaje de ' + name) +
    '&body=' + encodeURIComponent('Nombre: ' + name + '\n' +
    'Correo Electrónico: ' + email + '\n' +
    'Mensaje: ' + message);
    window.location.href = mailtoLink;
});