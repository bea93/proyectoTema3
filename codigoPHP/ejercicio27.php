<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 27</title>
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
                font-weight: bold;
            }
            
            fieldset{
                display: inline-block;
            }
            #boton{
                margin: 10px;
            }
            div{
                margin: 10px;
            }
        </style>
    </head>
    <body>  
        <h1>
            Encuesta para tres personas
        </h1>
        <?php
        /**
            @author Bea Merino Macía
            @since 25/10/2020
            @description: Encuesta para tres personas
        */
        
        //Importamos la libreria de validacion
        require_once '../core/210322ValidacionFormularios.php'; 

        //Inicializa una variable que nos ayudará a controlar si todo esta correcto
        $entradaOK = true;
        
        for($persona = 1; $persona <=3; $persona++){
            //Inicializa un array que se encargará de recoger los errores(Campos vacíos)
            $aErrores[$persona]['nombre'] = null;
            $aErrores[$persona]['fechaNacimiento'] = null;
            $aErrores[$persona]['nivel'] = null;
            $aErrores[$persona]['fechaConfinamiento'] = null;
            $aErrores[$persona]['rbOpinion'] = null;
            
            //Inicializa un array que se encargará de recoger los datos del formulario
            $aFormulario[$persona]['nombre'] = null;
            $aFormulario[$persona]['fechaNacimiento'] = null;
            $aFormulario[$persona]['nivel'] = null;
            $aFormulario[$persona]['fechaConfinamiento'] = null;
            $aFormulario[$persona]['rbOpinion'] = null;
        }

        //Código que se ejecuta cuando se envía el formulario
        if (isset($_POST['enviar'])) {
            foreach ($aErrores as $persona => $numPersona){
                //La posición del array de errores recibe el mensaje de error si hubiera
                $aErrores[$persona]['nombre'] = validacionFormularios::comprobarAlfabetico($_POST[$persona]['nombre'], 250, 1, 1);
                $aErrores[$persona]['fechaNacimiento'] = validacionFormularios::validarFecha($_POST[$persona]['fechaNacimiento'], "01/01/2200", "01/01/1900", 1);
                $aErrores[$persona]['nivel'] = validacionFormularios::comprobarEntero($_POST[$persona]['nivel'], 10, 1, 1);
                $aErrores[$persona]['fechaConfinamiento'] = validacionFormularios::validarFecha($_POST[$persona]['fechaConfinamiento'], "01/01/2200", "01/01/1900", 1);
                if(!isset($_POST[$persona]['rbOpinion'])){
                    $aErrores[$persona]['rbOpinion'] = "Sin valor marcado";
                }   
            }
            
            //Recorre el array en busca de mensajes de error
            foreach ($aErrores as $campo => $error) { 
                foreach ($error as $key => $value) {
                    //Si lo encuentra vacia el campo y cambia la condición
                    if ($value != null) { 
                        //Cambia la condición de la variable
                        $entradaOK = false;
                    }
                }
            }
        } else {
            //Cambia el valor de la variable
            $entradaOK = false; 
        }
            
       //Si el valor es true es que no hay errores, muestra los datos recogidos  
        if ($entradaOK) { 
            foreach($aFormulario as $persona => $numPersona){
                //Guarda los datos en el array del formulario
                $aFormulario[$persona]['nombre'] = $_POST[$persona]['nombre'];
                $aFormulario[$persona]['fechaNacimiento'] = $_POST[$persona]['fechaNacimiento'];
                $aFormulario[$persona]['nivel'] = $_POST[$persona]['nivel'];
                $aFormulario[$persona]['rbOpinion'] = $_POST[$persona]['rbOpinion'];
                $aFormulario[$persona]['fechaConfinamiento'] = $_POST[$persona]['fechaConfinamiento'];
                
                //Código para pasar fechaNacimiento a años
                setlocale(LC_ALL, "es_ES.utf-8");
                date_default_timezone_set("Europe/Madrid");

                $fechaInicial = date($aFormulario[$persona]['fechaNacimiento']);
                $fechaActual = date('Y/m/d');
                $diff = abs(strtotime($fechaActual) - strtotime($fechaInicial));
                $years = floor($diff / (365*60*60*24));
                
                //Muestra los datos por pantalla 
                echo "<strong>" . $aFormulario[$persona]['nombre'] . "</strong> tiene " . $years . " años.<br>";
                echo "Su nivel de preocupación sobre el COVID es: " . $aFormulario[$persona]['nivel'] . "<br>";
                echo "¿Seguirá las clases online en caso de que vuelvan a confinarnos? " . $aFormulario[$persona]['rbOpinion'] . "<br>";
                echo "Y cree que volverán a confinarnos el: " . date('d/m/Y', strtotime($aFormulario[$persona]['fechaConfinamiento'])) . "<br><br>";
            }
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form name="encuesta2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php  for($respuestas = 1; $respuestas <= 3; $respuestas++){ ?>
                <fieldset>
                    <legend>Encuesta <?php echo $respuestas?></legend>
                    <label>Nombre</label>
                    <div class="obligatorio">
                        <input type="text" id="<?php echo $respuestas ?>" name="<?php echo $respuestas ?>[nombre]" placeholder="Introduce tu nombre" value="<?php
                        if ($aErrores[$respuestas]['nombre'] == NULL && isset($_POST[$respuestas]['nombre'])) {
                            echo $_POST[$respuestas]['nombre'];
                        }?>">
                        <br>
                        <?php if ($aErrores[$respuestas]['nombre'] != NULL) { ?>
                                <div class="error">
                                    <?php echo $aErrores[$respuestas]['nombre'];?>
                                </div>   
                        <?php } ?>                
                    </div>
                    
                    <label>Fecha de nacimiento</label>
                        <div class="obligatorio">
                            <input type = "date" name = "<?php echo $respuestas ?>[fechaNacimiento]"
                                   value = "<?php if ($aErrores[$respuestas]['fechaNacimiento'] == NULL && isset($_POST[$respuestas]['fechaNacimiento'])) {
                                                    echo $_POST[$respuestas]['fechaNacimiento'];
                                            }?>">
                            <br>
                            <?php if ($aErrores[$respuestas]['fechaNacimiento'] != NULL) {?>
                                    <div class="error">
                                    <?php echo $aErrores[$respuestas]['fechaNacimiento'];?>
                                    </div>
                            <?php }?>
                        </div>
                    
                    <label>¿Cuánto te preocupa el COVID? [1-10]</label>
                        <div class="obligatorio">
                            <input type="number" id="<?php echo $respuestas ?>H" name="<?php echo $respuestas ?>[nivel]" 
                                   value="<?php if ($aErrores[$respuestas]['nivel'] == NULL && isset($_POST[$respuestas]['nivel'])) {
                                                    echo $_POST[$respuestas]['nivel'];
                                            }?>">
                            <br>
                            <?php if ($aErrores[$respuestas]['nivel'] != NULL) { ?>
                                <div class="error">
                                    <?php echo $aErrores[$respuestas]['nivel']; ?>
                                </div>   
                            <?php } ?>                
                        </div>
                    
                    <label>¿Seguirás las clases online si nos confinan?</label>
                        <div class="obligatorio">
                            <input type="radio" id="<?php echo $respuestas?>RB1" name="<?php echo $respuestas?>[rbOpinion]" value="Sí" 
                                <?php if (isset($_POST[$respuestas]['rbOpinion']) && $_POST[$respuestas]['rbOpinion'] == "si") {
                                            echo 'checked';
                                }?>>
                            <label for="<?php echo $respuestas?>RB1">Sí</label><br>
                            <input type="radio" id="<?php echo $respuestas?>RB2" name="<?php echo $respuestas?>[rbOpinion]" value="No" 
                                <?php if (isset($_POST[$respuestas]['rbOpinion']) && $_POST[$respuestas]['rbOpinion'] == "no") {
                                            echo 'checked';
                                }?>>
                            <label for="<?php echo $respuestas?>RB2">No</label><br>
                            <input type="radio" id="<?php echo $respuestas?>RB3" name="<?php echo $respuestas?>[rbOpinion]" value="Lo intentará" 
                                <?php if (isset($_POST[$respuestas]['rbOpinion']) && $_POST[$respuestas]['rbOpinion'] == "lo intentara") {
                                            echo 'checked';
                                }?>>
                            <label for="<?php echo $respuestas?>RB3">Intentaré intentarlo</label><br>
                            <?php if ($aErrores[$respuestas]['rbOpinion'] != NULL) { ?>
                                <div class="error">
                                    <?php echo $aErrores[$respuestas]['rbOpinion'];?>
                                </div>   
                            <?php } ?> 
                        </div>
                    
                    <label>¿Cuándo crees que volverán a confinarnos</label>
                        <div class="obligatorio">
                            <input type = "date" name = "<?php echo $respuestas ?>[fechaConfinamiento]"
                                   value = "<?php
                                   if ($aErrores[$respuestas]['fechaConfinamiento'] == NULL && isset($_POST[$respuestas]['fechaConfinamiento'])) {
                                       echo $_POST[$respuestas]['fechaConfinamiento'];
                                   }
                                   ?>">
                            <br>
                            <?php if ($aErrores[$respuestas]['fechaConfinamiento'] != NULL) {?>
                                    <div class="error">
                                    <?php echo $aErrores[$respuestas]['fechaConfinamiento'];?>
                                    </div>
                            <?php }?>
                        </div>
                        <br>
                </fieldset>
                <?php } ?>
                <div id="boton">
                    <input type="submit" name="enviar" value="Enviar">
                </div>
            </form> 
    <?php } ?>   
        <br>
    </body>
</html>