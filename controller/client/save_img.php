<?php

    if(isset($_POST['btn_register'])){
        
        $data = [
            'img_nom' => $_FILES['img']['name'] ,
            'img_img' => file_get_contents($_FILES['img']['tmp_name'])
        ] ;

        require_once "../../model/proceso_client.php" ;
        $conection = new ProcesoClient() ;

        $conection->registerImg($data) ;

        echo "<script>location.href = '../../view/client/list_img.php' </script>" ;

    }
