<?php

    require_once "../../model/proceso_client.php" ;

    if(isset($_GET['cod'])){
        
        $codigo = $_GET['cod'] ;

        $con = new ProcesoClient() ;
        $search = $con->searchClient($codigo) ;

        if(!empty($search[0])){
            $search = $search[0] ;
            $listDist = $con->listdistrict() ;
        }else{
            echo "<script>location.href = 'list_client.php' </script>" ;
        }
    }else{
        echo "<script>location.href = 'list_client.php' </script>" ;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Client</title>
    <link rel="stylesheet" href="../../content/style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../content/style/fontawesome/css/all.css">
    <script src="../../content/style/jquery.js"></script>
    <script type="text/javascript" src="../../content/style/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

    <?php
        require_once "../../navbar.php" ;
    ?>


    <form class="mt-5" action="../../controller/client/SaveClient.php" method="post" style="width: 40%; margin : auto ">

        <input type="hidden" name="action" value="update">

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Código</span>
            </div>
            <input value="<?=($search['cod_cliente'])?>" name="txt_cod" readonly type="text" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-md mb-3">

            <div class="input-group-prepend">
                <span class="input-group-text">Nombre y Apellido</span>
            </div>
            <input value="<?=($search['nom_cliente'])?>" name="txt_nom" type="text" required class="form-control">
            <input value="<?=($search['ape_cliente'])?>" name="txt_ape" type="text" required class="form-control">

        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Sexo</span>
            </div>
            <select name="cmb_sexo" class="custom-select custom-select-md">
                <option <?=($search['sexo_cliente'] == 'F' ? "selected" : "" )?> value="F">Femenino</option>
                <option <?=($search['sexo_cliente'] == 'M' ? "selected" : "" )?> value="M">Masculino</option>
                <option <?=($search['sexo_cliente'] == 'O' ? "selected" : "" )?> value="O">No especificar</option>
            </select>
        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">DNI</span>
            </div>
            <input value="<?=($search['dni_cliente'])?>" name="txt_dni" type="text" maxlength="8" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Dirección</span>
            </div>
            <input value="<?=($search['direccion'])?>" name="txt_dir" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Telefono</span>
            </div>
            <input value="<?=($search['telefono'])?>" name="txt_tel" type="text" maxlength="9" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Distrito</span>
            </div>

            <select name="cmb_dis" required class="custom-select custom-select-md">

            <?php  
            foreach($listDist as $distrito){
            ?>
                <option <?=($search['cod_distrito'] == $distrito['cod_distrito'] ? "selected" : "" )?> 
                value="<?=($distrito['cod_distrito'])?>">
                <?=($distrito['nom_distrito'])?>
                </option>

            <?php } ?>

            </select>

        </div>

        <div class="row">
                
                <button name="btn_action" class="col ml-2 btn btn-primary mb-3 "  type="submit" name="btn_registrar" id="btn_registrar">
                    <i class="fas fa-plus"></i>    
                    Actualizar
                </button>

                <a href="list_client.php" class="col ml-2 btn btn-success mb-3  text-white">
                    <i class="fas fa-undo"></i>
                    Regresar
                </a>
    
            </div>

    </form>
</body>
</html>