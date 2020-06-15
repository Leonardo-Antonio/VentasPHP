<?php 
    require_once "../../model/proceso_prod.php" ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../content/style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../content/style/fontawesome/css/all.css">

    <script src="../../content/style/jquery.js"></script>
    <script type="text/javascript" src="../../content/style/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../content/js/codigo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title>List of product</title>
</head>
<body>

    <?php
        require_once "../../navbar.php"
    ?>
   
    <div class="container d-flex justify-content-center mb-3">
        
        <a class="mr-2 btn btn-outline-primary btn-sm" href="registrar_prod.php">
            <i class="fas fa-plus"></i>    
            Registrar producto
        </a>

        <a class="mr-2 btn btn-outline-primary btn-sm" href="search_prod.php">
            <i class="fas fa-search"></i>    
            Buscar producto
        </a>

        <a class="mr-2 btn btn-outline-primary btn-sm" href="show_info1.php">
            <i class="mr-2 fas fa-info"></i>    
            Info 1
        </a>

        <a class="mr-2 btn btn-outline-primary btn-sm" href="show_info2.php">
            <i class="mr-2 fas fa-info"></i>    
            Info 2
        </a>

        <a class="mr-2 btn btn-outline-primary btn-sm" href="query_prod.php">
            <i class="fas fa-question"></i>    
            Consultar producto
        </a>

    </div>
    
    <?php 
        $list_prod = new ProcesoProducto() ;
        $list_prod->listarProd() ;
    ?>

</body>
</html>
