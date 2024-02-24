<?php
include "coneccion.php";

$id = isset($_GET["id"]) ? $_GET["id"] : null;


if ($id === null) {
    echo "<p>**Error:** No se proporcionó un ID válido.</p>";
    exit();
}

$sql = "DELETE FROM drive WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute()
$conn->close();
echo "<p>**Registro eliminado correctamente!**</p>";

echo "<a href='index.php'>Volver al formulario</a>";
?>
