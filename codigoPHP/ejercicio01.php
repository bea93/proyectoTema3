<html lang="es">
    <head>
        <title>Ejercicio 01</title>
    </head>
    <body>

        <?php
            /*
                @author Bea Merino
                Fecha 06/10/2020
                Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla 
                                (echo, print, printf, print_r, var_dump).
            */
        
            //Iniciamos las variables
            $entero = 5;
            $decimal = 5.5;
            $cadena = "Hola Mundo!";
            $logico = true;

            //Las mostramos usando echo
            echo 'Usando "echo"<br>';
            echo 'Variable: "$entero". Tipo: "' . gettype($entero) . '". Contenido: ' . "$entero<br>";
            echo 'Variable: "$decimal". Tipo: "' . gettype($decimal) . '". Contenido: ' . "$decimal<br>";
            echo 'Variable: "$cadena". Tipo: "' . gettype($cadena) . '". Contenido: ' . "$cadena<br>";
            echo 'Variable: "$logico". Tipo: "' . gettype($logico) . '". Contenido: ' . "$logico<br>";
            echo '<br>';

            //Las mostramos usando print
            print 'Usando "print"<br>';
            print 'Variable: "$entero". Tipo: "' . gettype($entero) . '". Contenido: ' . "$entero<br>";
            print 'Variable: "$decimal". Tipo: "' . gettype($decimal) . '". Contenido: ' . "$decimal<br>";
            print 'Variable: "$cadena". Tipo: "' . gettype($cadena) . '". Contenido: ' . "$cadena<br>";
            print 'Variable: "$logico". Tipo: "' . gettype($logico) . '". Contenido: ' . "$logico<br>";
            echo '<br>';

            //Las mostramos usando printf
            printf('Muestra con "printf"<br>');
            printf('Variable: "$cadena". Tipo: "' . gettype($cadena) . '". Contenido: ' . "$cadena<br>");
            printf('Variable: "$decimal". Tipo: "' . gettype($decimal) . '". Contenido: ' . "$decimal<br>");
            printf('Variable: "$entero". Tipo: "' . gettype($entero) . '". Contenido: ' . "$entero<br>");
            printf('Variable: "$logico". Tipo: "' . gettype($logico) . '". Contenido: ' . "$logico<br>");
            echo '<br>';

            //Las mostramos usando print_r
            print_r('Muestra con "print_r"<br>');
            print_r('Variable: "$cadena". Tipo: "' . gettype($cadena) . '". Contenido: ' . "$cadena<br>");
            print_r('Variable: "$entero". Tipo: "' . gettype($entero) . '". Contenido: ' . "$entero<br>");
            print_r('Variable: "$decimal". Tipo: "' . gettype($decimal) . '". Contenido: ' . "$cadena<br>");
            print_r('Variable: "$logico". Tipo: "' . gettype($logico) . '". Contenido: ' . "$logico<br>");
            echo '<br>';

            //Las mostramos usando var_dump
            var_dump('Muestra con "var_dump"<br>');
            var_dump('Variable: "$cadena". Tipo: "' . gettype($cadena) . '". Contenido: ' . "$cadena<br>");
            var_dump('Variable: "$entero". Tipo: "' . gettype($entero) . '". Contenido: ' . "$entero<br>");
            var_dump('Variable: "$decimal". Tipo: "' . gettype($decimal) . '". Contenido: ' . "$decimal<br>");
            var_dump('Variable: "$logico". Tipo: "' . gettype($logico) . '". Contenido: ' . "$logico<br>");
        ?>
    </body>
</html>