<?php

    if(isset($_POST['valor'])){

        $valor = $_POST['valor'] ; 
        
        require_once "../../model/proceso_prod.php" ;

        $queryProd = new ProcesoProducto();
        $queryProd->productQuery($valor);

        
    }

?>