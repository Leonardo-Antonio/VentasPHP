<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show data with json</title>
    <link rel="stylesheet" href="../../content/style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../content/style/fontawesome/css/all.css">
    <script src="../../content/style/jquery.js"></script>
    <script src="../../content/js/codigo.js"></script>
    <script type="text/javascript" src="../../content/style/bootstrap/js/bootstrap.min.js"></script>
    
</head>
<body>
    
    <?php
        require_once "../../navbar.php" ;
        $provincia = [ 'Lima' , 'Barranca' , 'Huaral' ] ;
    ?>

    <div class="container" style="width: 450px">
        <form name="frmRegistro" id="frmRegistro" method="post">

            <div class="form-group">
                <label for="txt_id">Nombre</label><br/>
                <select class="form-control" name="cb_provincia" id="cb_provincia">
                    <option value="">Selecione Provincia</option>
                    <?php
                    foreach($provincia as $item){
                    ?>
                    <option value="<?=($item)?>" ><?=($item)?></option>
                    <?php }?>
                </select>
            </div>

            <div class="form-group">
                <label for="txt_id">Nombre</label><br/>
                <select class="form-control" name="cb_distrito" id="cb_distrito">
                    <option value="">Selecione distrito</option>
                </select>
            </div>

            <div class="row">
                
                <button class="col ml-2 btn btn-primary mb-3 "  type="submit" name="btn_add" id="btn_add">
                    <i class="fas fa-plus"></i>    
                    Registrar
                </button>

                <a href="listar_prod.php" class="col ml-2 btn btn-success mb-3  text-white">
                    <i class="fas fa-undo"></i>
                    Regresar
                </a>
    
            </div>
        </form>
        <div id="renderJson"></div>
    </div>

</body>
</html>