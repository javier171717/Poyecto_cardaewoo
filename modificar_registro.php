<?php
include("conexion.php");

// Verificar si se proporcionan datos válidos
if(isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];
    $propietario = $_POST['propietario'];

    // Actualizar el registro en la base de datos
    $con = connection();
    $query = "UPDATE drive SET marca='$marca', modelo='$modelo', color='$color', precio='$precio', propietario='$propietario' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location: index.php"); // Redirigir de nuevo a la página principal
        exit;
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($con);
    }
} else {
    echo "Datos de actualización inválidos";
}
?>
 