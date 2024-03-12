<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body> 
<form method="post" autocomplete="off">
    <img src="images/logo.svg" alt="">
    <div class="input-group">
        <div class="input-container">
            <input type="text" name="name" placeholder="Nombre completo" pattern="[a-zA-Z]+">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-container">
            <input type="email" name="email" placeholder="Correo electronico">
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-container">
            <input type="ciudad" name="ciudad" placeholder="Ciudad donde escribe" pattern="[a-zA-Z]+">
            <i class="fa-solid fa-earth-americas"></i>
        </div>
        <div class="input-container">
            <input type="solicitud" name="solicitud" placeholder="Solicitud o queja...">
            <i class="fa-solid fa-hand-point-up"></i>
        </div>
        <input name="send"type="submit" class="btn" value="Enviar">
    </div>
</form>
<?php
    include("send.php")
?>
</body>
</html>