<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bod">
    <?php
        include("seguridad.php");
        include("header.php");
    ?>

    <div class="cont2">
        <a href="panel.php">INICIO</a>
        <a href="servicios.php">SERVICIOS</a>
        <a href="usuarios.php">USUARIOS</a>
        <a href="salir.php">CERRAR SESIÓN</a>
    </div>
    <br><br><br><br><br><br>

    <div class="cont5">
        <table class="tab_serv">
            <tr class="tab_header">
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Duracion</th>
                <th>Área de cobertura</th>
                <th>Foto</th>
                <th>Eliminar</th>
            </tr>

            <?php
                require "conexion.php";
                $todos_datos = "SELECT * FROM servicio ORDER BY id_servicio ASC";
                $resultado = mysqli_query($conectar, $todos_datos);

                while ($fila = mysqli_fetch_assoc($resultado)){
            ?>
                <tr class="table_rows">
                    <td><?php echo $fila{"id_servicio"} ?></td>
                    <td><?php echo $fila{"tipo"} ?></td>
                    <td><?php echo '$'.$fila{"precio"} ?></td>
                    <td><?php echo $fila{"tiempo"} ?></td>
                    <td><?php echo $fila{"area"} ?></td>
                    <td class ="cont_fotos">
                        <img class="foto" src="<?php echo $fila{"imagen"} ?>"> 
                    </td>
                    <td class="tabla_elim">
                        <a href="#" onclick="validar('eliminar_serv.php?id=<?php echo $fila['id_servicio']; ?>')">Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            
        </table>
    </div>
    
    <div class="nuevo_serv">
        <h1>NUEVO SERVICIO</h1>
        <form action="guardar_serv.php" method="post" class="form_serv" enctype="multipart/form-data">
            
            <label for="tipo">Tipo/nombres:</label>
            <input id="tipo" name="tipo" type="text" maxlength="100">
            <br><br><br>

            <label for="precio">Precio:</label>
            <input id="precio" name="precio" type="text" maxlength="7">
            <br><br><br>

            <label for="tiempo">Duración de servicio: </label>
            <input id="tiempo" name="tiempo" type="text" maxlength="50" >
            <br><br><br>

            <label for="area">Área de cobertura:</label>
            <input id="area" name="area" type="text" maxlength="150">
            <br><br><br>

            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto"
            class="file">
            <br><br><br><br><br><br>

            <button type="submit" class="btn_guard_serv">GUARDAR SERVICIO</button>
        </form>
    </div>
    <br><br><br><br><br><br>

    <?php 
        include("footer.php");
    ?>

    <script>
        function validar(url) {
            var eliminar = confirm("Se eliminará el servicio")
            if(eliminar == true) {
                window.location = url;
            }
        }
    </script>

</body>
</html>