<html>
    <head>
        <title>Ejercicio 03</title>
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                Fecha: 18/03/2021.
                Mostrar en tu página index la fecha y hora actual formateada en castellano
            */

                date_default_timezone_set("Europe/Madrid"); //Ajustamos la zona horaria española

                setlocale(LC_ALL, "es_ES.UTF-8");//Seleccionamos el idioma

                echo "<h2>Fecha usando strftime()</h2>";

                echo strftime("%T %A %e %B %Y"); //strftime es una función que formatea la fecha y hora

                
                $fecha = new DateTime();//Creamos un objeto DateTime()
                
                echo "<h2>Fecha usando DateTime()</h2>";

                echo $fecha->format('d-m-Y H:i:s');
?>
    </body>
</html>