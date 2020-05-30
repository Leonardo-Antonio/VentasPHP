<?php
    require_once "conexion4.php" ;

    if(isset($_GET['id'])){
        
        $id = $_GET['id'] ;

        $con = new Connection() ;
        $search = $con->searchProd($id) ;

        if(!empty($search[0])){
            $search = $search[0] ;
            $listPres = $con->listarPresentacion() ;
        }else{
            header("location : listar_prod.php") ;
        }
    }else{
        header("location : listar_prod.php") ;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/fontawesome/css/all.css">
    <script src="style/jquery.js"></script>
    <script type="text/javascript" src="style/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

    <?php
        require_once "navbar.php" ;
    ?>

    <div class="container" style="width: 450px">
    
        <form name="frmRegistro" id="frmRegistro" method="post" action="grabar.php">

            
            <div class="form-group">
                <input type="hidden" name="action" value="e">
                <label for="txt_id">ID : </label><br/>
                <input value="<?=$search['prod_id']?>" class="form-control" type="text" name="txt_id" id="txt_id" maxlength="5" readonly>
            </div>

           <div class="form-group">
                <label for="txt_nomProd">Nombre del Producto : </label><br/>
                <input value="<?=$search['prod_nombre']?>" class="form-control" required type="text" name="txt_nomProd" id="txt_nomProd" maxlength="50" >
           </div>

            <div class="form-group">
                <label for="txt_med">Medida : </label><br/>
                <input value="<?=$search['prod_medida']?>" class="form-control" required type="text" name="txt_med" id="txt_med" maxlength="5" >
            </div>

            <div class="form-group">
                <label for="txt_stk">Stock : </label><br/>
                <input value="<?=$search['prod_stock']?>" class="form-control" required type="text" name="txt_stk" id="txt_stk" >
            </div>

            <div class="form-group">
                <label for="rbt_prc">Perecible : </label><br/>
                <div class="form-check form-check-inline">
                    <input <?=($search['prod_perecible'] == '0' ? "checked" : "")?> type="radio" name="rbt_prc" id="rbt_prc1" value="0" >No
                </div>

                <div class="form-check form-check-inline">
                    <input <?=($search['prod_perecible'] == '1' ? "checked" : "")?> type="radio" name="rbt_prc" id="rbt_prc2" value="1" >Si
                </div>

            </div>

            <div class="form-group">
                <label for="txt_cst">Costo : </label><br/>
                <input value="<?=$search['prod_costo']?>" class="form-control" required type="text" name="txt_cst" id="txt_cst" maxlength="10">
            </div>


            <div class="form-group">
                <label for="cbo_pres">Presentación : </label>
                <select class="form-control" name="cbo_pres" id="cbo_pres">
                
                <?php foreach($listPres as $row) { ?>
                    <option <?=($search['prod_pres_id'] == $row['pres_id'] ? "selected" : "")?> 
                    value="<?=$row['pres_id'] ?>" > 
                    <?=$row['pres_nombre']?> 
                    </option>
                <?php  } ?>
                
                </select>
            </div>

            <div class="row">
                
                <button class="col ml-2 btn btn-primary mb-3 " type="submit" name="btn_registrar" id="btn_registrar">
                    <i class="fas fa-plus"></i>    
                    Actualizar
                </button>

                <a href="listar_prod.php" class="col ml-2 btn btn-success mb-3  text-white">
                    <i class="fas fa-undo"></i>
                    Regresar
                </a>
    
            </div>

        </form>
    </div>

</body>
</html>