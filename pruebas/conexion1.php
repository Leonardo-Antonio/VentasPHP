<?php

   /*  $usuario    = "leonardo" ; 
    $passw      = "chester"  ;
    $servidor   = "localhost";
    $bd         = "bd_ventas";

    //inicio de controlador de errores

    try {
        $connect = new PDO("mysql:host=$servidor ; dbname=$bd;" , $usuario , $passw ) ;
        // Recomendado para gestionar los errores con PDOException
        $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ) ;
        echo "Base de Datos Conectado..." ; 
    } catch (PDOException $err) {
        echo "Se encontro un error : ".$err->getMessage() ;

        
    } */

    /* $enlace = mysqli_connect("127.0.0.1", "leonardo", "chester", "bd_ventas");

    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
    echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

    mysqli_close($enlace); */

    $usuario = 'leonardo' ;
    $pass = 'chester' ;

    try {
        $connect = new PDO('mysql:host=localhost;dbname=bd_ventas', $usuario, $pass);
        $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ) ;
        echo "Base de Datos Conectado..." ; 
    } catch (PDOException $err) {
        echo "Se encontro un error : ".$err->getMessage() ;
    }
    
?>