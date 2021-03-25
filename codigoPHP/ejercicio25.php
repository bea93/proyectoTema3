<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejercicio 25</title>
        <style>
            .group{
                margin-top: 15px;
            }
            .obligatorio{
                background-color: #C0F0F0;
            }
            .error{
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <section>
            <!--
                @author: Bea Merino
                @since: 08/10/2020
                @description: Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.
            -->

            <?php
            
                //Importa la librería de validación
                require_once '../core/210322ValidacionFormularios.php';
                
                //Crea constantes que indiquen si los campos del formulario son obligatorios. 1 -> OBLIGATORIO  0 -> OPCIONAL
                define('OBLIGATORIO', 1);
                define('OPCIONAL', 0);
                
                //Inicializa una variable que nos ayudará a controlar si todo esta correcto
                $entradaOK = true; 
                
                //Inicializa un array que se encargará de recoger los errores(Campos vacíos)
                $aErrores = [
                    'intObligatorio' => null,
                    'intOpcional' => null,
                    'floatObligatorio' => null,
                    'floatOpcional' => null,
                    'alfabObligatorio' => null,
                    'alfabOpcional' => null,
                    'alfanObligatorio' => null,
                    'alfanOpcional' => null,
                    'emailObligatorio' => null,
                    'emailOpcional' => null,
                    'urlObligatorio' => null,
                    'urlOpcional' => null,
                    'fechaObligatoria' => null,
                    'fechaOpcional' => null,
                    'dniObligatorio' => null,
                    'dniOpcional' => null,
                    'cpObligatorio' => null,
                    'cpOpcional' => null,
                    'passObligatoria' => null,
                    'passOpcional' => null,
                    'telObligatorio' => null,
                    'telOpcional' => null,
                    'taOpcional' => null,
                    'radioB' => null,
                    'lista' => null,
                    'check' => null
                ];
                
                //Inicializa un array que se encargará de recoger los datos del formulario
                $aFormulario = [
                    'intObligatorio' => null,
                    'intOpcional' => null,
                    'floatObligatorio' => null,
                    'floatOpcional' => null,
                    'alfabObligatorio' => null,
                    'alfabOpcional' => null,
                    'alfanObligatorio' => null,
                    'alfanOpcional' => null,
                    'emailObligatorio' => null,
                    'emailOpcional' => null,
                    'urlObligatorio' => null,
                    'urlOpcional' => null,
                    'fechaObligatoria' => null,
                    'fechaOpcional' => null,
                    'dniObligatorio' => null,
                    'dniOpcional' => null,
                    'cpObligatorio' => null,
                    'cpOpcional' => null,
                    'passObligatoria' => null,
                    'passOpcional' => null,
                    'telObligatorio' => null,
                    'telOpcional' => null,
                    'cbOpcional' => null,
                    'taOpcional' => null,
                    'radioB' => null,
                    'lista' => null,
                    'check' => null
                ];
                
                //Código que se ejecuta cuando se envía el formulario
                if (isset($_POST['enviar'])) {
                    
                    //La posición del array de errores recibe el mensaje de error si hubiera
                    $aErrores['intObligatorio'] = validacionFormularios::comprobarEntero($_POST['intObligatorio'], PHP_INT_MAX, -PHP_INT_MAX, OBLIGATORIO);
                    $aErrores['intOpcional'] = validacionFormularios::comprobarEntero($_POST['intOpcional'], PHP_INT_MAX, -PHP_INT_MAX, OPCIONAL);

                    $aErrores['floatObligatorio'] = validacionFormularios::comprobarFloat($_POST['floatObligatorio'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, OBLIGATORIO);
                    $aErrores['floatOpcional'] = validacionFormularios::comprobarFloat($_POST['floatOpcional'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, OPCIONAL);

                    $aErrores['alfabObligatorio'] = validacionFormularios::comprobarAlfabetico($_POST['alfabObligatorio'], 250, 1, OBLIGATORIO);
                    $aErrores['alfabOpcional'] = validacionFormularios::comprobarAlfabetico($_POST['alfabOpcional'], 250, 0, OPCIONAL);

                    $aErrores['alfanObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_POST['alfanObligatorio'], 250, 1, OBLIGATORIO);
                    $aErrores['alfanOpcional'] = validacionFormularios::comprobarAlfaNumerico($_POST['alfanOpcional'], 250, 0, OPCIONAL);

                    $aErrores['emailObligatorio'] = validacionFormularios::validarEmail($_POST['emailObligatorio'], 50, 1, OBLIGATORIO);
                    $aErrores['emailOpcional'] = validacionFormularios::validarEmail($_POST['emailOpcional'], 50, 1, OPCIONAL);

                    $aErrores['urlObligatorio'] = validacionFormularios::validarURL($_POST['urlObligatorio'], OBLIGATORIO);
                    $aErrores['urlOpcional'] = validacionFormularios::validarURL($_POST['urlOpcional'], OPCIONAL);

                    $aErrores['fechaObligatoria'] = validacionFormularios::validarFecha($_POST['fechaObligatoria'],"2999-12-12", "1900-01-01", 1);
                    $aErrores['fechaOpcional'] = validacionFormularios::validarFecha($_POST['fechaOpcional'],"2999-12-12", "1900-01-01", 0);

                    $aErrores['dniObligatorio'] = validacionFormularios::validarDni($_POST['dniObligatorio'], OBLIGATORIO);
                    $aErrores['dniOpcional'] = validacionFormularios::validarDni($_POST['dniOpcional'], OPCIONAL);

                    $aErrores['cpObligatorio'] = validacionFormularios::validarCp($_POST['cpObligatorio'], OBLIGATORIO);
                    $aErrores['cpOpcional'] = validacionFormularios::validarCp($_POST['cpOpcional'], OPCIONAL);

                    $aErrores['passObligatoria'] = validacionFormularios::validarPassword($_POST['passObligatoria'], OBLIGATORIO, 8);
                    $aErrores['passOpcional'] = validacionFormularios::validarPassword($_POST['passOpcional'], OPCIONAL, 8);

                    $aErrores['telObligatorio'] = validacionFormularios::validarTelefono($_POST['telObligatorio'], OBLIGATORIO);
                    $aErrores['telOpcional'] = validacionFormularios::validarTelefono($_POST['telOpcional'], OPCIONAL);
                    
                    $aErrores['taOpcional'] = validacionFormularios::comprobarAlfaNumerico($_POST['taOpcional'], 500, 1, 1);
                    
                    if(!isset($_POST['radioB'])){$aErrores['radioB'] = "Debe marcarse un valor";}
                    if(!isset($_POST['check'])){$aErrores['check'] = "Debe marcarse al menos un valor";} 
                    
                    $aErrores['lista'] = validacionFormularios::validarElementoEnLista($_POST['lista'], array("opcion1", "opcion2", "opcion3"), 1);

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
                    
                    //Guarda los datos en el array del formulario
                    $aFormulario['intObligatorio'] = $_POST['intObligatorio']; 
                    $aFormulario['intOpcional'] = $_POST['intOpcional'];

                    $aFormulario['floatObligatorio'] = $_POST['floatObligatorio'];
                    $aFormulario['floatOpcional'] = $_POST['floatOpcional'];

                    $aFormulario['alfabObligatorio'] = $_POST['alfabObligatorio'];
                    $aFormulario['alfabOpcional'] = $_POST['alfabOpcional'];

                    $aFormulario['alfanObligatorio'] = $_POST['alfanObligatorio'];
                    $aFormulario['alfanOpcional'] = $_POST['alfanOpcional'];

                    $aFormulario['emailObligatorio'] = $_POST['emailObligatorio'];
                    $aFormulario['emailOpcional'] = $_POST['emailOpcional'];

                    $aFormulario['urlObligatorio'] = $_POST['urlObligatorio'];
                    $aFormulario['urlOpcional'] = $_POST['urlOpcional'];

                    $aFormulario['fechaObligatoria'] = $_POST['fechaObligatoria'];
                    $aFormulario['fechaOpcional'] = $_POST['fechaOpcional'];

                    $aFormulario['dniObligatorio'] = $_POST['dniObligatorio'];
                    $aFormulario['dniOpcional'] = $_POST['dniOpcional'];

                    $aFormulario['cpObligatorio'] = $_POST['cpObligatorio'];
                    $aFormulario['cpOpcional'] = $_POST['cpOpcional'];

                    $aFormulario['passObligatoria'] = $_POST['passObligatoria'];
                    $aFormulario['passOpcional'] = $_POST['passOpcional'];

                    $aFormulario['telObligatorio'] = $_POST['telObligatorio'];
                    $aFormulario['telOpcional'] = $_POST['telOpcional'];

                    $aFormulario['taOpcional'] = $_POST['taOpcional'];
                    
                    $aFormulario['radioB'] = $_POST['radioB'];
                    $aFormulario['check'] = $_POST['check'];
                    $aFormulario['lista'] = $_POST['lista'];


                    //Muestra los datos por pantalla        
                    print "Número entero obligatorio: " . $aFormulario['intObligatorio'] . "<br>";
                    print "Número entero opcional: " . $aFormulario['intOpcional'] . "<br>";

                    print "Número decimal obligatorio: " . $aFormulario['floatObligatorio'] . "<br>";
                    print "Número decimal opcional: " . $aFormulario['floatOpcional'] . "<br>";

                    print "Alfabético obligatorio: " . $aFormulario['alfabObligatorio'] . "<br>";
                    print "Alfabético opcional: " . $aFormulario['alfabOpcional'] . "<br>";

                    print "Alfanumérico obligatorio: " . $aFormulario['alfanObligatorio'] . "<br>";
                    print "Alfanumérico opcional: " . $aFormulario['alfanOpcional'] . "<br>";

                    print "Email obligatorio: " . $aFormulario['emailObligatorio'] . "<br>";
                    print "Email opcional: " . $aFormulario['emailOpcional'] . "<br>";

                    print "URL obligatoria: " . $aFormulario['urlObligatorio'] . "<br>";
                    print "URL opcional: " . $aFormulario['urlOpcional'] . "<br>";

                    print "Fecha obligatoria: " . $aFormulario['fechaObligatoria'] . "<br>";
                    print "Fecha opcional: " . $aFormulario['fechaOpcional'] . "<br>";

                    print "Dni obligatorio: " . $aFormulario['dniObligatorio'] . "<br>";
                    print "Dni opcional: " . $aFormulario['dniOpcional'] . "<br>";

                    print "Código Postal obligatorio: " . $aFormulario['cpObligatorio'] . "<br>";
                    print "Código Postal opcional: " . $aFormulario['cpOpcional'] . "<br>";

                    print "Contraseña Obligatoria: " . $aFormulario['passObligatoria'] . "<br>";
                    print "Contraseña Opcional: " . $aFormulario['passOpcional'] . "<br>";

                    print "Teléfono obligatorio: " . $aFormulario['telObligatorio'] . "<br>";
                    print "Teléfono opcional: " . $aFormulario['telOpcional'] . "<br>";

                    print "TextArea opcional: " . $aFormulario['taOpcional'] . "<br>";
                    
                    print "Radio button: " . $aFormulario['radioB'] . "<br>";
                    
                    print "Lista: " . $aFormulario['lista'] . "<br>";
                    
                    print "Checkbox: ";
                        if (isset($aFormulario['check']['opcion1'])) {
                            print $aFormulario['check']['opcion1'] . " ";
                        }
                        if (isset($aFormulario['check']['opcion2'])) {
                            print $aFormulario['check']['opcion2'] . " ";
                        }
                        if (isset($aFormulario['check']['opcion3'])) {
                            print $aFormulario['check']['opcion3'];
                        }
                } else { //Muestra el formulario hasta que se rellene correctamente
                    ?>
                    <form name="formulario3" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
                        <fieldset>
                            <legend>Plantilla Formulario</legend>
                            <div class="group">
                                <label>Entero Obligatorio</label>
                                <input type="text" name="intObligatorio" class="obligatorio"
                                       value="<?php if (isset($_POST['intObligatorio']) && is_null($aErrores['intObligatorio'])){
                                                        echo $_POST['intObligatorio'];}
                                            ?>"><br>
                                <?php if ($aErrores['intObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['intObligatorio']; ?>
                                    </div>   
                                <?php } ?> 
                            </div>   
                            <div class="group">
                                <label>Entero opcional</label>
                                <input type="text" name="intOpcional"
                                       value="<?php if (isset($_POST['intOpcional']) && is_null($aErrores['intOpcional'])) {
                                                        echo $_POST['intOpcional'];
                                            }?>"><br>
                                <?php if ($aErrores['intOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['intOpcional']; ?>
                                    </div>   
                                <?php } ?> 
                            </div>
                            <div class="group">
                                <label>Decimal Obligatorio</label>
                                <input type="text" name="floatObligatorio" class="obligatorio"
                                       value="<?php if (isset($_POST['floatObligatorio']) && is_null($aErrores['floatObligatorio'])) {
                                                        echo $_POST['floatObligatorio'];
                                            }?>"><br>
                                <?php if ($aErrores['floatObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['floatObligatorio']; ?>
                                    </div>   
                                <?php } ?> 
                            </div>                    
                            <div class="group">
                                <label>Decimal opcional</label>
                                <input type="text" name="floatOpcional"
                                       value="<?php if (isset($_POST['floatOpcional']) && is_null($aErrores['floatOpcional'])) {
                                                        echo $_POST['floatOpcional'];
                                            }?>"><br>
                                <?php if ($aErrores['floatOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['floatOpcional']; ?>
                                    </div>   
                                <?php } ?> 
                            </div>
                            <div class="group">
                                <label>Alfabético Obligatorio</label>
                                <input type="text" name="alfabObligatorio" class="obligatorio"
                                       value="<?php if (isset($_POST['alfabObligatorio']) && is_null($aErrores['alfabObligatorio'])) {
                                                        echo $_POST['alfabObligatorio'];
                                            }?>"><br>
                                <?php if ($aErrores['alfabObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['alfabObligatorio']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Alfabético opcional</label>
                                <input type="text" name="alfabOpcional"
                                       value="<?php if (isset($_POST['alfabOpcional']) && is_null($aErrores['alfabOpcional'])) {
                                                       echo $_POST['alfabOpcional'];
                                                }?>"><br>
                                <?php if ($aErrores['alfabOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['alfabOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Alfanumérico Obligatorio</label>
                                <input type="text" name="alfanObligatorio" class="obligatorio"
                                       value="<?php if (isset($_POST['alfanObligatorio']) && is_null($aErrores['alfanObligatorio'])) {
                                                        echo $_POST['alfanObligatorio'];
                                                }?>"><br>
                                <?php if ($aErrores['alfanObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['alfanObligatorio']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Alfanumérico opcional</label>
                                <input type="text" name="alfanOpcional"
                                       value="<?php if (isset($_POST['alfanOpcional']) && is_null($aErrores['alfanOpcional'])) {
                                                        echo $_POST['alfanOpcional'];
                                                }?>"><br>
                                <?php if ($aErrores['alfanOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['alfanOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Email Obligatorio</label>
                                <input type="email" name="emailObligatorio" class="obligatorio"
                                       value="<?php if (isset($_POST['emailObligatorio']) && is_null($aErrores['emailObligatorio'])) {
                                                       echo $_POST['emailObligatorio'];
                                               }?>"><br>
                                <?php if ($aErrores['emailObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['emailObligatorio']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Email opcional</label>
                                <input type="email" name="emailOpcional"
                                       value="<?php if (isset($_POST['emailOpcional']) && is_null($aErrores['emailOpcional'])) {
                                                       echo $_POST['emailOpcional'];
                                               }?>"><br>
                                <?php if ($aErrores['emailOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['emailOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>URL Obligatorio</label>
                                <input type="url" name="urlObligatorio" class="obligatorio" placeholder="http://"
                                       value="<?php if (isset($_POST['urlObligatorio']) && is_null($aErrores['urlObligatorio'])) {
                                                       echo $_POST['urlObligatorio'];
                                               }?>"><br>
                                <?php if ($aErrores['urlObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['urlObligatorio']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>URL opcional</label>
                                <input type="url" name="urlOpcional"
                                       value="<?php if (isset($_POST['urlOpcional']) && is_null($aErrores['urlOpcional'])) {
                                                       echo $_POST['urlOpcional'];
                                               }?>"><br>
                                <?php if ($aErrores['urlOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['urlOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Fecha Obligatoria</label>
                                <input type="date" name="fechaObligatoria"  class="obligatorio"
                                       value="<?php if (isset($_POST['fechaObligatoria']) && is_null($aErrores['fechaObligatoria'])) {
                                                        echo $_POST['fechaObligatoria'];
                                               }?>"><br>
                                <?php if ($aErrores['fechaObligatoria'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['fechaObligatoria']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Fecha opcional</label>
                                <input type="date" name="fechaOpcional" 
                                       value="<?php if (isset($_POST['fechaOpcional']) && is_null($aErrores['fechaOpcional'])) {
                                                        echo $_POST['fechaOpcional'];
                                                }?>"><br>
                                <?php if ($aErrores['fechaOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['fechaOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Dni Obligatorio</label>
                                <input type="text" name="dniObligatorio" class="obligatorio"
                                       value="<?php if (isset($_POST['dniObligatorio']) && is_null($aErrores['dniObligatorio'])) {
                                                        echo $_POST['dniObligatorio'];
                                                }?>"><br>
                                <?php if ($aErrores['dniObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['dniObligatorio']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Dni opcional</label>
                                <input type="text" name="dniOpcional" 
                                       value="<?php if (isset($_POST['dniOpcional']) && is_null($aErrores['dniOpcional'])) {
                                                        echo $_POST['dniOpcional'];
                                                }?>"><br>
                                <?php if ($aErrores['dniOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['dniOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Código Postal Obligatorio</label>
                                <input type="text" name="cpObligatorio" class="obligatorio"
                                       value="<?php if (isset($_POST['cpObligatorio']) && is_null($aErrores['cpObligatorio'])) {
                                                        echo $_POST['cpObligatorio'];
                                                }?>"><br>
                                <?php if ($aErrores['cpObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['cpObligatorio']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Código Postal opcional</label>
                                <input type="text" name="cpOpcional" 
                                       value="<?php if (isset($_POST['cpOpcional']) && is_null($aErrores['cpOpcional'])) {
                                                        echo $_POST['cpOpcional'];
                                                }?>"><br>
                                <?php if ($aErrores['cpOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['cpOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Password Obligatoria [Al menos 8 caracteres con una mayúscula y un número]</label><br>
                                <input type="password" name="passObligatoria" class="obligatorio"
                                       value="<?php if (isset($_POST['passObligatoria']) && is_null($aErrores['passObligatoria'])) {
                                                        echo $_POST['passObligatoria'];
                                                }?>"><br>
                                <?php if ($aErrores['passObligatoria'] != NULL) { ?>
                                    <div class="error"> 
                                        <?php echo $aErrores['passObligatoria']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Password opcional</label>
                                <input type="password" name="passOpcional"
                                       value="<?php if (isset($_POST['passOpcional']) && is_null($aErrores['passOpcional'])) {
                                                        echo $_POST['passOpcional'];
                                                }?>"><br>
                                <?php if ($aErrores['passOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['passOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Teléfono Obligatorio</label>
                                <input type="tel" name="telObligatorio" class="obligatorio"
                                       value="<?php if (isset($_POST['telObligatorio']) && is_null($aErrores['telObligatorio'])) {
                                                        echo $_POST['telObligatorio'];
                                                }?>"><br>
                                <?php if ($aErrores['telObligatorio'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['telObligatorio']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Teléfono opcional</label>
                                <input type="tel" name="telOpcional"
                                       value="<?php if (isset($_POST['telOpcional']) && is_null($aErrores['telOpcional'])) {
                                                        echo $_POST['telOpcional'];
                                                }?>"><br>
                                <?php if ($aErrores['telOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['telOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>TextArea opcional</label>
                                <textarea name="taOpcional"
                                          value="<?php if (isset($_POST['taOpcional']) && is_null($aErrores['taOpcional'])) { 
                                                            echo $_POST['taOpcional'];
                                                }?>">
                                </textarea>
                                <?php if ($aErrores['taOpcional'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['taOpcional']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Radio Button: </label><br>
                                <input type="radio" id="RO1" name="radioB" 
                                       value="Opcion 1" <?php if (isset($_POST['radioB']) && $_POST['radioB'] == "Opcion 1") {
                                                                echo 'checked';
                                                        }?>>
                                <label for="RO1">Opcion 1</label><br>
                                <input type="radio" id="RO2" name="radioB" 
                                       value="Opcion 2" <?php if (isset($_POST['radioB']) && $_POST['radioB'] == "Opcion 2") {
                                                                echo 'checked';
                                                        }?>> <!--//Recuerda la selección-->
                                <label for="RO2">Opcion 2</label><br>
                                <input type="radio" id="RO3" name="radioB" 
                                       value="Opcion 3" <?php if (isset($_POST['radioB']) && $_POST['radioB'] == "Opcion 3") {
                                                                echo 'checked';
                                                        }?>> <!--//Recuerda la selección-->
                                <label for="RO3">Opcion 3</label>
                                <?php if ($aErrores['radioB'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['radioB']; ?>
                                    </div>   
                                <?php } ?> 
                            </div>
                            <div class="group">
                                <label>CheckBox: </label><br>
                                <input type="checkbox" id="CO1" name="check[opcion1]" 
                                       value="Opcion 1" <?php if (isset($_POST['check']['opcion1'])) {
                                                                 echo 'checked';
                                                        }?>> <!--//Recuerda la selección-->
                                <label for="CO1">Opcion 1</label><br>
                                <input type="checkbox" id="CO2" name="check[opcion2]" 
                                       value="Opcion 2" <?php if (isset($_POST['check']['opcion2'])) {
                                                                echo 'checked';
                                                        }?>> <!--//Recuerda la selección-->
                                <label for="CO2">Opcion 2</label><br>
                                <input type="checkbox" id="CO3" name="check[opcion3]" 
                                       value="Opcion 3" <?php if (isset($_POST['check']['opcion3'])) {
                                                                echo 'checked';
                                                        }?>> <!--//Recuerda la selección-->
                                <label for="CO3">Opcion 3</label><br>
                                <?php if ($aErrores['check'] != NULL) { ?>
                                    <div class="error">
                                        <?php echo $aErrores['check']; ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div class="group">
                                <label>Lista: </label><br>
                                <select name="lista">
                                    <option value="opcion1" <?php if (isset($_POST['lista'])) {
                                        if ($aErrores['lista'] == NULL && $_POST['lista'] == "opcion1") {
                                            echo "selected";
                                        }}?>>Opcion 1</option>
                                    <option value="opcion2" <?php if (isset($_POST['lista'])) {
                                        if ($aErrores['lista'] == NULL && $_POST['lista'] == "opcion2") {
                                            echo "selected";
                                        }}?>>Opcion 2</option>
                                    <option value="opcion3" <?php if (isset($_POST['lista'])) {
                                        if ($aErrores['lista'] == NULL && $_POST['lista'] == "opcion3") {
                                            echo "selected";
                                        }}?>>Opcion 3</option>
                                </select>
                            </div>    
                            <input class="group" type="submit" value="Enviar" name="enviar">
                        </fieldset>
                    </form>
                <?php } ?>        
        </section>
    </body>
</html>
