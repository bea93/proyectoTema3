<html>
    <head>
        <title>Ejercicio 05</title>
    </head>
    <body>
        <?php
        /*
          @author: Bea Merino Macía
          @since: 22/03/2021
          @description: Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
         */
            $tiempo = new DateTime(); //Creamos un objeto de la clase DateTime
            $sec = $tiempo->getTimeStamp(); //Asignamos a la variable $sec la hora actual en segundos
            echo $sec; //Mostramos la hora
            echo " segundos";
            echo "<br/>";
        ?>
    </body>
</html>