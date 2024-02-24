<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FERRARICARDS</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="background-image">
        <div class="container">
            <div class="card">
                <h1>FERRARICARDS</h1>
                <form id = "moviefrom" action="agregar_user.php" method="post">
                    <label for="marca">Marca:</label>
                    <input type="text" name="marca" id="marca" required>
                    <br>
                    <label for="modelo">Modelo:</label>
                    <input type="text" name="modelo" id="modelo" required>
                    <br>
                    <label for="color">Color:</label>
                    <input type="text" name="color" id="color" required>
                    <br>
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" required>
                    <br>
                    <label for="propietario">Propietario:</label>
                    <input type="text" name="propietario" id="propietario" required>
                    <br>
                    <br>
                    <button type="submit">Guardar</button>
                    <button type="button" onclick="limpiarInputs()">Borrar</button>
                    <a href='index.php'>Base de datos</a>
                </form>
            </div>
        </div>
    </div>
    <footer>
      <span>
        Hecho por <strong>Javier Jimenez</strong></span></br>
        Todos los derechos resrevados &copy; 2024</span>  
    </footer>
    <script src="index.php"></script>
    <script>
        function limpiarInputs() {
          const inputs = document.querySelectorAll("#moviefrom input");
          const select = document.getElementById("action");
          inputs.forEach(input => {
            input.value = "";
          });
          
          select.value = "yes"; 
        }
      </script>
</body>
</html>
