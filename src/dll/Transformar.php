<?php
    if(isset($_POST["Transformar"])){
        $num = (int)$_POST["num"];
        $valor = 10/$num;
        //echo "<script>alert('".$valores."');</script>";
        echo $valor;
        
    }

?>