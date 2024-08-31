<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estiloscss/universidad.css">
    <title>Document</title>
</head>
<body>
    <div class="container" id="container">
        <main class="carrusel">
            <div class="imagenes">
                <div class="imagen activo" style="background-image: url('../imagenes/universidades/117.jpg');"></div>
                <div class="imagen" style="background-image: url('../imagenes/universidades/199.jpg');"></div>
                <div class="imagen" style="background-image: url('../imagenes/universidades/217.jpg');"></div>
            </div>

            <div class="filtro">
                
                <div class="contenidotexto">
                    <h1 class="texto1">NOMBRE DEL ESTABLECIMIENTO</h1>
                    
                </div>
                <div class="contenidotexto">
                    <h1 class="texto2">DIRECCIÓN DEL ESTABLECIMIENTO</h1>
                </div>
                <div class="circulos">
                    <span class="circulo activo"></span>
                    <span class="circulo"></span>
                    <span class="circulo"></span>
                </div>
            </div>
            <a href="index.php" class="logo_pba_vertical"></a>
        </main>
        <header class="header" id="header">
            <a href="index.php" class="logo_pba_horizontal " ></a>
    <a href="formulario.php" class="boton_nose_que_estudiar">No sé que estudiar <div class="circulopregunta" style="background-image: url(imagenes/iconos/pregunta.svg); background-size: 4vh;"></div></a>
        </header>
        
        <main class="main">
            <div class="informacion lista" style="padding-top: 5vh;">
                <div class="universidad " id="info">  
                    <div class="imageninfo" style="background-image: url(imagenes/iconos/informacion.svg);"></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">¿PORQUE ELEGIRNOS?</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <div class="redesociales">
                        <p class="redsocial2" style="background-image: url(imagenes/iconos/silladeruedas.svg);">Cuenta con rampas</p>
                        <p class="redsocial2" style="background-image: url(imagenes/iconos/calefaccion.svg);">Cuenta con calefacción</p>
                        <p class="redsocial2" style="background-image: url(imagenes/iconos/wifi.svg);">Cuenta con WIFI</p>
                        <p class="redsocial2" style="background-image: url(imagenes/iconos/comedor.svg);">Cuenta con comedor</p>
                    </div>
                </div>

                <div class="universidad" id="mapa"> 
                    <iframe  class="imageninfo" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13150.23923620172!2d-58.542955899999995!3d-34.51404235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb08d0e03c427%3A0xb9671110c4893ecd!2sEasy!5e0!3m2!1ses-419!2sar!4v1719099532427!5m2!1ses-419!2sar" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">UBICACIÓN</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <button class="botonuni pop" popovertarget="googlemaps">ABRIR MAPA</button>
                </div>
                <div class="universidad "> 
                    <div class="imageninfo"style="background-image: url(imagenes/iconos/correo.svg);"></div>
    
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">CONTACTO Y REDES SOCIALES</h1>
                    
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <div class="redesociales">
                        <a class="redsocial2 " style="background-image: url(imagenes/iconos/correo.svg);" href="mailto:inscripcion@tecnica1vl.org" >Enviar correo</a>

                        <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-youtube_0.svg);"></a>
                        <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-instagram_0.svg);"></a>
                        <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-twitter_0.svg);"></a>
                        <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-facebook_0.svg);"></a>
                    
                    </div>
                </div> 
                
                <form class="universidad " id="formulariodecontacto"> 
                    <div class="imageninfo"style="background-image: url(imagenes/iconos/inscripcion.svg);"></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">CONSULTAR INSCRIPCIÓN</h1>
                    <input type="text" id="name" name="name" required placeholder="Nombre">
                    <input type="email" id="email" name="email" required placeholder="Correo">
                    <textarea id="message" name="message" required placeholder="Mensaje">Hola. Me gustaría obtener información sobre el proceso de inscripción. Muchas gracias.</textarea>
                    <button class="botonuni" type="submit">Enviar</button>
                </form> 

            </div>
            <div class="botones" id="botones" style="padding-top:0vh;" >
                <button class="boton" onclick="window.location.href='./index.php'">
                    <div class="imagenboton" style="background-image: url(imagenes/iconos/lupa.svg); background-size: 13vh;"></div>
                    <h1>Buscar otra universidad</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('carrera')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/sombrero.svg);"></div>
                    <h1>Ver carreras e ingenierías</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('tecnicatura')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/diploma.svg);"></div>
                    <h1>Ver tecnicaturas y terciarios</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('nombre')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/nombre.svg);"></div>
                    <h1>Buscar por nombre o categoria</h1>
                </button>
            </div>
            <form class="barradebusqueda activo" id="nombre">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <input type="text" name="" placeholder="Nombre o categoria" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda" id="tecnicatura">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <input type="text" name="" placeholder="Nombre de la tecnicatura" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda" id="carrera">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <input type="text" name="" placeholder="Nombre de la carrera" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <div class="universidades lista">
                <div class="universidad"> 
                    <div class="imagenesuni"></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DE LA CARRERA</h1>
                    <p class="descripcionuni">Descripción: Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <button class="botonuni">SABER MAS..</button>
                </div>
                <div class="universidad"> 
                    <div class="imagenesuni"></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DE LA TECNICATURA</h1>
                    <p class="descripcionuni">Descripción: Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <button class="botonuni">SABER MAS..</button>
                </div>
            </div>
            <div class="informacioncarrera lista">
                <div class="barraseparadora" ></div>
                <div class="universidad"> 
                    <div class="imagenesuni" ></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">NOMBRE DE LA CARRERA</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                </div>
                <div class="universidad"> 
                    <div class="imageninfo" style="background-image: url(imagenes/iconos/diploma.svg);"></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">TITULO FINAL</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                </div>
                <div class="universidad"> 
                    <div class="imageninfo"style="background-image: url(imagenes/iconos/recurso.svg);"></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni">MODALIDAD DE CURSADA</h1>
                    <p class="descripcionuni">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non maxime in ab vero? Inventore molestiae dignissimos consectetur velit quae culpa dolorum, voluptas blanditiis exercitationem, earum possimus, et recusandae fugiat ad.</p>
                    <button class="botonuni pop" popovertarget="pdf-container">VER RECURSO</button>
                </div> 
                
                <div class="universidad"> 
                    <div class="imageninfo"style="background-image: url(imagenes/iconos/inscripcion.svg);"></div>
                    <div class="barrauni"></div>
                    <h1 class="nombreuni" style="padding-bottom: 5vh;">CONSULTAR INSCRIPCIÓN</h1>
                    <a class="botonuni" href='#formulariodecontacto'>INSCRIBIRME</a>
                </div>   
                
            </div>
            <div class="barradebusqueda volverarriba">
                <img src="imagenes/iconos/flecha.svg" alt="">
                <button onclick="redirigir('botones')" >Volver arriba</button>
            </div>
        </main>
        <footer class="footer">
            <div class="imagenfooter"></div>
            <div class="logo_pba_vertical2"></div>

            <div class="textofooter">
                <h1>&copy; 2024 Escuela Secundaria Técnica N1 Vicente Lopez. Todos los derechos reservados.</h1>
            </div>
            <div class="redesociales">
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-youtube_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-instagram_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-twitter_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-facebook_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-flicr_0.svg);"></a>
            </div>
        </footer>
        
    </div>
    <div id="pdf-container" popover  class="pop2">
        <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
        <embed class="pdf-viewer" src="pdf/diseño pdf.pdf" type="application/pdf" />
    </div>
    <div id="googlemaps" popover class="pop2">
        <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13150.23923620172!2d-58.542955899999995!3d-34.51404235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb08d0e03c427%3A0xb9671110c4893ecd!2sEasy!5e0!3m2!1ses-419!2sar!4v1719099532427!5m2!1ses-419!2sar" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div id="inscribirme" popover class="pop2">
        <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
        <iframe src="inscripcion.php" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</body>
</html>

<script src="codigojs/carrusel.js"></script>
<script src="codigojs/botonesbarra.js"></script>
<script src="codigojs/redirigir.js"></script>
<script src="codigojs/scroll.js"></script>
<script src="codigojs/enviarcorreo.js"></script>