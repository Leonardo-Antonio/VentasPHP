<?php

    if(isset($_POST['btn_action'])){
        
        $data = [
            'cod'  => $_POST['txt_cod'] ,
            'nom'  => $_POST['txt_nom'] ,
            'ape'  => $_POST['txt_ape'] ,
            'sexo' => $_POST['cmb_sexo'],
            'dni'  => $_POST['txt_dni'] ,
            'dir'  => $_POST['txt_dir'] ,
            'tel'  => $_POST['txt_tel'] ,
            'dis'  => $_POST['cmb_dis'] ,
        ] ;

        $action = $_POST['action'] ;

        require_once "conexion4.php" ;
        $conection = new Connection() ;

        if($action == 'register'){
            $conection->registerClient($data) ;
        }elseif($action == 'update'){
            $conection->updateClient($data) ;
        }

        echo "<script>location.href = 'list_client.php' </script>" ;
    }



    

?>