<?php

    if(isset($_POST['txt_valor'])){

        $valor = $_POST['txt_valor'] ; 
        
        require_once "../../model/proceso_prod.php" ;
        $searchProd = new ProcesoProducto() ;
        $searchProd->searchProdporValor($valor) ;
        
    }

?>