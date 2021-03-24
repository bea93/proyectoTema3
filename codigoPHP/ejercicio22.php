<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 22</title>
    </head>
    <body>
        <?php
            /*
                @author: Bea Merino Macía
                @since: 08/10/2020
                @description: Formulario  2
            */

            
            if (isset($_POST['submit'])) {//Código que se ejecuta cuando se envía el formulario

                //Variables que almacenan los datos
                $nombre = $_POST['nombre']; 
                $direccion = $_POST['direccion'];
                $codigo = $_POST['codigo'];
                $fecha = new DateTime($_POST['fecha']);
                $feliz= $_POST['feliz'];

                //Muestra los datos recogidos
                echo "Nombre: " . $nombre . "<br>"; 
                echo "Dirección: " . $direccion . "<br>"; 
                echo "Fecha de nacimiento: " . $fecha->format('d-m-Y') . "<br>"; 
                echo "¿Es feliz? " . $feliz . "<br>";
            } else { //Código que se ejecuta antes de rellenar el formulario
                ?>
                <form name="formulario2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <fieldset>
                        <legend>Formulario 2</legend>
                        <div>
                            Nombre: 
                            <input type="text" name="nombre" placeholder="Introduzca su nombre"><br><br>
                        </div>
                        <div>
                            Dirección: 
                            <input type="text" name="direccion" placeholder="Introduzca su dirección"><br><br>
                        </div>
                        <div>
                            Código Postal: 
                            <input type="text" name="codigo" placeholder="Introduzca código postal"><br><br>
                        </div>
                        <div>
                            Fecha de nacimiento: 
                            <input type="date" name="fecha"><br><br>
                        </div>
                        <div>
                            ¿Es feliz?<br>
                            <input type="radio" id="RB1" name="feliz" value="si">
                            <label for="RB1">Sí</label><br>
                            <input type="radio" id="RB2" name="feliz" value="no">
                            <label for="RB2">No</label><br>
                            <input type="radio" id="RB3" name="feliz" value="A veces">
                            <label for="RB3">A veces</label><br>
                        </div>
                        <div>
                            <br><input type="submit" value="Enviar">
                        </div>
                    </fieldset>
                </form>
        <?php } ?>
    </body>
</html>