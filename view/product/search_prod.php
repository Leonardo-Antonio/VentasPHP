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

    <title>Search product</title>
</head>
<body>

    <?php
        require_once "../../navbar.php"
    ?>
   
    <div class="container d-flex justify-content-center mb-3">
    
        <form name="frm_search" method="post" style="width: 60%;">
            <div class="input-group">
                <input name="txt_valor" id="txt_valor" type="text" class="form-control" placeholder="Buscar" maxlength="50" autocomplete="off" autofocus aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                <div class="input-group-append" id="button-addon4">
                    <button type="button" name="btn_search" id="btn_search" class="btn btn-outline-secondary" >
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <div class="container" id="resultado"></div>
    

</body>
</html>
