<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejercicio 19</title>	
    </head>
    <body>
        <?php
            /*
             * Vamos a guardar los siguientes datos de una carrera de atletismo de los días 20/02/2020, 04/05/2020 y 06/06/2021: 
             *          Dorsal de los participantes, nombre de los mismos y tiempo en segundos(al terminar la carrera).
             * 
             *          -No inicializamos porque no sabemos quién va a venir.
             *          -El array se va a llamar $aAtletismo
             *                      -> [fecha][dorsal][dato]
             * 
             *                      fecha: "20/02/2020", "04/05/2020", "06/06/2021",
             *                      dorsal: 1, 2, ...,
             *                      dato: 'nombre', 'tiempo'
             *          
             */
            
            //Abrimos la inscripción de la carrera 20/02/2020
            $aAtletismo ['20/02/2020'][1]['nombre'] = 'bea';
            $aAtletismo ['20/02/2020'][2]['nombre'] = 'cris';
            
            //Se celebra la carrera
            $aAtletismo ['20/02/2020'][1]['tiempo'] = 1500;
            $aAtletismo ['20/02/2020'][2]['tiempo'] = 15;
            
            //Abrimos la inscripción de la carrera 04/05/2020
            $aAtletismo ['04/05/2020'][1]['nombre'] = 'federico';
            $aAtletismo ['04/05/2020'][2]['nombre'] = 'cris';
            
            //Se celebra la carrera
            $aAtletismo ['04/05/2020'][1]['tiempo'] = 500;
            $aAtletismo ['04/05/2020'][2]['tiempo'] = 150;
            
            //Abrimos la inscripción de la carrera 06/06/2021
            $aAtletismo ['06/06/2021'][1]['nombre'] = 'federico';
            $aAtletismo ['06/06/2021'][2]['nombre'] = 'cris';
            $aAtletismo ['06/06/2021'][3]['nombre'] = 'bea';
            
            //Se celebra la carrera
            $aAtletismo ['06/06/2021'][1]['tiempo'] = 2000;
            $aAtletismo ['06/06/2021'][2]['tiempo'] = 300;
            $aAtletismo ['06/06/2021'][3]['tiempo'] = 1000;
            
            //Recorre las filas del array guardando el número de fila.
            foreach ($aAtletismo as $fecha => $dorsales) {
                echo "Resultados de la carrera: " .$fecha . "<br>";
                foreach ($dorsales as $dorsal => $datos) {
                    echo "Dorsal: " . $dorsal . "<br>";
                    echo "Nombre: " .$datos['nombre'] . "<br>";
                    echo "Tiempo: " .$datos['tiempo'] . "<br>";
                    
                }
                echo "<br>";
            }
        ?>
    </body>
</html>