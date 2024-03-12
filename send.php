<?php
include("conexion.php");
if (isset($_POST['send'])) { /*Cuando se presione el botón llamado "send" va a ejecutar el formulario*/
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['ciudad']) >= 1 && strlen($_POST['solicitud']) >= 1) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $ciudad = trim($_POST['ciudad']);
        $solicitud = trim($_POST['solicitud']);
        $fecha = date("d/m/y");

        /*Consulta para verificar que el registro no exista*/
        $validar = "SELECT * FROM datos WHERE email='$email'";
        $validando = $conex->query($validar);
        if ($validando->num_rows > 0) {
            ?>
            <h3 class="success">El correo ya se encuentra registrado</h3>
            <?php
        } else {
            $consulta = "INSERT INTO datos(nombre, email, ciudad, solicitud, fecha) VALUES('$name','$email','$ciudad','$solicitud','$fecha') ";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado) {
                ?>
                <h3 class="success">Información enviada correctamente</h3>
                <?php
            } else {
                ?>
                <h3 class="error">Ocurrió un error</h3>
                <?php
            }
        }
    } else {
        ?>
        <h3 class="error">Llene todos los campos</h3>
        <?php
    }
}
?>