<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'] ; 
        require_once "conexion4.php" ;
        $connect = new Connection() ;
        $connect->deleteProd($id) ;
        header("location: listar_prod.php") ;
        
    }

?>