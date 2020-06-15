<?php

require_once "../../model/proceso_client.php" ;
$conection = new ProcesoClient ();
$distritos = $conection->listdistrict();

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
        require_once "../../navbar.php"
    ?>

    <form class="mt-5" action="../../controller/client/SaveClient.php" method="post" style="width: 40%; margin : auto ">

        <input type="hidden" name="action" value="register">

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Código</span>
            </div>
            <input name="txt_cod" maxlength="5" type="text" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-md mb-3">

            <div class="input-group-prepend">
                <span class="input-group-text">Nombre y Apellido</span>
            </div>
            <input name="txt_nom" type="text" required class="form-control">
            <input name="txt_ape" type="text" required class="form-control">

        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Sexo</span>
            </div>
            <select name="cmb_sexo" class="custom-select custom-select-md">
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
                <option value="O">No especificar</option>
            </select>
        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">DNI</span>
            </div>
            <input name="txt_dni" type="text" maxlength="8" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Dirección</span>
            </div>
            <input name="txt_dir" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Telefono</span>
            </div>
            <input name="txt_tel" type="text" maxlength="9" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-md mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Distrito</span>
            </div>

            <select name="cmb_dis" required class="custom-select custom-select-md">

            <?php  
            foreach($distritos as $distrito){
            ?>
                <option value="<?=($distrito['cod_distrito'])?>"><?=($distrito['nom_distrito'])?></option>

            <?php } ?>

            </select>

        </div>

        <div class="row">
                
                <button name="btn_action" class="col ml-2 btn btn-primary mb-3 "  type="submit" name="btn_registrar" id="btn_registrar">
                    <i class="fas fa-plus"></i>    
                    Registrar
                </button>

                <a href="list_client.php" class="col ml-2 btn btn-success mb-3  text-white">
                    <i class="fas fa-undo"></i>
                    Regresar
                </a>
    
            </div>

    </form>
</body>
</html>