<?php 
require_once 'conexion.php'; 
$id = $_GET['id'];
$resultado = mysqli_query($conn, "SELECT * FROM peliculas WHERE id = $id");
$pelicula = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Película</h1>
    <form action="actualizar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $pelicula['id']; ?>">
        
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo $pelicula['nombre']; ?>" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" required><?php echo $pelicula['descripcion']; ?></textarea><br><br>

        <label>Fecha:</label><br>
        <input type="date" name="fecha_L" value="<?php echo $pelicula['fecha_L']; ?>" required><br><br>

        <label>Género:</label><br>
        <select name="genero_id" required>
            <?php
            $res = mysqli_query($conn, "SELECT * FROM generos");
            while ($gen = mysqli_fetch_assoc($res)) {
                $seleccionado = ($gen['id'] == $pelicula['genero_id']) ? "selected" : "";
                echo "<option value='" . $gen['id'] . "' $seleccionado>" . $gen['nombre'] . "</option>";
            }
            ?>
        </select><br><br>

        <label>Póster Actual:</label><br>
        <img src="<?php echo $pelicula['url_imagen']; ?>" width="100"><br>
        
        <label>Cambiar Póster (Opcional):</label><br>
        <input type="file" name="nueva_imagen" accept="image/*"><br><br>

        <button type="submit" class="btn btn-exito">Actualizar</button>
        <a href="index.php" class="btn">Cancelar</a>
    </form>
</body>
</html>