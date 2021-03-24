<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Ejercicio 24</title>
        <style>
            .group{
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <section>
            <!--
               @author: Bea Merino
               @since: 14/10/2020
               @description: Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas 
               y las respuestas recogidas; 
               En el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente.
            -->

            <?php
            
            //Importa la librería de validación
                require_once '../core/validacionFormularios.php';
                
            //Inicializa una variable que nos ayudará a controlar si todo esta correcto
                $entradaOK = true; 
                
            //Inicializa un array que se encargará de recoger los errores(Campos vacíos)
                $aErrores = [
                    'nombre' => null,
                    'fechaNacimiento' => null,
                    'radioB' => null,
                    'cantidad' => null,
                    'check' => null
                ];
                
            //Inicializa un array que se encargará de recoger los datos del formulario
                $aFormulario = [
                    'nombre' => null,
                    'fechaNacimiento' => null,
                    'radioB' => null,
                    'cantidad' => null,
                    'check' => null
                ];
                
            //Código que se ejecuta cuando se envía el formulario
                if (isset($_REQUEST['submit'])) {
                    
                    //La posición del array de errores recibe el mensaje de error si hubiera
                    $aErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 250, 1, 1);
                    $aErrores['fechaNacimiento'] = validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'],"2999-12-12", "1900-01-01", 1);
                    if(!isset($_REQUEST['radioB'])){
                        $aErrores['radioB'] = "Debe marcarse un valor";
                    }
                    $aErrores['cantidad'] = validacionFormularios::comprobarEntero($_REQUEST['cantidad'], PHP_INT_MAX, 0, 0);
                    
                    //Recorre el array en busca de mensajes de error
                    foreach ($aErrores as $campo => $error) {
                        
                        //Si hay errores
                        if ($error != null) {
                            //Cambia la condición de la variable
                            $entradaOK = false; 
                        }else{
                            if(isset($_REQUEST[$campo])){
                                $aFormulario[$campo] = $_REQUEST[$campo];
                            }
                        } 
                    }
                } else {
                    //Cambia el valor de la variable
                    $entradaOK = false; 
                }

                //Si el valor es true es que no hay errores, muestra los datos recogidos
                if ($entradaOK) {
                    
                    //Guarda los datos en el array del formulario
                    $aFormulario['nombre'] = $_REQUEST['nombre'];
                    $aFormulario['fechaNacimiento'] = $_REQUEST['fechaNacimiento'];
                    $aFormulario['radioB'] = $_REQUEST['radioB'];
                    $aFormulario['cantidad'] = $_REQUEST['cantidad'];
                    $aFormulario['check'] = $_REQUEST['check'];

                    //Muestra los datos por pantalla
                    echo "<h1>Los datos introducidos en el formulario son:</h1>";
                    echo "<strong>Nombre:</strong> " . $aFormulario['nombre'] . "<br>";
                    echo "<strong>Fecha de nacimiento:</strong> " . date('d/m/Y',strtotime($aFormulario['fechaNacimiento'])) . "<br>";
                    echo "<strong>¿Sigue alguna serie?</strong> " . $aFormulario['radioB'] . "<br>";
                    
                    //Si la opción marcada en el radiobutton es Sí, se muestran los dos últimos campos del formulario
                    if($aFormulario['radioB'] == "Sí"){
                        echo "<strong>Cantidad de series que sigue:</strong> " . $aFormulario['cantidad'] . "<br>";
                        echo "<strong>Las ve en:</strong> ";
                        if (isset($aFormulario['check']['HBO'])) {
                            echo $aFormulario['check']['HBO'] . " ";
                        }
                        if (isset($aFormulario['check']['Netflix'])) {
                            echo $aFormulario['check']['Netflix'] . " ";
                        }
                        if (isset($aFormulario['check']['Prime Video'])) {
                            echo $aFormulario['check']['Prime Video'] . " ";
                        }
                        if (isset($aFormulario['check']['Online'])) {
                            echo $aFormulario['check']['Online'] . " ";
                        }
                        if (isset($aFormulario['check']['Descargadas'])) {
                            echo $aFormulario['check']['Descargadas'] . " ";
                        }
                        if (isset($aFormulario['check']['Otros'])) {
                            echo $aFormulario['check']['Otros'] . " ";
                        }
                    }
                //Muestra el formulario hasta que se rellene correctamente 
                } else { 
                    ?>
                    <form name="formulario3" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
                        <div class="group">
                            <label>Nombre: </label>
                            <input type="text" name="nombre" class="obligatorio"
                                   value="<?php if (isset($_REQUEST['nombre']) && is_null($aErrores['nombre'])) {
                                                    echo $_REQUEST['nombre'];
                                        }?>"><br>
                            <?php if ($aErrores ['nombre'] != NULL) {
                                    echo $aErrores['nombre'];
                            }?>
                        </div>
                        <div class="group">
                            <label>Fecha de nacimiento: </label>
                            <input type="date" name="fechaNacimiento"  class="obligatorio"
                                   value="<?php if (isset($_REQUEST['fechaNacimiento']) && is_null($aErrores['fechaNacimiento'])) {
                                                    echo $_REQUEST['fechaNacimiento'];
                                           }?>"><br>
                            <?php if ($aErrores ['fechaNacimiento'] != NULL) {
                                    echo $aErrores['fechaNacimiento'];
                            }?>
                        </div>
                        <div class="group">
                            <label>¿Sigues alguna serie? </label><br>
                            <input type="radio" id="RO1" name="radioB" 
                                   value="Sí" <?php if (isset($_REQUEST['radioB']) && $_REQUEST['radioB'] == "Sí") {
                                                            echo 'checked';
                                                    }?>>
                            <label for="RO1">Sí</label><br>
                            <input type="radio" id="RO2" name="radioB" 
                                   value="No" <?php if (isset($_REQUEST['radioB']) && $_REQUEST['radioB'] == "No") {
                                                            echo 'checked';
                                                    }?>>
                            <label for="RO2">No</label><br>
                            <?php if ($aErrores['radioB'] != NULL) {
                                    echo $aErrores['radioB'];
                            }?> 
                        </div><br>
                        <div class="obligatorio">
                            <label>¿Cuántas?</label>
                            <input type="number" name="cantidad" class="obligatorio"
                                   value="<?php if($aErrores['cantidad'] == NULL && isset($_REQUEST['cantidad'])){ 
                                       echo $_REQUEST['cantidad'];
                                       
                                   } ?>"><br> 
                            <?php if ($aErrores['cantidad'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['cantidad'];?>
                            </div>   
                        <?php } ?>                
                        </div>
                        <div class="group">
                            <label>¿Cómo sueles verlas?</label><br>
                            <input type="checkbox" id="CO1" name="check[HBO]" 
                                   value="HBO" <?php if (isset($_REQUEST['check']['HBO'])) {
                                                             echo 'checked';
                                                    }?>> <!--//Recuerda la selección-->
                            <label for="CO1">HBO</label><br>
                            <input type="checkbox" id="CO2" name="check[Netflix]" 
                                   value="Netflix" <?php if (isset($_REQUEST['check']['Netflix'])) {
                                                            echo 'checked';
                                                    }?>> <!--//Recuerda la selección-->
                            <label for="CO2">Netflix</label><br>
                            <input type="checkbox" id="CO3" name="check[Prime Video]" 
                                   value="Prime Video" <?php if (isset($_REQUEST['check']['Prime Video'])) {
                                                            echo 'checked';
                                                    }?>> <!--//Recuerda la selección-->
                            <label for="CO3">Prime Video</label><br>
                            <input type="checkbox" id="CO4" name="check[Online]" 
                                   value="Online" <?php if (isset($_REQUEST['check']['Online'])) {
                                                             echo 'checked';
                                                    }?>> <!--//Recuerda la selección-->
                            <label for="CO4">Online</label><br>
                            <input type="checkbox" id="CO5" name="check[Descargadas]" 
                                   value="Descargadas" <?php if (isset($_REQUEST['check']['Descargadas'])) {
                                                            echo 'checked';
                                                    }?>> <!--//Recuerda la selección-->
                            <label for="CO5">Descargadas</label><br>
                            <input type="checkbox" id="CO6" name="check[Otros]" 
                                   value="Otros" <?php if (isset($_REQUEST['check']['Otros'])) {
                                                            echo 'checked';
                                                    }?>>
                            <label for="CO6">Otros</label><br>
                                <?php if ($aErrores['check'] != NULL) {
                                        echo $aErrores['check'];
                                }?>
                        </div>
                        <input class="group" type="submit" value="Enviar" name="submit">
                    </form>
                <?php } ?>        
        </section>
    </body>
</html>
