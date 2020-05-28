<?php

    require_once "conexion4.php" ;
    $con = new Connection() ; 
    $id = 'P0002' ;
    $prod_nombre = 'Cloro';
    $prod_medida = 'L' ;
    $prod_stock = '8';
    $prod_perecible = '0';
    $prod_costo = '5';
    $prod_pres_id = 'PR003' ;
    $con->updateProd($id , $prod_nombre , $prod_medida , $prod_stock ,$prod_perecible ,$prod_costo, $prod_pres_id) ;

?>