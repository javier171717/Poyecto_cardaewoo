<?php
include "coneccion.php";


if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM drive WHERE id = $delete_id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<p>Registro eliminado correctamente.</p>";
    } else {
        echo "<p>Error al eliminar el registro: " . $conn->error . "</p>";
    }
}

$sql = "SELECT * FROM drive";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Registros existentes en la base de datos:</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Color</th><th>Precio</th><th>Propietario</th><th>Acciones</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["marca"] . "</td>";
        echo "<td>" . $row["modelo"] . "</td>";
        echo "<td>" . $row["color"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "<td>" . $row["propietario"] . "</td>";
        echo "<td><a href='actualizar_registro.php?id=" . $row["id"] . "'>Actualizar</a> | <a href='index.php?delete_id=" . $row["id"] . "'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<p><a href='from_user.php'>Ir al formulario</a></p>";
} else {
    echo "<p>Hojo..Has eliminado el ultimo registro en la base de datos.</p>";
}
echo "<p><a href='from_user.php'>Estimado usuario resgistrate aqui</a></p>";

$conn->close();
?>
