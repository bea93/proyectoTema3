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
            $salarioDiario = [
                "Lunes"=>40, 
                "Martes"=>50, 
                "Miércoles"=>60, 
                "Jueves"=>70, 
                "Viernes"=>100, 
                "Sábado"=>120, 
                "Domingo"=>80
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
        ?>
    </body>
</html>