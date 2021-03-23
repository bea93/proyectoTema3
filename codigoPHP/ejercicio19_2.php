<html>
    <head>
        <title>Ejercicio 19_2</title>
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                @since: 08/10/2020
                @description: Explica como guardarías en una variable PHP la información sobre los
                                participantes en tres carreras de atletismo que se celebrarán los días 6-12-
                                2020, 25-12-2020 y 6-1-2021. De los participantes en cada carrera debemos
                                ser capaces de almacenar: n.º de dorsal, nombre y apellidos y tiempo al llegar a
                                la meta. Los dos primeros datos se guardarán al inscribirse en la carrera y el
                                tiempo al llegar a meta cuando el atleta cruce la línea de meta
            */
        
             echo "<h2>Datos de la carrera:</h2>";
        
            //Creamos un array, asignamos como claves los días de la semana y valor el salario
            $aCarrera1 = [
                "Fecha" => "23/03/2021", 
                "Dorsal" => 5, 
                "Tiempo en segundos" => 100
                ];
            
            
            //Con un foreach recorremos el array mostrando posición y valor
            foreach($aCarrera1 as $pos => $valor){ 
                echo $pos . " => " . $valor;
                echo "<br>";
            }
        ?>
    </body>
</html>