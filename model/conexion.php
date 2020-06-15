<?php
    class Connection{

        public function conectar(){

            $usuario  = 'leo' ;
            $pass     = 'chester' ;

            try {
                $connect = new PDO('mysql:host=localhost;dbname=bd_ventas', $usuario, $pass);
                $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ) ;
                //echo "<script>alert('dsdf')</script>" ;
                return $connect ;
            } catch (PDOException $err) {
                echo "Se encontro un error : ".$err->getMessage() ;
            }
        }

    }
?>