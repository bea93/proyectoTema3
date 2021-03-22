<html>
    <head>
        <title>Ejercicio 04</title>
    </head>
    <body>
        <?php
        /*
          @author: Bea Merino Macía
         * Fecha: 22/03/2021
         * Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués
         */
           
            date_default_timezone_set("Europe/Lisbon"); //Ajustamos la zona horaria portuguesa
            
            setlocale(LC_ALL, 'pt_PT.UTF-8');//Seleccionamos el idioma
			
            echo "La hora en Portugal es "; //Damos formato al resultado
            
            echo strftime("%T %A %e %B %Y"); //strftime es una función que formatea la fecha y hora
        ?>
    </body>
</html>