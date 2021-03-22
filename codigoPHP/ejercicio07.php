<html>
  <head>
    <title>Ejercicio 07</title>
  </head>
  <body>
      <?php
        /*
          @author: Bea Merino Macía
          @since: 22/03/2021
          @description: Mostrar el nombre del fichero que se está ejecutando.
         */
        echo "El fichero en el  que te encuentras es: ";
                    echo  $_SERVER['PHP_SELF'];
      ?>
  </body>
</html>