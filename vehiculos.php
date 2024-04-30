<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bod">
    <?php
        include("seguridad.php");
        include("header.php");
    ?>

    <div class="cont2">
        <a href="panel.php">INICIO</a>
        <a href="vehiculos.php">VEHICULOS</a>
        <a href="usuarios.php">USUARIOS</a>
        <a href="salir.php">CERRAR SESIÓN</a>
    </div>
    <br><br><br><br><br><br>

    <div class="cont5">
        <table class="tab_serv">
            <tr class="tab_header">
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Precio</th>
                <th>Foto</th>
                <th>Eliminar</th>
            </tr>

            <?php
                require "conexion.php";
                $todos_datos = "SELECT * FROM vehiculo ORDER BY id_vehiculo ASC";
                $resultado = mysqli_query($conectar, $todos_datos);

                while ($fila = mysqli_fetch_assoc($resultado)){
            ?>
                <tr class="table_rows">
                    <td><?php echo $fila["id_vehiculo"] ?></td>
                    <td><?php echo $fila["marca"] ?></td>
                    <td><?php echo $fila["modelo"] ?></td>
                    <td><?php echo $fila["año"] ?></td>
                    <td><?php echo '$'.$fila["precio"] ?></td>
                    <td class ="cont_fotos">
                        <img class="foto" src="<?php echo $fila["imagen"] ?>"> 
                    </td>
                    <td class="tabla_elim">
                        <a href="#" onclick="validar('eliminar_vehiculo.php?id=<?php echo $fila['id_vehiculo']; ?>')">Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            
        </table>
    </div>
    
    <div class="nuevo_vehiculo">
        <h1>NUEVO VEHICULO</h1>
        <form action="guardar_vehiculo.php" method="post" class="form_vehiculo" enctype="multipart/form-data">
            
            <label for="marca">Marca:</label>
            <input id="marca" name="marca" type="text" maxlength="50">
            <br><br><br>

            <label for="modelo">Modelo:</label>
            <input id="modelo" name="modelo" type="text" maxlength="50">
            <br><br><br>

            <label for="año">Año: </label>
            <input id="año" name="año" type="text" maxlength="4" >
            <br><br><br>

            <label for="precio">Precio:</label>
            <input id="precio" name="precio" type="text" maxlength="10">
            <br><br><br>

            <label for="imagen">Foto:</label>
            <input type="file" id="imagen" name="imagen"
            class="file">
            <br><br><br><br><br><br>

            <button type="submit" class="btn_guard_vehiculo">GUARDAR VEHICULO</button>
        </form>
    </div>
    <br><br><br><br><br><br>

    <?php 
        include("footer.php");
    ?>

    <script>
        function validar(url) {
            var eliminar = confirm("Se eliminará el vehiculo de la base de datos")
            if(eliminar == true) {
                window.location = url;
            }
        }
    </script>

</body>
</html>