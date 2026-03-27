<?php
require_once 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha_L'];
$genero_id = $_POST['genero_id'];

$sql = "UPDATE peliculas SET nombre='$nombre', descripcion='$descripcion', fecha_L='$fecha', genero_id=$genero_id WHERE id=$id";
mysqli_query($conn, $sql);

if (!empty($_FILES['nueva_imagen']['name'])) {
    
    $res_vieja = mysqli_query($conn, "SELECT url_imagen FROM peliculas WHERE id = $id");
    $fila_vieja = mysqli_fetch_assoc($res_vieja);
    if (file_exists($fila_vieja['url_imagen'])) {
        unlink($fila_vieja['url_imagen']);
    }

    $ruta_nueva = "img/" . basename($_FILES["nueva_imagen"]["name"]);
    if (move_uploaded_file($_FILES["nueva_imagen"]["tmp_name"], $ruta_nueva)) {
        // 3. Actualizamos la ruta en la base de datos
        mysqli_query($conn, "UPDATE peliculas SET url_imagen='$ruta_nueva' WHERE id=$id");
    }
}

header("Location: index.php");
?>