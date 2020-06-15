<?php

    if(isset($_POST['btn_registrar'])){

        require_once "../../model/proceso_prod.php" ;
        $newProd = new ProcesoProducto() ;
 
        $data = [$_POST['txt_id'] , $_POST['txt_nomProd'] , $_POST['txt_med'] , $_POST['txt_stk'] , $_POST['rbt_prc'] ,$_POST['txt_cst'] , $_POST['cbo_pres']] ;
        
        $action = $_POST['action'] ; 
        
        
        if($action == 'r'){
            $newProd->registrarProd($data[0] , $data[1] , $data[2] , $data[3] , $data[4] , $data[5] , $data[6] ) ; 
        }
        elseif($action == 'e'){
            $newProd->updateProd($data[0] , $data[1] , $data[2] , $data[3] ,$data[4] ,$data[5], $data[6]) ;
        }

        echo "<script>location.href = '../../view/product/listar_prod.php' </script>" ;

    }
?>  