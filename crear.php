<?php require_once 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Película</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Añadir Película</h1>
    <form action="guardar.php" method="POST" enctype="multipart/form-data">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" required></textarea><br><br>

        <label>Fecha:</label><br>
        <input type="date" name="fecha_L" required><br><br>

        <label>Género:</label><br>
        <select name="genero_id" required>
            <option value="">Seleccione...</option>
            <?php
            $res = mysqli_query($conn, "SELECT * FROM generos");
            while ($gen = mysqli_fetch_assoc($res)) {
                echo "<option value='" . $gen['id'] . "'>" . $gen['nombre'] . "</option>";
            }
            ?>
        </select><br><br>

        <label>Póster:</label><br>
        <input type="file" name="imagen_poster" accept="image/*" required><br><br>

        <button type="submit" class="btn btn-exito">Guardar</button>
        <a href="index.php" class="btn">Cancelar</a>
    </form>
</body>
</html>