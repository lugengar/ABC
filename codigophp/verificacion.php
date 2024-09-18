<?php
session_start();
function cerrarsesion(){
    session_destroy();
}
$admin = "AND habilitado = 0";
$admin2 = "AND e.habilitado = 0";
function mostrarocultos(){
    global $admin;
    global $admin2;
    if(isset($_SESSION["id_usuario"])){
        if($_SESSION["id_usuario"] != null){
            $admin = "";
            $admin2 = "";
        }
   }
}
function esadmin(){
    if(isset($_SESSION["id_usuario"])){
        if($_SESSION["id_usuario"] == null){
            header("Location: ../index.php");
        }
   }else{
        header("Location: ../index.php");
   }
}
function entraradmin(){
    if(isset($_SESSION["id_usuario"])){
        if($_SESSION["id_usuario"] != null){
            header("Location: ./inicio.php");
        }
   }
}
function estaoculta($habilitado){
    if($habilitado == 1 && !isset($_SESSION["id_usuario"])){
        header("Location: index.php");
    }
}
function animaciones(){
    global $animaciones;
    if($animaciones){
        echo ' <link rel="stylesheet" href="estiloscss/animaciones.css">';
    }
}
?>