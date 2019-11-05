<?php
    $palabra=array("a","b","c","p","o","P");
    for($i=0;$i < count($palabra);$i++){
        $palabra=ord($palabra[$i])+1;
        $palabra=chr($palabra[$i]);

        echo $palabra;
    }
?>