<?php
    class Connection{

        public function conectar(){

            $usuario = 'leonardo' ;
            $pass = 'chester' ;

            try {
                $connect = new PDO('mysql:host=localhost;dbname=bd_ventas', $usuario, $pass);
                $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ) ;
                echo "Base de Datos Conectado..." ; 
            } catch (PDOException $err) {
                echo "Se encontro un error : ".$err->getMessage() ;
            }
        }
        
    }

    $cn = new Connection() ; 
    $rsp = $cn->conectar();

    if($rsp){
        echo "Connection" ;
    }
    















    /*  $user   = "Leonardo" ; 
     $pass   = "chester"  ;
     $server = "localhost";
     $bd     = "bd_ventas";
 
     //inicio de controlador de errores
 
      try {
         $connect = new PDO("mysql:host=$server ; dbname=$bd" , $user , $pass ) ;
         // Recomendado para gestionar los errores con PDOException
         $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ) ;
         echo "Base de Datos Conectado..." ; 
     } catch (PDOException $err) {
         echo "Se encontro un error : ".$err->getMessage() ;
     } */
    ?>