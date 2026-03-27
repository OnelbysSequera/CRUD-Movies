<?php require_once 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Películas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Catálogo de Películas</h1>
    <a href="crear.php" class="btn btn-exito">Añadir Nueva Película</a>

    <table>
        <thead>
            <tr>
                <th>Póster</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Lanzamiento</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Relacionamos las dos tablas con INNER JOIN
            $sql = "SELECT p.id, p.nombre, p.descripcion, p.fecha_L, p.url_imagen, g.nombre AS nombre_genero 
                    FROM peliculas p 
                    INNER JOIN generos g ON p.genero_id = g.id";
            
            $resultado = mysqli_query($conn, $sql);

            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td><img src='" . $fila['url_imagen'] . "' width='80'></td>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['descripcion'] . "</td>";
                $fecha_limpia = date("d/m/Y", strtotime($fila['fecha_L']));
                echo "<td>" . $fecha_limpia . "</td>";
                echo "<td>" . $fila['nombre_genero'] . "</td>";
                echo "<td>
                        <a href='editar.php?id=" . $fila['id'] . "' class='btn'>Editar</a>
                        <a href='eliminar.php?id=" . $fila['id'] . "' class='btn btn-peligro'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>