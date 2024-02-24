<?php

include "coneccion.php";

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id === null) {
    echo "<p>**Error:** No se proporcionó un ID válido.</p>";
    exit();
}


$sql_select = "SELECT * FROM drive WHERE id = $id";
$result = $conn->query($sql_select);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Registro</title>
</head>
<body>
  <h1>Actualizar Registro</h1>
  <form action="procesar_actualizacion.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="marca">Marca:</label>
    <input type="text" name="marca" id="marca" value="<?php echo $row['marca']; ?>" required>
    <br>
    <label for="modelo">Modelo:</label>
    <input type="text" name="modelo" id="modelo" value="<?php echo $row['modelo']; ?>" required>
    <br>
    <label for="color">Color:</label>
    <input type="text" name="color" id="color" value="<?php echo $row['color']; ?>" required>
    <br>
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" value="<?php echo $row['precio']; ?>" required>
    <br>
    <label for="propietario">Propietario:</label>
    <input type="text" name="propietario" id="propietario" value="<?php echo $row['propietario']; ?>" required>
    <br>
    <br>
    <button type="submit">Guardar</button>
    <a href="index.php">Cancelar</a>
  </form>
</body>
</html>
<?php
} else {
    echo "<p>No se encontraron datos para actualizar.</p>";
}
$conn->close();
?>
