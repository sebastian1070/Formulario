Con respecto al taller básicamente se tenia que realizar un formulario donde este tuviera los siguientes campos (Nombre, correo, ciudad, solicitud o queja) este formulario tenía que ser creado con html, php y MySQL opcional ponerle estilos de diseño. Para el funcionamiento de este formulario habían varios factores a tener en cuenta.
Primero: Se tenia que validar que en los campos requeridos no se introdujera información errónea como por ejemplo poner números en el nombre o en la ciudad.
Segundo: Se tenia que tener en cuenta que todos los campos se rellenaran antes de dar clic al botón enviar, para que no se guardara información en blanco.
Tercero: Antes de enviar la información puesta en el formulario se tenia que verificar que el correo ingresado no estuviera en la base de datos, en otras palabras, que no estuviera registrado. Si este ya se encontraba dentro de la base de datos, al momento de dar clic en enviar el formulario tenía que arrojar una alerta donde dijera “El correo ya se encuentra registrado” esto con el fin de no repetir información en la base de datos. 

Explicación del código utilizado:
 
En esta captura se muestra el código utilizado en html para la estructura del formulario. Para el desarrollo de esta estructura utilicé algunas etiquetas ya vistas en clase, sin embargo, añadí etiquetas y clases extras como el <div> y class para utilizarlas en mi archivo style.css con el objetivo de dar mejor apariencia al formulario. 
En la parte final por fuera de la etiqueta <form> introduje código PHP dentro del cual se muestra include("send.php") esta se incluye con el objetivo de incorporar (o incluir) el contenido del archivo “send.php” que es donde se arroja toda la lógica del comportamiento del formulario. 
 
En el archivo llamado conexión.php vemos que aquí estoy llamando una conexión con una base de datos MySQL, mediante este segmento de código: $conex = mysqli_connect("localhost", "root", "", "formulario"); 
Viendo este código más en detalle mysqli_connect(): Es una función incorporada en PHP y esta se utiliza para conectarse a una base de datos MySQL.
Los parámetros que se pasan a esta función son los siguientes:
"localhost": El nombre del servidor de la base de datos. En este caso, se está conectando a una base de datos que se encuentra en el mismo servidor donde se ejecuta el código (localhost).
"root": El nombre de usuario de la base de datos. En muchos casos, “root” es el usuario predeterminado para acceder a MySQL.
"": La contraseña del usuario de la base de datos. En este caso, no se proporciona una contraseña (por eso está en blanco).
"formulario": El nombre de la base de datos a la que se desea conectar. En este ejemplo, se está conectando a una base de datos llamada “formulario”.


 
En este archivo llamado send.php vemos que es aquí donde se coloca a prueba toda la lógica para el correcto funcionamiento del formulario en donde voy a tratar de resumirlo:
include("conexion.php");: Esta línea incluye el archivo “conexion.php” en el código actual. El archivo “conexion.php” contiene la lógica para establecer una conexión con una base de datos, que es la imagen vista anteriormente.
if (isset($_POST['send'])) { ... }: Aquí es donde se verifica si se ha enviado un formulario mediante el botón con el nombre “send”. Si el botón se ha presionado, el código dentro de este bloque se ejecutará.
Verificación de registro existente: $validar = "SELECT * FROM datos WHERE email='$email'";
        $validando = $conex->query($validar);
        if ($validando->num_rows > 0) {
            ?>
            <h3 class="success">El correo ya se encuentra registrado</h3>
            <?php
1.	$validar = "SELECT * FROM datos WHERE email='$email'";:
Esta línea de código crea una consulta SQL para seleccionar todos los registros de la tabla “datos” donde el valor de la columna “email” coincide con el valor almacenado en la variable $email.
La consulta busca si ya existe un registro con el mismo correo electrónico en la base de datos.
2.	 $validando = $conex->query($validar);:
Aquí se ejecuta la consulta SQL utilizando la conexión a la base de datos almacenada en la variable $conex.
La función query() ejecuta la consulta y devuelve un objeto de resultado ($validando en este caso).
3.	 if ($validando->num_rows > 0) { ... }:
Se verifica si el resultado de la consulta tiene más de 0 filas (es decir, si se encontró algún registro con el mismo correo electrónico).
Si se encuentra al menos un registro, se ejecuta el bloque de código dentro de las llaves { ... }.
4.	 Mensaje de éxito:
Dentro del bloque condicional, se muestra un mensaje de éxito en forma de encabezado (<h3>) con la clase de estilo “success”.
El mensaje indica que el correo electrónico ya está registrado en la base de datos.
5.	Inserción de datos:
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
Si no hay registros previos con el mismo correo, se ejecuta la consulta SQL para insertar los datos en la tabla “datos”.
Si la inserción es exitosa, se muestra un mensaje de éxito.
            if ($resultado) {
                ?>
                <h3 class="success">Información enviada correctamente</h3>
                <?php
            }
Si ocurre algún error durante la inserción, se muestra un mensaje de error.
else {
                ?>
                <h3 class="error">Ocurrió un error</h3>
                <?php
            }
        }
6.	Manejo de campos vacíos:
Si alguno de los campos está vacío, se muestra un mensaje de error indicando que todos los campos deben llenarse.
else {
        ?>
        <h3 class="error">Llene todos los campos</h3>
        <?php
    }
}
?>
