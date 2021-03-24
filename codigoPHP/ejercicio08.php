<html>
    <head>
        <title>Ejercicio 08</title>
    </head>
    <body>
        <?php
        /*
            @author: Bea Merino Macía
            @since: 22/03/2021
            @description: Mostrar la dirección IP del equipo desde el que estás accediendo.
         */
            echo "Dirección IP -> ", $_SERVER["REMOTE_ADDR"]; //Con REMOTE_ADDR extraemos la IP con la que accedemos al servidor
        ?>
    </body>
</html>