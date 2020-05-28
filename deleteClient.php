<?php

    if(isset($_GET['cod'])){

        $cod = $_GET['cod'] ; 
        require_once "conexion4.php" ;
        $connect = new Connection() ;
        $connect->deleteClient($cod) ;
        header("location: list_client.php") ;
        
    }

?>