<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejercicio 19_2</title>	
    </head>
    <body>
        <?php
            /*
             * Vamos a guardar los siguientes datos de un equipo de fútbol: nombre del equipo, dorsal del jugador y datos del mismo(nombre y fecha de nacimiento):
             *          -El array se va a llamar $aEquipo
             *                      -> [nombreEquipo][dorsal][dato]
             *                      nombreEquipo: "Barcelona"
             *                      dorsal: 1, 2, ...,
             *                      dato: 'nombreJugador', 'fechaNacimiento'   
             */
            
            //Introducimos los datos de los jugadores
            $aEquipo ['Barcelona'][1]['nombreJugador'] = 'Ter Stegen';
            $aEquipo ['Barcelona'][1]['fechaNacimiento'] = '30/04/1992';
            
            $aEquipo ['Barcelona'][2]['nombreJugador'] = 'Sergiño Dest';
            $aEquipo ['Barcelona'][2]['fechaNacimiento'] = '03/11/2000';
            
            $aEquipo ['Barcelona'][3]['nombreJugador'] = 'Gerard Piqué';
            $aEquipo ['Barcelona'][3]['fechaNacimiento'] = '02/02/1987';
            
            $aEquipo ['Barcelona'][4]['nombreJugador'] = 'Ronald Araújo';
            $aEquipo ['Barcelona'][4]['fechaNacimiento'] = '07/03/1999';
            
            $aEquipo ['Barcelona'][5]['nombreJugador'] = 'Sergio Busquets';
            $aEquipo ['Barcelona'][5]['fechaNacimiento'] = '16/07/1988';
            
            $aEquipo ['Barcelona'][7]['nombreJugador'] = 'Antoine Griezmann';
            $aEquipo ['Barcelona'][7]['fechaNacimiento'] = '21/03/1991';
            
            $aEquipo ['Barcelona'][8]['nombreJugador'] = 'Miralem Pjanic';
            $aEquipo ['Barcelona'][8]['fechaNacimiento'] = '02/04/1990';
            
            $aEquipo ['Barcelona'][9]['nombreJugador'] = 'Martin Braithwaite';
            $aEquipo ['Barcelona'][9]['fechaNacimiento'] = '05/06/1991';
            
            $aEquipo ['Barcelona'][10]['nombreJugador'] = 'Leo Messi';
            $aEquipo ['Barcelona'][10]['fechaNacimiento'] = '24/06/1987';
            
            //Recorre las filas del array guardando los datos de los jugadores.
            foreach ($aEquipo as $nombreEquipo => $dorsales) {
                echo "<strong>Nombre del equipo:</strong> " .$nombreEquipo . "<br><br>";
                foreach ($dorsales as $dorsal => $datos) {
                    echo "<strong>Dorsal:</strong> " . $dorsal . "<br>";
                    echo "<strong>Nombre del jugador:</strong> " .$datos['nombreJugador'] . "<br>";
                    echo "<strong>Fecha de nacimiento:</strong> " .$datos['fechaNacimiento'] . "<br><br>";
                }
            }
        ?>
    </body>
</html>