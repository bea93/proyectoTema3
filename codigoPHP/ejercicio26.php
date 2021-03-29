<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 26</title>
        <style>
            .obligatorio input{
                background-color: lightblue;
            }
            .obligatorio textarea{
                background-color: lightblue;
            }
            .obligatorio select{
                background-color: lightblue;
            }
            .error{
                color: red;
                transition: 10s;
                width: 10%;
                padding: 0.5%;
                border-radius: 10%;
            }
        </style>
    </head>
    <body>  
        <h1>
            Encuesta de satisfacción personal :)
        </h1>
        <?php
            /**
                @author Bea Merino Macía
                @since 08/10/2020
                @description: Encuesta de satisfacción personal 
            */
            
            //Importamos la libreria de validacion
            require '../core/210322ValidacionFormularios.php'; 

            //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
            $entradaOK = true; 

            //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
            $aErrores = [
                'nombre' => null,

                'curso' => null,

                'estadoAnimo' => null,

                'selectorRadio' => null,

                'selectorFecha' => null,

                'lista' => null
            ];

            //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
            $aFormulario = [
                'nombre' => null,

                'curso' => null,

                'estadoAnimo' => null,

                'selectorRadio' => null,

                'selectorFecha' => null,

                'lista' => null
            ];

            //Si se ha pulsado enviar
            if (isset($_POST['conclusion']) && $_POST['conclusion'] == 'Conclusion') { 
                //La posición del array de errores recibe el mensaje de error si hubiera
                //Se indican los valores maximo, mínimo y opcionalidad
                $aErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_POST['nombre'], 200, 1, 1);  
                $aErrores['curso'] = validacionFormularios::comprobarEntero($_POST['curso'], 150, -150, 1);
                
                if(!isset($_POST['selectorRadio'])){$aErrores['selectorRadio'] = "Debe marcarse un valor";}
                $aErrores['selectorFecha'] = validacionFormularios::validarFecha($_POST['selectorFecha'], "2999-12-12", "1900-01-01", 1);
                $aErrores['estadoAnimo'] = validacionFormularios::comprobarAlfaNumerico($_POST['estadoAnimo'], 255, 1, 1);
                $aErrores['lista'] = validacionFormularios::validarElementoEnLista($_POST['lista'], array("Ni idea", "Con la familia", "De fiesta", "Trabajando", "Estudiando DWES"));
                
                //Recorre el array en busca de mensajes de error
                foreach ($aErrores as $campo => $error) {
                    //Si lo encuentra vacia el campo y cambia la condiccion
                    if ($error != null) {
                        //Cambia la condiccion de la variable
                        $entradaOK = false; 
                    }
                    else{
                        if(isset($_POST[$campo])){
                            $aFormulario[$campo] = $_POST[$campo];
                        }
                    } 
                }
            } else {
                //Cambiamos el valor de la variable porque no se ha pulsado el botón
                $entradaOK = false; 
            }

            //Si el valor es true procesamos los datos que hemos recogido
            if ($entradaOK) {
                //Mostramos los datos por pantalla   
                setlocale(LC_ALL, "es_ES.utf-8");
                date_default_timezone_set("Europe/Madrid");
                
                $fechaInicial = date($aFormulario['selectorFecha']);
                $fechaActual = date('Y');
                $diff = abs(strtotime($fechaActual) - strtotime($fechaInicial));
                $years = floor($diff / (365*60*60*24));

                echo strftime("<p>Hoy, %A %d de %B de %G a las %H:%M <br>");
                
                echo "Don /Dña. " . $aFormulario['nombre'] . " nacid@ hace " . $years . " años.<br>";

                echo "Se siente: " . $aFormulario['selectorRadio'] . "<br>";

                echo "Valora su curso actual con un: " . $aFormulario['curso'] . "<br>";

                echo "Esta Semana Santa la pasará: " . $aFormulario['lista'] . "<br>";

                echo "Y además opina que: " . $aFormulario['estadoAnimo'] . "</p>";
            } else { //Mostrar el formulario hasta que se rellene correctamente
                ?>
                <form name="encuesta1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <fieldset>
                        <legend>Encuesta</legend>
                        <div class="obligatorio">
                            <label for="nombre">Nombre y apellidos:</label>
                            <input type="text" name="nombre" placeholder="Nombre y apellidos" id="nombre" value="<?php if($aErrores['nombre'] == NULL && isset($_POST['nombre'])){ echo $_POST['nombre'];} ?>"><br>
                            <?php if ($aErrores['nombre'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['nombre']; //Mensaje de error que tiene el array aErrores?>
                            </div>   
                        <?php } ?>                
                        </div>
                        <br>
                        <div class="obligatorio">
                            <label for="fecha">Fecha de Nacimiento:</label>
                            <input type="date" name="selectorFecha" id="fecha" value="<?php if($aErrores['selectorFecha'] == NULL && isset($_POST['selectorFecha'])){ echo $_POST['selectorFecha'];} ?>"><br>
                            <?php if ($aErrores['selectorFecha'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['selectorFecha'];?>
                            </div>   
                        <?php } ?>                
                        </div>
                        <br>
                        <div class="obligatorio">
                            <label>¿Cómo te sientes hoy?:</label>
                            <br>
                            <input type="radio" id="RO1" name="selectorRadio" value="Muy mal" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy mal"){ echo 'checked';} ?>>
                                <label for="RO1">Muy mal</label>
                            <input type="radio" id="RO2" name="selectorRadio" value="Mal" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Mal"){ echo 'checked';} ?>>
                                <label for="RO2">Mal</label>
                            <input type="radio" id="RO3" name="selectorRadio" value="Regular" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Regular"){ echo 'checked';} ?>>
                                <label for="RO3">Regular</label>
                            <input type="radio" id="RO3" name="selectorRadio" value="Bien" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Bien"){ echo 'checked';} ?>>
                                <label for="RO3">Bien</label>
                            <input type="radio" id="RO3" name="selectorRadio" value="Muy bien" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy bien"){ echo 'checked';} ?>>
                                <label for="RO3">Muy bien</label>
                            <?php if ($aErrores['selectorRadio'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['selectorRadio'];?>
                            </div>   
                        <?php } ?>                
                        </div>
                        <br>
                        <div class="obligatorio">
                            <label for="curso">¿Cómo va el curso? [1-10]</label>
                            <input type="number" id="curso" name="curso" placeholder="Valoración del curso" value="<?php if($aErrores['curso'] == NULL && isset($_POST['curso'])){ echo $_POST['curso'];} ?>"><br> 
                            <?php if ($aErrores['curso'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['curso'];?>
                            </div>   
                        <?php } ?>                
                        </div>
                        <br>
                        <div class="obligatorio">
                            <label>¿Cómo se presenta la Semana Santa?</label>
                            <select name="lista">
                                <option value="Ni idea" <?php if(isset($_POST['lista'])){if($aErrores['lista'] == NULL && $_POST['lista'] == "Ni idea"){ echo "selected";}} ?>>Ni idea</option>
                                <option value="Con la familia" <?php if(isset($_POST['lista'])){if($aErrores['lista'] == NULL && $_POST['lista'] == "Con la familia"){ echo "selected";}} ?>>Con la familia</option>
                                <option value="De fiesta" <?php if(isset($_POST['lista'])){if($aErrores['lista'] == NULL && $_POST['lista'] == "De fiesta"){ echo "selected";}} ?>>De fiesta</option>
                                <option value="Trabajando" <?php if(isset($_POST['lista'])){if($aErrores['lista'] == NULL && $_POST['lista'] == "Trabajando"){ echo "selected";}} ?>>Trabajando</option>
                                <option value="Estudiando DWES" <?php if(isset($_POST['lista'])){if($aErrores['lista'] == NULL && $_POST['lista'] == "Estudiando DWES"){ echo "selected";}} ?>>Estudiando DWES</option>
                            </select>
                            <?php if ($aErrores['lista'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['lista'];?>
                            </div>   
                        <?php } ?>                             
                        </div>
                        <br>
                        <div class="obligatorio">
                            <label for="estadoAnimo">Describe brevemente tu estado de ánimo: </label><br>
                            <textarea name="estadoAnimo" placeholder="Estado de ánimo" id="estadoAnimo"><?php if($aErrores['estadoAnimo'] == NULL && isset($_POST['estadoAnimo'])){ echo trim($_POST['estadoAnimo']);}?></textarea><br>
                            <?php if ($aErrores['estadoAnimo'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['estadoAnimo'];?>
                            </div>   
                        <?php } ?>                
                        </div>
                        <br>
                        <div>
                            <input type="submit" name="conclusion" value="Conclusión">
                        </div>
                    </fieldset>
                </form>
        <?php } ?>   
        <br>
    </body>
</html>