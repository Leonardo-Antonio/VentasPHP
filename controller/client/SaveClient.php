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

        require_once "../../model/proceso_client.php" ;
        $clientUR = new ProcesoClient() ;

        if($action == 'register'){
            $clientUR->registerClient($data) ;
        }elseif($action == 'update'){
            $clientUR->updateClient($data) ;
        }

        echo "<script>location.href = '../../view/client/list_client.php' </script>" ;
    }



    

?>