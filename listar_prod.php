<?php require_once "conexion4.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/fontawesome/css/all.css">

    <script src="style/jquery.js"></script>
    <script type="text/javascript" src="style/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/codigo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title>List of product</title>
</head>
<body>

    <?php
        require_once "navbar.php"
    ?>
   
    <div class="container d-flex justify-content-center mb-3">
        
        <a style="width: 420px" class="btn btn-block btn-outline-primary btn-sm" href="registrar_prod.php">
            <i class="fas fa-plus"></i>    
            Registrar
        </a>
    </div>
    
    <?php 
        $list = new Connection () ;
        $list->listarProd() ;
    ?>

</body>
</html>
