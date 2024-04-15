<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        include "header.php";
        include "buttons.php";
    ?>

    <div class="cont3">
        <img src="Images/slide.png" alt="" class="img_slide">
        <div class="img_text">
            <h1>Cerrajería MasterKey</h1>
            <h2>Tu tranquilidad es nuestra misión</h2>
            <a href="citas.php">Agenda una cita</a>
        </div>
    </div>

    <div class="cont4">
       <div class="div_txt_cont4">
            <h2>Contamos con diversos servicios para usted</h2>
            <br><br>
            <h3>Realizado con todas las normal legales y aplicando los más altos estándares de calidad en cada servicio.</h3>
       </div>
    </div>
    
    <div class="cont5">
        <table class="tab_serv">
            <tr class="tab_header">
                <th>Imagen</th>
                <th>Servicio</th>
                <th>Duración</th>
                <th>Área de cobertura</th>
                <th>Precio</th>
            </tr>

            <?php
                require "conexion.php";
                $todos_datos = "SELECT * FROM servicio ORDER BY id_servicio ASC";
                $resultado = mysqli_query($conectar, $todos_datos);

                while ($fila = mysqli_fetch_assoc($resultado)){
            ?>
                <tr class="table_rows">
                    <td class ="cont_fotos">
                        <img class="foto" src="<?php echo $fila{"imagen"} ?>"> 
                    </td>
                    <td><?php echo $fila{"tipo"} ?></td>
                    <td><?php echo $fila{"tiempo"} ?></td>
                    <td><?php echo $fila{"area"} ?></td>
                    <td><?php echo '$'.$fila{"precio"} ?></td>
                </tr>
            <?php
            }
            ?>
            
        </table>
    </div>
    <br><br><br><br><br><br>

    
    <?php
        include("footer.php");
    ?>
    
</body>
</html>