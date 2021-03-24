<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejercicio 17</title>	
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                @since: 08/10/2020
                @description: Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas 
                                que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. 
                                (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con distintas técnicas 
                                (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan
            */

            $numfila = 1;
            //Recorre las filas del array mientras ésta sea menor o igual a 20.
            while ($numfila <= 20) {
                // Asigna el valor 1 de columna al array cuando se pasa a la siguiente fila.
                $numasiento = 1;
                //Recorre las columnas del array mientras ésta sea menor o igual a 15.
                while ($numasiento <= 15) {
                    //Asigna el valor null a la posición donde apunta el puntero del array.
                    $teatro[$numfila][$numasiento] = null;
                    //Avanza el puntero de las columnas del array en una posición.
                    $numasiento++; 
                }
                //Avanza el puntero de las filas del array en una posición.
                $numfila++; 
            }
            
            //Asignamos 5 valores dentro del array.
            $teatro[1][3] = "Nerea";
            $teatro[5][6] = "Paco";
            $teatro[7][9] = "Pepe";
            $teatro[10][11] = "Bea";
            $teatro[12][13] = "Rodrigo";
            
            echo "<h3>Array recorrido con un foreach</h3>";
            
            //Recorre las filas del array guardando el número de fila.
            foreach ($teatro as $numfila => $a_fila) {
                //Recorre las columnas del array guardando el número de asiento y el nombre del cliente.
                foreach ($a_fila as $numasiento => $nombre) { 
                    if (!is_null($teatro[$numfila][$numasiento])) {
                        //Imprime por pantalla el número de fila, asiento y nombre del cliente de la posición a la que apunta el puntero del array.
                        echo "<p>El cliente en la fila " . $numfila . " y el asiento " . $numasiento . " se llama " . $nombre . "</p>"; 
                    }
                }
            }
            
            echo "<h4>Count del array teatro</h4>";
            
            echo "<p>El número de filas del array teatro es " . count($teatro) . "</p>";
            
            echo "<h3>Array recorrido con un while</h3>";
            
            //Inicializa el contador de filas a 1.
            $numfila = 1; 
            
            //Recorre las filas del array mientras ésta sea menor o igual a 20.
            while ($numfila <= 20) {
                // Asigna el valor 1 de columna al array cuando se pasa a la siguiente fila.
                $numasiento = 1;
                //Recorre las columnas del array mientras ésta sea menor o igual a 15.
                while ($numasiento <= 15) {
                    //Valora si la posición donde apunta el puntero del array está vacía o tiene valor.
                    if ($teatro[$numfila][$numasiento]) { 
                        //Imprime por pantalla el número de fila, asiento y nombre del cliente de la posición a la que apunta el puntero del array.
                        echo "<p>El cliente en la fila " . $numfila . " y el asiento " . $numasiento . " se llama " . $teatro[$numfila][$numasiento] . "</p>"; 
                    }
                    //Avanza el puntero de las columnas del array en una posición.
                    $numasiento++; 
                }
                //Avanza el puntero de las filas del array en una posición.
                $numfila++; 
            }
            
            echo "<h3>Array recorrido con un for</h3>";
            
            //Recorre las filas del array y va avanzando el puntero de éstas.
            for ($numfila = 1; $numfila <= 20; $numfila++) {
                //Recorre las columnas del array y va avanzando el puntero de éstas.
                for ($numasiento = 1; $numasiento <= 15; $numasiento++) {
                    //Valora si la posición donde apunta el puntero del array está vacía o tiene valor.
                    if ($teatro[$numfila][$numasiento]) {
                        //Imprime por pantalla el número de fila, asiento y nombre del cliente de la posición a la que apunta el puntero del array.
                        echo "<p>El cliente en la fila " . $numfila . " y el asiento " . $numasiento . " se llama " . $teatro[$numfila][$numasiento] . "</p>"; 
                    }
                }
            }
        ?>
    </body>
</html>