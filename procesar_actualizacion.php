<?php
include "coneccion.php";

$id = $_POST["id"];
$marca = filter_var($_POST["marca"], FILTER_SANITIZE_STRING);
$modelo = filter_var($_POST["modelo"], FILTER_SANITIZE_STRING);
$color = filter_var($_POST["color"], FILTER_SANITIZE_STRING);
$precio = filter_var($_POST["precio"], FILTER_SANITIZE_NUMBER_INT);
$propietario = filter_var($_POST["propietario"], FILTER_SANITIZE_STRING);

$sql = "UPDATE drive SET marca = ?, modelo = ?, color = ?, precio = ?, propietario = ? WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo "Error al preparar la consulta: " . $conn->error;
}

$stmt->bind_param("ssssss", $marca, $modelo, $color, $precio, $propietario, $id);


$stmt->execute();


if ($stmt->errno) {
    echo "Error al ejecutar la consulta: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro actualizado</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Registro actualizado correctamente</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Precio</th>
            <th>Propietario</th>
        </tr>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $marca; ?></td>
            <td><?php echo $modelo; ?></td>
            <td><?php echo $color; ?></td>
            <td><?php echo $precio; ?></td>
            <td><?php echo $propietario; ?></td>
        </tr>
    </table>
    <p><a href="from_user.php">ir a formulario</a></p>
    <p><a href="index.php">ir a base de datos</a></p>
</body>
</html>
