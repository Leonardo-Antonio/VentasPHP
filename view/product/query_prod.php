<?php
require_once "../../model/proceso_prod.php";

$prod = new ProcesoProducto();
$rows = $prod->listarPresentacion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Query</title>
    <link rel="stylesheet" href="../../content/style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../content/style/fontawesome/css/all.css">
    <script type="text/javascript" src="../../content/style/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../content/style/jquery.js"></script>
    <script src="../../content/js/codigo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>

    <?php
    require_once "../../navbar.php"
    ?>

    <div class="container" style="width: 450px">
        <form name="frmRegistro" id="frmRegistro" method="post">

            <div class="form-group">
                <input type="hidden" name="action" value="r">
                <label class="text-uppercase font-weight-bold text-monospace" for="txt_id">Ingrese código a consultar : </label><br />
                <input class="form-control" autofocus required type="text" name="txt_Vid" id="txt_Vid" maxlength="5" autocomplete="off" placeholder="Código del Producto">
            </div>

            <div class="form-group">
                <label class="text-uppercase font-weight-bold text-monospace" for="lbl_nom">Nombre del Producto : </label><br />
                <label class="text-monospace font-italic" id="lbl_nom"></label>
            </div>

            <div class="form-group">
                <label class="text-uppercase font-weight-bold text-monospace" for="lbl_med">Medida : </label><br />
                <label class="text-monospace font-italic" id="lbl_med"></label>
            </div>

            <div class="form-group">
                <label class="text-uppercase font-weight-bold text-monospace" for="lbl_stk">Stock : </label><br />
                <label class="text-monospace font-italic" id="lbl_stk"></label>
            </div>

            <div class="form-group">
                <label class="text-uppercase font-weight-bold text-monospace" for="lbl_per">Perecible : </label><br />
                <label class="text-monospace font-italic" id="lbl_per"></label>
            </div>

            <div class="form-group">
                <label class="text-uppercase font-weight-bold text-monospace" for="lbl_cst">Costo : </label><br />
                <label class="text-monospace font-italic" id="lbl_cst"></label>
            </div>

            <div class="form-group">
                <label class="text-uppercase font-weight-bold text-monospace" for="lbl_prs">Presentación : </label><br>
                <label class="text-monospace font-italic" id="lbl_prs"></label>
            </div>

            <div class="row">

                <a href="query_prod.php" class="text-white col ml-2 btn btn-primary mb-3 " type="submit" name="btn_registrar" id="btn_registrar">
                    <i class="fas fa-plus"></i>
                    Nueva consulta
                </a>

                <a href="listar_prod.php" class="col ml-2 btn btn-success mb-3  text-white">
                    <i class="fas fa-undo"></i>
                    Regresar
                </a>

            </div>

        </form>
    </div>

</body>

</html>