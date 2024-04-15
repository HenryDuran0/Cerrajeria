<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript">
        function valida_enviar() {
            if(document.form_cita.nombre.value.length == 0) {
                alert("Campo obligatorio vacio (Nombre)");
                document.form_cita.nombre.focus();
                return 0;
            }

            if(document.form_cita.email.value.length == 0) {
                alert("Campo obligatorio vacio (email)");
                document.form_cita.email.focus();
                return 0;
            }

            if(document.form_cita.celular.value.length == 0) {
                alert("Campo obligatorio vacio (celular)");
                document.form_cita.celular.focus();
                return 0;
            }

            if(document.form_cita.horario.value.length == 0) {
                alert("Campo obligatorio vacio (horario)");
                document.form_cita.horario.focus();
                return 0;
            }
            document.form_cita.submit();
        }
    </script>

</head>
<body>
    <?php 
        include("header.php");
        include("buttons.php");
    ?>

    <div class="div_titulo">
        <h2>Agenda una cita ahora</h2>
    </div>

    <div class="cont_cita">
        <form action="raw_enviar_mailer.php" name="form_cita" method="post" class="formu_cita">
            <label for="nombre">Nombre*:</label>
            <input type="text" id="nombre" name="nombre">
            <br><br>

            <label for="email">Email*:</label>
            <input type="text" id="email" name="email">
            <br><br>

            <label for="celular">Celular*:</label>
            <input type="text" id="celular" name="celular">
            <br><br>

            <label for="horario">Horario*:</label>
            <input type="text" id="horario" name="horario">
            <br><br>

            <button onclick="valida_enviar()">Enviar</button>
        </form>
    </div>
    <br><br><br><br><br>

    <?php 
        include("footer.php");
    ?>
</body>
</html>