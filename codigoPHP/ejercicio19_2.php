<html>
    <head>
        <title>Ejercicio 16</title>
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                @since: 08/10/2020
                @description: Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
            */
        
             echo "<h2>El sueldo semanal es:</h2>";
        
            //Creamos un array, asignamos como claves los días de la semana y valor el salario
            $aCarrera1 = [
                "Fecha" => "23/03/2021", 
                "Dorsal" => 5, 
                "Tiempo" => 100
                ];
            
            //Variable acumulador
            $acumulador = 0;
            
            reset($salarioDiario);
            
            //Se recorre el array con el while hasta que la clave sea null
            while(!is_null(key($salarioDiario))){
                //Mostramos la clave y valor actual en cada vuelta
                echo key($salarioDiario) . " = " . current($salarioDiario) . "€<br>";
                //Acumulamos el salario para mostrar el total
                $acumulador += current($salarioDiario);
                //Avanzamos una posición en el bucle
                next($salarioDiario); 
            }
            
            echo "<h3>Salario total = " . $acumulador . "€</h3>";
            




/*$aCarrera[fecha][dorsal][nombre, apellidos] => valor;
$aCarrera[fecha][dorsal][marca] => valor;*/
        ?>
    </body>
</html>