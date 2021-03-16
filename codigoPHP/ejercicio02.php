<html>
    <head>
        <title>Ejercicio 02</title>
    </head>
    <body>
        <?php
        /*
            @author: Bea Merino Macía
            @since: 06/10/2020.
            Inicializar y mostrar una variable heredoc
        */
        
        $mensaje=<<<BMM
        Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
BMM;
        echo $mensaje; //Mostramos lo que la variable heredoc ha almacenado
        ?>
    </body>
</html>