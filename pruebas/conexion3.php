<?php
    class Connection{

        public function conectar(){

            $usuario  = 'leonardo' ;
            $pass     = 'chester' ;

            try {
                $connect = new PDO('mysql:host=localhost;dbname=bd_ventas', $usuario, $pass);
                $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ) ;
                return $connect ;
            } catch (PDOException $err) {
                echo "Se encontro un error : ".$err->getMessage() ;
            }
        }
        
        public function listarProductos(){
            $filas = null ; 
            $rsta = $this->conectar() ; 
            $sql = "SELECT * FROM tb_producto " ; 
            $query = $rsta->prepare($sql) ;
            $query->execute() ; 

            echo "<table align='center'>" ;
            echo "<tr>" ;
            echo    "
                    <th>N</th>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Stock</th>
                    " ;
            echo "</tr>" ;
            
            
            $i = 1 ;

            while($filas = $query->fetch(PDO::FETCH_ASSOC)){
                echo    "<tr>".
                        "<td>".$i."</td>".
                        "<td>".$filas["prod_id"]."</td>".
                        "<td>".$filas["prod_nombre"]."</td>".
                        "<td>".$filas["prod_stock"]."</td>".
                        "</tr>" ;
                $i++;
            }

            $rsta = null ;
            echo "</table>" ;
        }

    }

    $cn = new Connection() ; 
    $cn->listarProductos() ;

?>