<?php 
    require_once "../../model/proceso_client.php" ; 
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
    <script src="../../content/js/viewImg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title>Galery of images</title>
</head>
<body>

    <?php
        require_once "../../navbar.php"
    ?>
   
   <div class="container">

        <div class="row d-flex justify-content-center">
            <form name="frm_registro" id="frm_registro" action="../../controller/client/save_img.php" method="post" enctype="multipart/form-data" >
                <div class="card mb-3 border-primary" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="d-flex justify-content-center align-items-center col-md-4">
                        <img name="img_previa" id="img_previa" src="../../content/img/default.png" class="card-img" alt="..." >
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Agregar Imagen</h5>
                            <p class="card-text">Selecione imagen</p>
                            <p class="card-text">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="inputGroupFile01">Imagen</label>
                                        <input type="file" name="img" id="img" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*" required>
                                    </div>
                                </div>
                            </p>
                            <button name="btn_register" class="btn btn-block btn-outline-primary btn-sm">
                                <i class="fas fa-save"></i>
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
   </div>
    
    <?php 
        $listClient_img = new ProcesoClient() ;
        $listClient_img->listImg() ;
    ?>

</body>
</html>
