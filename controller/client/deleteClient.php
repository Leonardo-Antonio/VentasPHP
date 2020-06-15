<?php

    if(isset($_GET['cod'])){

        $cod = $_GET['cod'] ; 
        require_once "../../model/proceso_client.php" ;
        $deleteProd = new ProcesoClient() ;
        $deleteProd->deleteClient($cod) ;
        header("location: ../../view/client/list_client.php") ;        
    }
