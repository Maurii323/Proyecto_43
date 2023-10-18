<?php require("session.php"); 
if(isset($_SESSION["usuario"])){
    header("location: Practica09-26admin.php");
    exit();
}
require_once("conexion.php");
?>
<?php
if(isset($_POST["usuario"])){
    $usuario = trim($_POST["usuario"]);
    $contraseña = sha1(trim($_POST["contraseña"]));
    $asd = new BaseDeDatos();

    $validacion = $asd->compararGeneral($usuario, $contraseña);
    $admin = $asd->compararAdmin($usuario, $contraseña);

    if($validacion){
        if($admin){
            $_SESSION["usuario"] = $_POST["usuario"];
            $_SESSION["contraseña"] = $_POST["contraseña"];
            header("location: admin.php");
            exit();
        }else{
            $_SESSION["usuario"] = $_POST["usuario"];
            $_SESSION["contraseña"] = $_POST["contraseña"];
            header("location: profesor.php");
            exit();
        }

    }else{
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
