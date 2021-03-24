<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejercicio 23</title>
        <style>
            .group{
                margin-top: 15px;
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
        require_once '../core/validacionFormularios.php'; 
        
        //Crea constantes que contienen datos que necesitan las funciones de la librería de validación
        define('MAX', 9999999);
        define('MIN', 1);
        
        //Crea una variable que indique si los campos del formulario son obligatorios. 1 -> OBLIGATORIO  0 -> NO OBLIGATORIO
        define('OBLIGATORIO', 1);
        
        //Inicializa una variable que nos ayudará a controlar si todo esta correcto
        $entradaOK = true; 
        
        //Inicializa un array que se encargará de recoger los errores(Campos vacíos)
        $aErrores = ['primerNumero' => null,
                    'segundoNumero' => null
        ];
        
        //Inicializa un array que se encargará de recoger los datos del formulario
        $aFormulario = ['primerNumero' => null,
                        'segundoNumero' => null
        ];
        
        //Código que se ejecuta cuando se envía el formulario
        if (isset($_POST['enviar'])) {
            
            //La posición del array de errores recibe el mensaje de error si hubiera
            $aErrores['primerNumero'] = validacionFormularios::comprobarEntero($_POST['primerNumero'], MAX, MIN, OBLIGATORIO); 
            $aErrores['segundoNumero'] = validacionFormularios::comprobarEntero($_POST['segundoNumero'], MAX, MIN, OBLIGATORIO);
            
            //Comprobación de campos vacíos. Si está a NULL cargará un mensaje en el array de errores
            if ($_POST['primerNumero'] == NULL) {
                $aErrores['primerNumero'] = 'Campo Vacio';
            }
            if ($_POST['segundoNumero'] == NULL) {
                $aErrores['segundoNumero'] = 'Campo Vacio';
            }

            //Recorre el array en busca de mensajes de error
            foreach ($aErrores as $campo => $error) {
                
                //Si hay errores
                if ($error != null) {
                    //Vacía el campo
                    $_REQUEST[$campo] = "";
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
            
            //Guarda los datos en el array del formulario
            $aFormulario['primerNumero'] = $_POST['primerNumero']; 
            $aFormulario['segundoNumero'] = $_POST['segundoNumero'];
            
            //Crea variables para las diferentes operaciones con los números
            $suma = $aFormulario['primerNumero'] + $aFormulario['segundoNumero'];
            $resta = $aFormulario['primerNumero'] - $aFormulario['segundoNumero'];
            $multi = $aFormulario['primerNumero'] * $aFormulario['segundoNumero'];
            $div = $aFormulario['primerNumero'] / $aFormulario['segundoNumero'];
            
            //Muestra los datos por pantalla        
            print "<strong>Primer número introducido:</strong> " . $aFormulario['primerNumero'] . "<br>";
            print "<strong>Segundo número introducido:</strong> " . $aFormulario['segundoNumero'] . "<br><br>";
            print "<strong>Suma de los 2 número:</strong> " . $suma . "<br>";
            print "<strong>Resta de los 2 número:</strong> " . $resta . "<br>";
            print "<strong>Producto de los 2 número:</strong> " . $multi . "<br>";
            print "<strong>División de los 2 número:</strong> " . $div . "<br>";
            
        } else { //Muestra el formulario hasta que se rellene correctamente
            ?>
            <form name="formulario1" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
                <fieldset>
                    <legend>Calculadora</legend>
                    <div class="group">
                        <label for='numero1'>Primer Número</label>
                        <input type="text" name="primerNumero" id="numero1" placeholder="Introduzca un número: ">
                        <?php if ($aErrores['primerNumero'] != NULL) { ?>
                            <div>
                                <?php echo $aErrores['primerNumero']; //Mensaje de error que tiene el array aErrores    ?>
                            </div>   
                        <?php } ?>                  
                    </div>   
                    <div class="group">
                        <label for='numero2'>Segundo Número</label>
                        <input type="text" name="segundoNumero" id="numero2" placeholder="Introduzca otro número: "> 
                        <?php if ($aErrores['segundoNumero'] != NULL) { ?>
                            <div>
                                <?php echo $aErrores['segundoNumero']; //Mensaje de error que tiene el array aErrores?>
                            </div>   
                        <?php } ?>
                    </div> 
                    <input class="group" type="submit" value="Calcular" name="enviar">
                </fieldset>    
            </form>
        <?php } ?>
    </body>
</html>
