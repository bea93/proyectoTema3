<html>
    <head>
        <title>Bea Merino Macía</title>
    </head>
    <body>
        <?php
        /*
            @author: Bea Merino Macía
            Fecha: 22/03/2021
            Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.
        */
            echo "Fecha actual -> ",date("d/m/Y");
            echo '<br>';
            echo "Fecha dentro de 60 días -> ", date("d/m/Y", strtotime("+60 day")), "<br>"; //La función strtotime transforma la cadena que recibe en una marca TimeStamp que suma a la inicial
        ?>
    </body>
</html>