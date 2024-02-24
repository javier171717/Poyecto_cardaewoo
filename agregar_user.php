<?php
include "coneccion.php";

if (empty($_POST["marca"]) || empty($_POST["modelo"]) || empty($_POST["color"]) || empty($_POST["precio"]) || empty($_POST["propietario"])) {
    echo "<p>**Error:** Todos los campos son obligatorios.</p>";
    exit();
}

$marca = filter_var($_POST["marca"], FILTER_SANITIZE_STRING);
$modelo = filter_var($_POST["modelo"], FILTER_SANITIZE_STRING);
$color = filter_var($_POST["color"], FILTER_SANITIZE_STRING);
$precio = filter_var($_POST["precio"], FILTER_SANITIZE_NUMBER_INT);
$propietario = filter_var($_POST["propietario"], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO drive (marca, modelo, color, precio, propietario) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $marca, $modelo, $color, $precio, $propietario);
$stmt->execute();
$stmt->close();

$id = $conn->insert_id;

$conn->close();

echo "<p>Registro guardado correctamente!</p>";

echo "<p>Datos ingresados:</p>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Color</th><th>Precio</th><th>Propietario</th></tr>";
echo "<tr><td>$id</td><td>$marca</td><td>$modelo</td><td>$color</td><td>$precio</td><td>$propietario</td></tr>";
echo "</table>";

echo"<p><a href='from_user.php'>Ir al formulario</a></p>";

?>
