<?php
require_once 'conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha_L'];
$genero_id = $_POST['genero_id'];

$ruta_final = "img/" . basename($_FILES["imagen_poster"]["name"]);

if (move_uploaded_file($_FILES["imagen_poster"]["tmp_name"], $ruta_final)) {
    $sql = "INSERT INTO peliculas (nombre, descripcion, fecha_L, genero_id, url_imagen) 
            VALUES ('$nombre', '$descripcion', '$fecha', $genero_id, '$ruta_final')";
    mysqli_query($conn, $sql);
}
header("Location: index.php");
?>