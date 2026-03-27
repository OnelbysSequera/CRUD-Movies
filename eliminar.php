<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar y borrar el archivo físico primero
    $resultado = mysqli_query($conn, "SELECT url_imagen FROM peliculas WHERE id = $id");
    if ($fila = mysqli_fetch_assoc($resultado)) {
        if (!empty($fila['url_imagen']) && file_exists($fila['url_imagen'])) {
            unlink($fila['url_imagen']); 
        }
    }

    // Borrar de la base de datos
    mysqli_query($conn, "DELETE FROM peliculas WHERE id = $id");
}

header("Location: index.php");
?>