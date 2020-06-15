<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'] ; 
        require_once "../../model/proceso_prod.php" ;
        $ProdDelete = new ProcesoProducto() ;
        $ProdDelete->deleteProd($id) ;
        echo "<script>location.href = '../../view/product/listar_prod.php' </script>";
        
    }

?>