﻿<html>
    <head>
        <title>Ejercicio 03</title>
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                @since: 18/03/2021.
                @description: Mostrar en tu página index la fecha y hora actual formateada en castellano
            */

                date_default_timezone_set("Europe/Madrid"); //Ajustamos la zona horaria española

                setlocale(LC_ALL, "es_ES.UTF-8");//Seleccionamos el idioma

                echo "La hora en España es ";//Damos formato al resultado

                echo strftime("%T %A %e %B %Y"); //strftime es una función que formatea la fecha y hora
        ?>
    </body>
</html>