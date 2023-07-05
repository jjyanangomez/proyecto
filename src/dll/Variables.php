<?php
    session_start();
    if(($_GET['IdBanco'])){
        $Banco= $_GET['IdBanco'];
        $_SESSION['IDBanco'] = $Banco;
        echo "<script>location.href='../../src/views/Preguntas.php'</script>";
    }else{
        echo '<script>alert("No se encontro el Banco");</script>';
	    echo "<script>location.href='../../src/views/listBanco.php'</script>";
    }
    


?>