<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejercicio 18</title>	
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                @since: 08/10/2020
                @description: Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
            */
        
            $fila = 1;
            
            //Recorre las filas del array mientras esta sea menor o igual a 20.
            while ($fila <= 20) {
                // Asigna el valor 1 de columna al array cuando se pasa a la siguiente fila.
                $asiento = 1; 
                //Recorre las columnas del array mientras esta sea menor o igual a 15.
                while ($asiento <= 15) {
                    //Asigna el valor null a la posición donde apunta el puntero del array.
                    $teatro[$fila][$asiento] = null;
                    //Avanza el puntero de las columnas del array en una posición.
                    $asiento++; 
                }
                //Avanza el puntero de las filas del array en una posición.
                $fila++; 
            }
            
            //Asignamos 5 valores dentro del array.
            $teatro[1][3] = "NereaA";
            $teatro[5][6] = "NereaN";
            $teatro[7][9] = "Rodrigo";
            $teatro[10][11] = "Bea";
            $teatro[12][13] = "Nacho";
            reset($teatro);
            
            echo "<h3>Array recorrido con funciones</h3>";
            //Recorre las filas del array guardando el número de fila.
            foreach ($teatro as $numfila => $a_fila) {
                //Recorre las columnas del array guardando el número de asiento y el nombre del cliente.
                foreach ($a_fila as $numasiento => $nombre) { 
                    if (!is_null($teatro[$numfila][$numasiento])) {
                        //Muestra por pantalla el número de fila, asiento y nombre del cliente de la posición a la que apunta el puntero del array.
                        echo "<p>El cliente en la fila " . $numfila . " y el asiento " . $numasiento . " se llama " . $nombre . "</p>";
                    }
                }
            }
        ?>
    </body>
</html>