<?php

    require_once "../../model/proceso_client.php" ;

    $listCli = new ProcesoClient();

    $clients = $listCli->listClient();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Client</title>
    <link rel="stylesheet" href="../../content/style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../content/style/fontawesome/css/all.css">
    <script src="../../content/js/codigo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../../content/style/jquery.js"></script>
    <script type="text/javascript" src="../../content/style/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

    <?php
        require_once "../../navbar.php" ;
    ?>


    <div class="container">

        <div class="container d-flex justify-content-center mb-3">
        
        <a class="mr-2 btn btn-outline-primary btn-sm" style="width: 33%;" href="register_client.php">
            <i class="fas fa-user"></i>
            Registrar Cliente
        </a>

        <a class="mr-2 btn btn-outline-primary btn-sm" style="width: 33%;" href="list_img.php">
                <i class="far fa-id-badge"></i>
                Perfiles de Clientes
        </a>

    </div>

        <table align="center" class="table table-sm" style="width: 66%;">
            <thead class="thead-dark">
                <tr>
                <th>N°</th>
                <th>Código</th>
                <th>Cliente</th>
                <th>Dirección</th>
                <th>Distrito</th>
                <th>Telefono</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <?php 
            $i = 1 ;
            foreach($clients as $client) {
            ?>
            <tbody>
                <tr>
                <th><?=$i++?></th>
                <td><?=($client['cod'])?></td>
                <td><?=($client['client'])?></td>
                <td><?=($client['nom_distrito'])?></td>
                <td><?=($client['direccion'])?></td>
                <td><?=($client['telefono'])?></td>
                <td class="d-flex justify-content-center">
                    <a class="mr-3 text-success" href="editClient.php?cod=<?=($client['cod'])?>"><i class="far fa-edit"></i></a>
                    <a class="mr-3 text-danger"  href=javascript:deleteClient("<?=($client['cod'])?>")><i class="far fa-trash-alt"></i></a>
                </td>
                </tr>
            </tbody>
            <?php }?>
        </table>
    </div>

</body>
</html>