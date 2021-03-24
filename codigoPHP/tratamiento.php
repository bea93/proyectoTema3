<html>
    <head>
        <meta charset="UTF-8">
        <title>Tratamiento Formularios</title>
    </head>
    <body>
        <?php 
        
            /* 
                @author: Bea Merino Macía
                @since: 08/10/2020
                @description: Tratamiento ejercicio 21
            */

            //Variables que almacenan los datos
            $nombre = $_POST['nombre']; 
            $direccion = $_POST['direccion'];
            $codigo = $_POST['codigo'];
            $fecha = new DateTime($_POST['fecha']);
            $feliz= $_POST['feliz'];
            
            

            //Muestra los datos recogidos
            echo "<strong>Nombre:</strong> " . $nombre . "<br>"; 
            echo "<strong>Dirección:</strong> " . $direccion . "<br>";
            echo "<strong>Código Postal:</strong> " . $codigo . "<br>";
            echo "<strong>Fecha de nacimiento:</strong> " . $fecha->format('d-m-Y') . "<br>"; 
            echo "<strong>¿Es feliz?</strong> " . $feliz . "<br>";
        ?>
        <input type="button" value="Volver" onclick="location='../indexProyectoTema3.html'">
    </body>
</html>