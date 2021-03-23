<html>
    <head>
        <title>Ejercicio 15</title>
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                @since: 08/10/2020
                @description: Crear e inicializar un array con el sueldo percibido de lunes a domingo. 
                                Recorrer el array para calcular el sueldo percibido durante la semana. 
                                (Array asociativo con los nombres de los días de la semana).
             */
            
             echo "<h2>El sueldo semanal es:</h2>";
             
            //Creamos un array, asignamos como claves los días de la semana y valor el salario
            $salario = [
                "Lunes" => 40,
                "Martes" => 50,
                "Miércoles" => 60,
                "Jueves" => 70,
                "Viernes" => 100,
                "Sábado" => 120,
                "Domingo" => 80
            ];
            
            //Variable acumulador
            $acumulador = 0; 
            
            //Con un foreach recorremos el array mostrando posición y valor
            foreach($salario as $pos => $valor){ 
                echo $pos . " = " . $valor . "€";
                //Acumulamos los valores para después mostrar el salario total de la semana
                $acumulador += $valor; 
                echo "<br>";
            }
            
            echo "<h3>Salario total = " . $acumulador . "€</h3>";
            ?>
    </body>
</html>