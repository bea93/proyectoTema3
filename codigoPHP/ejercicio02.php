﻿<html>
    <head>
        <title>Ejercicio 02</title>
    </head>
    <body>
        <?php
        /*
            @author: Bea Merino Macía
            Fecha 06/10/2020.
            Inicializar y mostrar una variable heredoc
        */
        
        $mensaje = <<<EOD
            Ejemplo de una cadena
            expandida en varias líneas
            empleando la sintaxis heredoc.
        EOD;
        echo $mensaje; //Mostramos lo que la variable heredoc ha almacenado
        ?>
    </body>
</html>