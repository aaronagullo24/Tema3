<html>

<head></head>

<body>
    <table border="1" align="center">
        <tr>
            <?php
            include "funciones.php";
           
            $cadena_array = $_POST['array'];
            $array = cadena_a_array($cadena_array);
            var_dump($array);
            foreach ($array as $indice) {
                echo '<tr>';
                foreach ($indice as $i) {
                    echo '<td>' . $i . " " . '</td>';
                }
                echo "<tr>";
            }
            ?>
        </tr>
</body>

</html>