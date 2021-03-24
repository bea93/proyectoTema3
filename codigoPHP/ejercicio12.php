<html>
    <head>
        <title>Ejercicio 12</title>
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                @since: 07/10/2020
                @description: Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).
            */
        
            echo "<h2> Variables globales con print_r()</h2><br>";
            echo "<pre>";
                print_r($GLOBALS);
            echo "</pre>";    
            echo "<br>";
            
            echo "<h2>Variables globales con foreach()</h2>";
            
            echo "<h3>SERVER</h3><br>";
            foreach($_SERVER as $p => $valor){ 
                echo "<pre>";
                //Usamos la expresión => para asignar a variables la posición y el valor del array en cada vuelta del foreach
                echo "<strong>{$p}</strong> => {$valor} <br>";
                echo "</pre>";
            }
            
        ?>
    </body>
</html>