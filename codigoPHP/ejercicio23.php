<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejercicio 23</title>
        <style>
            .group{
                margin-top: 15px;
            }
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
        <!--
            @author: Bea Merino
            @since: 14/10/2020
            @description: Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas 
                            y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea 
                            volverá a salir el formulario con el mensaje correspondiente. 
        -->

        <?php
        
        //Importa la librería de validación
        require_once '../core/210322ValidacionFormularios.php'; 
        
        //Crea constantes que contienen datos que necesitan las funciones de la librería de validación
        define('MAX', 99999);
        define('MIN', 1);
        
        //Crea una variable que indique si los campos del formulario son obligatorios. 1 -> OBLIGATORIO  0 -> NO OBLIGATORIO
        define('OBLIGATORIO', 1);
        
        //Inicializa una variable que nos ayudará a controlar si todo esta correcto
        $entradaOK = true; 
        
        //Inicializa un array que se encargará de recoger los errores(Campos vacíos)
        $aErrores = ['nombre' => null,
                    'direccion' => null,
                    'codigo' => null,
                    'fecha' => null,
                    'feliz' => null
        ];
        
        //Inicializa un array que se encargará de recoger los datos del formulario
        $aFormulario = ['nombre' => null,
                        'direccion' => null,
                        'codigo' => null,
                        'fecha' => null,
                        'feliz' => null
        ];
        
        //Código que se ejecuta cuando se envía el formulario
        if (isset($_POST['enviar'])) {
            
            //La posición del array de errores recibe el mensaje de error si hubiera
            $aErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_POST['nombre'], 50, 1, 1); 
            $aErrores['direccion'] = validacionFormularios::comprobarAlfaNumerico($_POST['direccion'], 250, 1, 1); 
            $aErrores['codigo'] = validacionFormularios::comprobarEntero($_POST['codigo'], MAX, MIN, OBLIGATORIO);
            $aErrores['fecha'] = validacionFormularios::validarFecha($_POST['fecha'],"2999-12-12", "1900-01-01", 1);
            if(!isset($_POST['feliz'])){
                        $aErrores['feliz'] = "Debe marcarse un valor";
                    }

            //Recorre el array en busca de mensajes de error
            foreach ($aErrores as $campo => $error) {
                
                //Si hay errores
                if ($error != null) {
                    //Vacía el campo
                    $_POST[$campo] = "";
                    //Cambia la condición de la variable
                    $entradaOK = false; 
                }
            }
        } else {
            //Cambia el valor de la variable
            $entradaOK = false; 
        }

        //Si el valor es true es que no hay errores, muestra los datos recogidos
        if ($entradaOK) {
            
            //Variables que almacenan los datos
            $aFormulario['nombre'] = $_POST['nombre']; 
            $aFormulario['direccion'] = $_POST['direccion'];
            $aFormulario['codigo'] = $_POST['codigo'];
            $aFormulario['fecha'] = $_POST['fecha'];
            $aFormulario['feliz'] = $_POST['feliz'];
            
            //Muestra los datos recogidos
            echo "<strong>Nombre:</strong> " . $aFormulario['nombre'] . "<br>"; 
            echo "<strong>Dirección:</strong> " . $aFormulario['direccion'] . "<br>";
            echo "<strong>Código Postal:</strong> " . $aFormulario['codigo'] . "<br>";
            echo "<strong>Fecha de nacimiento:</strong> " . date('d/m/Y',strtotime($aFormulario['fecha'])) . "<br>"; 
            echo "<strong>¿Es feliz?</strong> " . $aFormulario['feliz']. "<br>";
            
        } else { //Muestra el formulario hasta que se rellene correctamente
            ?>
            <form name="formulario3" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
                <fieldset>
                    <legend>Formulario 3</legend>
                    <div class="group">
                        <label for='nombre'>Nombre:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Introduzca su nombre: ">
                        <?php if ($aErrores['nombre'] != NULL) { ?>
                                <div class="error">
                                    <?php echo $aErrores['nombre']; ?>
                                </div>   
                        <?php } ?>                  
                    </div>   
                    <div class="group">
                        <label for='direccion'>Dirección:</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Introduzca su dirección: " class="obligatorio"> 
                        <?php if ($aErrores['direccion'] != NULL) { ?>
                                <div class="error">
                                    <?php echo $aErrores['direccion']; ?>
                                </div>   
                        <?php } ?> 
                    </div>
                    <div class="group">
                        <label for='codigo'>Código:</label>
                        <input type="text" name="codigo" id="codigo" placeholder="Introduzca código postal: " class="obligatorio"> 
                        <?php if ($aErrores['codigo'] != NULL) { ?>
                                <div class="error">
                                    <?php echo $aErrores['codigo']; ?>
                                </div>   
                        <?php } ?> 
                    </div> 
                    <div class="group">
                            <label>Fecha de nacimiento: </label>
                            <input type="date" name="fecha"  class="obligatorio"><br>
                            <?php if ($aErrores['fecha'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['fecha']; ?>
                                    </div>   
                            <?php } ?> 
                    </div>
                    <div class="group">
                            <label>¿Eres feliz? </label><br>
                            <input type="radio" id="RB1" name="feliz" value="si">
                            <label for="RB1">Sí</label><br>
                            <input type="radio" id="RB2" name="feliz" value="no">
                            <label for="RB2">No</label><br>
                            <input type="radio" id="RB3" name="feliz" value="A veces">
                            <label for="RB3">A veces</label><br>
                            <?php if ($aErrores['feliz'] != NULL) { ?>
                                <div class="error">
                                    <?php echo $aErrores['feliz']; ?>
                                </div>   
                            <?php } ?> 
                        </div><br>
                    <input id="enviar" type="submit" value="Enviar" name="enviar">
                </fieldset>    
            </form>
        <?php } ?>
    </body>
</html>
