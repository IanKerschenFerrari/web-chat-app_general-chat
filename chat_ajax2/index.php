<?php
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Potato Chat</title>
        <script type="text/javascript">
            function ajax(){
                var req = new XMLHttpRequest();

                req.onreadystatechange = function(){
                    if (req.readyState == 4 && req.status == 200) {
                        document.getElementById('chat').innerHTML = req.responseText;
                    }
                }

                req.open('GET', 'chat.php', true);
                req.send();
            }

            //linea que hace que se refresque la pagina cada segundo
            setInterval(function() {ajax();}, 1000)

        </script>


    </head>

    <body onload="ajax();">
        <div id="contenedor">
            <div id="caja-chat">
                <div id="chat"></div>
            </div>
            <form method='POST' action="index.php">
                <input type="text" name="nombre" placeholder="Ingresa tu nombre">
                <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
                <input type="submit" name="enviar" value="Enviar">
            </form>
            <?php
                if (isset($_POST['enviar'])) {
                    $nombre = $_POST['nombre'];
                    $mensaje = $_POST['mensaje'];

                    $consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
                    $ejecutar = $conexion->query($consulta);

                    if ($ejecutar) {
                        echo "<embed loop='false' src='notification.mp3' hidden='True' autoplay='true'>";
                    }
                }
            ?>
        </div>
    </body> 
</html>