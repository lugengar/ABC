<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estiloscss/cargardatos.css">
    <link rel="stylesheet" href="../estiloscss/animaciones.css">
    <link rel="icon" href="https://abc.gob.ar/core/themes/abc/favicon.ico" type="image/vnd.microsoft.icon">

    <title>Visualizador de Establecimientos</title>
</head>
<style>
.universidad3 {
    padding: 2vh;
    border-radius: 1vh;
    position: relative;
    box-shadow: 0 0.5vh 1vh rgba(0, 0, 0, 0.1);
    overflow:hidden;
}
.imagenuni4{
    width: 40vh;
    height:auto;
}
/* Estilo del nombre del establecimiento */
.universidad3 p {
    font-size: 2.5vh;
    margin-bottom: 1vh;
    font-weight: bold;
}

/* Estilo de los elementos <details> */
.universidad3 details {
    margin-top: 1vh;
    padding: 1vh;
    background-color: #ffffff;
    border: 0.1vh solid #ccc;
    border-radius: 0.5vh;
}

/* Estilo de los elementos <summary> */
.universidad3 summary {
    font-size: 2vh;
    cursor: pointer;
}

/* Lista de carreras */
.universidad3 ul {
    list-style-type: none;
    margin: 1vh 0;
    padding: 0;
}

/* Elementos de la lista */
.universidad3 li {
    font-size: 1.8vh;
    margin: 0.5vh 0;
}

/* Estilo para los elementos anidados en <details> */
.universidad3 details details {
    margin-top: 1vh;
    padding-left: 2vh;
    border-left: 0.2vh dashed #ccc;
}
/* Estilos de los botones */
.btn {
    display: inline-block;
    margin-top: 1vh;
    padding: 1vh 2vh;
    text-decoration: none;
    color: #fff;
    border-radius: 0.5vh;
    font-size: 1.8vh;
    cursor: pointer;
}

/* Botón de editar */
.btn.editar {
    background-color: #78568e; /* Verde */
}
.btn.añadir {
    background-color: #00adc1; /* Verde */
}

.btn.ver {
    background-color: #37799f; /* Verde */
}
/* Botón de eliminar */
.btn.eliminar {
    background-color: #e81f76; /* Rojo */
}

/* Espaciado para las acciones */
.actions {
    margin-top: 1vh;
    display: flex;
    gap: 1vh;
    flex-wrap: wrap; /* Permite que los botones se ajusten en pantallas pequeñas */
}
/* Estilos para el formulario de búsqueda */

</style>
<body><?php
include "../codigophp/conexionbs.php";
include "../claves.php";
include "../codigophp/verificacion.php";
esadmin();
// Obtener el término de búsqueda si existe
$search = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Modificar la consulta para incluir la búsqueda
$establecimientos_query = "SELECT * FROM establecimiento WHERE id_establecimiento != 0";

if (!empty($search)) {
    // Filtrar por nombre del establecimiento
    $establecimientos_query .= " AND nombre LIKE ?";
}

$establecimientos_stmt = mysqli_prepare($conn, $establecimientos_query);

if (!empty($search)) {
    $search_param = '%' . $search . '%';
    mysqli_stmt_bind_param($establecimientos_stmt, 's', $search_param);
}

mysqli_stmt_execute($establecimientos_stmt);
$establecimientos_result = mysqli_stmt_get_result($establecimientos_stmt);
$establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);

// Consultas restantes
$carrera_result = mysqli_query($conn, "SELECT * FROM carrera");
$contacto_result = mysqli_query($conn, "SELECT * FROM contacto");
$imagenes_result = mysqli_query($conn, "SELECT * FROM imagenes");
$planes_estudio_result = mysqli_query($conn, "SELECT * FROM recursos");

$carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
$planes_estudio = mysqli_fetch_all($planes_estudio_result, MYSQLI_ASSOC);
$contacto_result = mysqli_fetch_all($contacto_result, MYSQLI_ASSOC);
$imagenes_result = mysqli_fetch_all($imagenes_result, MYSQLI_ASSOC);
?>



    <div class="container">
    <header class="header" id="header">
            <a href="../index.php" class="logo_pba_horizontal " ></a>
            <a href="../index.php" class="boton_nose_que_estudiar">Inicio<div class="circulopregunta" style="background-image: url(../imagenes/iconos/casa.svg); background-size: 4vh;"></div></a>
        </header>
        <div class="botones">
                <a class="boton" href="agregar.php">
                    <div class="imagenboton" style="background-image: url(../imagenes/iconos/agregar.svg);  background-size: contain;"></div>
                    <h1>Formulario agregar</h1>
                </a>
                <a class="boton" href="eliminar.php">
                    <div class="imagenboton" style="background-image: url(../imagenes/iconos/borrar.svg); background-size: contain;"></div>
                    <h1>Formulario eliminar</h1>
                </a>
                <a class="boton" href="modificar.php">
                    <div class="imagenboton" style="background-image: url(../imagenes/iconos/modifcar1.svg); background-size: contain;"></div>
                    <h1>Formulario modificar</h1>
                </a>
            
        </div>
        <form class="barradebusqueda activo"  method="GET" action="">
               <p class="barratexto">Nombre del establecimiento <img src="imagenes/iconos/lupa.svg" class="imglupa" alt=""></p>
            <div style="gap:2vh;">
                <input type="text" name="busqueda" maxlength ="35" placeholder="Nombre" required>
                <input type="submit" value="Buscar">
                </div>
            </form>
            <div class="universidades">
    <?php foreach ($establecimientos as $establecimiento) { ?>
    <div class="universidad3" >
   

        <div class="establecimiento-content">

            <div class="detalle-establecimiento">
            <?php $texto = "Publicado";
                if($establecimiento['habilitado'] == "1"){
                    $texto = "No publicado";
                }?>
                <p><strong><?php echo $texto.' - '.$establecimiento['nombre']; ?>  </strong>
            
                
          </p>

                <div class="actions">
                <?php
                if($establecimiento['habilitado'] == "1"){
                    echo '<a class="redsocial2" href="./prossmodificar.php?tabla=habilitado&id_establecimiento='.$establecimiento['id_establecimiento'].'&habilitado='.$establecimiento['habilitado'].'" style="background-image: url(../imagenes/iconos/candado2.svg); background-color: #e81f76;"> </a>';
                }else{
                    echo '<a class="redsocial2" href="./prossmodificar.php?tabla=habilitado&id_establecimiento='.$establecimiento['id_establecimiento'].'&habilitado='.$establecimiento['habilitado'].'" style="background-image: url(../imagenes/iconos/candado_desbloqueado.svg); background-color: #00adc1;"></a>';

                }?>
                <a href="../universidad.php?universidad=<?php echo $establecimiento['id_establecimiento']; ?>" class="btn ver" target="_blank">Visualizar establecimiento</a>

                    <a href="modificar.php?tabla=establecimiento&id=<?php echo $establecimiento['id_establecimiento']; ?>" class="btn editar">Editar Establecimiento</a>

                    <a href="eliminar.php?tabla=establecimiento&id=<?php echo $establecimiento['id_establecimiento']; ?>" class="btn eliminar">Eliminar Establecimiento</a>

                </div>

                <details>
                    <summary>Carreras</summary>
                    <ul>
                        <?php 
                                                
                        $carreras_agregadas = [];

                        foreach ($planes_estudio as $plan) {
                            foreach ($carreras as $carrera) {
                                if ($plan['fk_establecimiento'] == $establecimiento['id_establecimiento'] && $plan['fk_carrera'] == $carrera['id_carrera']) {
                                    if (!isset($carreras_agregadas[$carrera['id_carrera']])) {
                                        $carreras_agregadas[$carrera['id_carrera']] = [
                                            'nombre' => $carrera['nombre'],
                                            'id_carrera' => $carrera['id_carrera'],
                                            'planes' => [],
                                            'diseños' => []
                                        ];
                                    }

                                    if ($plan['tipo_recurso'] === 'plan de estudio') {
                                        $carreras_agregadas[$carrera['id_carrera']]['planes'][] = $plan;
                                    } else if ($plan['tipo_recurso'] === 'diseño curricular') {
                                        $carreras_agregadas[$carrera['id_carrera']]['diseños'][] = $plan;
                                    }
                                }
                            }
                        }

                        foreach ($carreras_agregadas as $id_carrera => $data) {
                            echo '<li><h1>' . $data['nombre'].'</h1>';

                            echo '<div class="actions">';
                            echo '<a href="agregar.php?tabla=recursos&id=' . $establecimiento["id_establecimiento"] . '&id2=' . $data["id_carrera"] . '" class="btn añadir">Añadir recurso</a>';
                            //echo '<a href="prosseliminar.php?tabla=planestudio&id=' . $id_carrera . '" class="btn eliminar">Eliminar Carrera del establecimiento</a>';

                            echo '</div>';

                            if (!empty($data['planes'])) {
                                echo '<details><summary>Plan de Estudio</summary><ul>';
                                foreach ($data['planes'] as $plan) {
                                    if($plan['pdf'] != ""){
                                    echo '<li><h1>' . $plan['pdf'].'</h1>';
                                    echo '<div class="actions">';
                                    echo '<a href="../codigophp/verpdf.php?pdf=' . $plan['pdf'] . '" class="btn ver" target="_blank">Visualizar Plan</a>';

                                    echo '<a href="modificar.php?tabla=recursos&id=' . $plan['id_recurso'] . '" class="btn editar">Editar Plan</a>';
                                    echo '<a href="eliminar.php?tabla=recursos&id=' . $plan['id_recurso'] . '" class="btn eliminar">Eliminar Plan</a>';
                                    echo '</div>';
                                    echo '</li>';
                                    }
                                }
                                echo '</ul></details>';
                            }

                            if (!empty($data['diseños'])) {
                                echo '<details><summary>Diseño Curricular</summary><ul>';
                                foreach ($data['diseños'] as $diseño) {
                                    if($diseño['pdf'] != ""){
                                    echo '<li><h1>' . $diseño['pdf'].'</h1>';
                                    echo '<div class="actions">';
                                    echo '<a href="../codigophp/verpdf.php?pdf=' . $diseño['pdf'] . '" class="btn ver" target="_blank">Visualizar Diseño</a>';

                                    echo '<a href="modificar.php?tabla=recursos&id=' . $diseño['id_recurso'] . '" class="btn editar">Editar Diseño</a>';
                                    echo '<a href="eliminar.php?tabla=recursos&id=' . $diseño['id_recurso'] . '" class="btn eliminar">Eliminar Diseño</a>';
                                    echo '</div>';
                                    echo '</li>';
                                    }
                                }
                                echo '</ul></details>';
                            }

                            echo '</li>';
                        }


                        ?>
                    </ul>
                </details>
                    <?php
                        echo '<a href="agregar.php?tabla=recursos&id=' . $establecimiento['id_establecimiento'] .'&id2=" class="btn añadir">Añadir Carrera</a>';
                    
                    ?>
                <details>

                    <summary>Contactos</summary>
                    <ul>
                        <?php 
                        foreach ($contacto_result as $contacto) {
                            if ($contacto['fk_establecimiento'] == $establecimiento['id_establecimiento']) {
                                echo '<li><h1>' .$contacto['tipo'].' - '. $contacto['contacto'].'</h1>';
                                
                                echo '<div class="actions">';
                                if($contacto["tipo"] != "telefono" && $contacto["tipo"] != "correo"){
                                echo '<a href="' . $contacto['contacto'] . '"target="_blank" class="btn ver">Visualizar Contacto</a>';

                                }
                                echo '<a href="modificar.php?tabla=contacto&id=id=' . $contacto['id_contacto'] . '" class="btn editar">Editar Contacto</a>';

                                echo '<a href="eliminar.php?tabla=contacto&id=' . $contacto['id_contacto'] . '" class="btn eliminar">Eliminar Contacto del establecimiento</a>';

                                echo '</div>';
                            }
                            
                        }
                        ?>
                    </ul>
                </details>
                    <?php
                        echo '<a href="agregar.php?tabla=contacto&id=' . $establecimiento['id_establecimiento'] .'" class="btn añadir">Añadir Contacto</a>';
                    ?>
                <details>

                <summary>Imagenes</summary>
                <ul>
                    <?php 
                    foreach ($imagenes_result as $imagen) {
                        if ($imagen['fk_establecimiento'] == $establecimiento['id_establecimiento']) {
                            echo '<li><h1>' .$imagen['url'].'</h1>';
                            echo '<img class="imagenuni4" src="../imagenes/universidades/'.$imagen['url'].'">';
                            echo '<div class="actions">';

                            echo '<a href="eliminar.php?tabla=imagenes&id=' . $imagen['id_imagen'] . '" class="btn eliminar">Eliminar imagen del establecimiento</a>';

                            echo '</div>';
                        }
                        
                    }
                    ?>
                </ul>
                </details>
                <?php
                        echo '<a href="agregar.php?tabla=imagenes&id=' . $establecimiento['id_establecimiento'] .'" class="btn añadir">Añadir Imagenes</a>';
                    ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
    </div>
</body>
</html>
