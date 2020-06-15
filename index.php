<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="content/style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="content/style/fontawesome/css/all.css">
    <script src="content/style/jquery.js"></script>
    <script type="text/javascript" src="content/style/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        require_once "navbar.php" ;
    ?>

    <div class="container">

        <div class="row mt-3 d-flex justify-content-center">

            <div class="col-lg-6 col-sm-12 col-md-5">
                <div class="card">
                    <img src="content/img/product.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lista de Productos</h5>
                        <p class="card-text">Pódras encontrar la información del los productos , añadir nuevos productos o actualizar sus datos</p>
                        <a href="view/product/listar_prod.php" class="btn btn-block btn-outline-primary">
                            <i class="fas fa-list-ol"></i>    
                            List Product
                        </a>
                    </div>
                </div>
            </div>
    
    
            <div class="col-lg-6 col-sm-12 col-md-5">
                <div class="card">
                    <img src="content/img/client.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lista de Clientes</h5>
                        <p class="card-text">Pódras encontrar la información del los clientes frecuentes , añadir nuevos clientes o actualizar sus datos</p>
                        <a href="view/client/list_client.php" class="btn btn-block btn-outline-primary">
                            <i class="fas fa-users"></i> 
                            List Client
                        </a>
                    </div>
                </div>
            </div>

        </div>
        
        
    </div>

</body>
</html>