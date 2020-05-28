<?php
    class Connection{

        public function conectar(){

            $usuario  = 'leonardo' ;
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
        
        public function listarProd(){
            $filas = null ; 
            $rsta = $this->conectar() ; 
            $sql = "SELECT * FROM tb_producto " ; 
            $query = $rsta->prepare($sql) ;
            $query->execute() ; 

            echo "<div class='container' style='width : 450px'>" ;
            echo "<table align='center' class='table table-sm'>" ;
            echo "<tr class='thead-dark ' >" ;
            echo    "
                    <th>N</th>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Stock</th>
                    <th class='text-center'>Acciones</th>
                    " ;
            echo "</tr>" ;
            
            $i = 1 ;

            while($filas = $query->fetch(PDO::FETCH_ASSOC)){
                echo    "<tr>".
                        "<td>".$i."</td>".
                        "<td>".$filas["prod_id"]."</td>".
                        "<td>".$filas["prod_nombre"]."</td>".
                        "<td>".$filas["prod_stock"]."</td>".
                        "<td align='center'>"
                            ."<a class='text-success' href='edit_prod.php?id=".$filas["prod_id"]."'><i class='fas fa-edit'></i>  </a>"
                            ."<a class='text-danger ' href=javascript:deleteProd('".$filas["prod_id"]."')><i class='fas fa-trash-alt'></i></a>".
                        "</td>".
                        "</tr>" ;
                $i++;
            }

            $rsta = null ;
            echo "</table>" ;
            echo "</div>";
        }

        public function registrarProd($id , $nom , $med , $stk , $prc , $cst , $pres){

            $rspt = $this->conectar() ; 
            $sql = "INSERT INTO tb_producto values (:id , :nom , :med , :stk , :prc , :cst , :pres) " ;

            $query = $rspt->prepare($sql) ;

            $query->bindParam(':id'  , $id)  ;
            $query->bindParam(':nom' , $nom) ;
            $query->bindParam(':med' , $med) ;
            $query->bindParam(':stk' , $stk) ;
            $query->bindParam(':prc' , $prc) ;
            $query->bindParam(':cst' , $cst) ;
            $query->bindParam(':pres', $pres);

            if(!$query){
                echo "No es posible registrar la sentencia" ;
            }else{
                $query->execute() ;
            }

            $rspt = null ;

        }

        public function listarPresentacion(){

            $filas = null ; 
            $rsta = $this->conectar() ; 
            $sql = "SELECT * FROM tb_presentacion " ; 
            $query = $rsta->prepare($sql) ;
            $query->execute() ; 
            
            while($filas = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $filas ; 
            }

            $rsta = null ;
            return $data ;
        }

        public function updateProd($id , $nom , $med , $stk , $prc , $cst , $pres){

            $connect = $this->conectar() ;

            $sql = "UPDATE tb_producto SET 
                        prod_nombre = :nom ,
                        prod_medida = :med ,
                        prod_stock  = :stk ,
                        prod_perecible = :prc ,
                        prod_costo = :cst ,
                        prod_pres_id = :pres WHERE prod_id = :id " ;

            $query = $connect->prepare($sql) ;

            $query->bindParam(':nom' , $nom ) ;
            $query->bindParam(':med' , $med ) ;
            $query->bindParam(':stk' , $stk ) ;
            $query->bindParam(':prc' , $prc ) ;
            $query->bindParam(':cst' , $cst ) ;
            $query->bindParam(':pres', $pres) ;
            $query->bindParam(':id'  , $id  ) ;

            if(!$query){
                echo "No es posible actualizar el producto" ;
            }else{
                $query->execute() ;
            }

            $connect = null ;
 
        }

        public function searchProd($id){

            $filas = null ; 
            $rsta = $this->conectar() ; 
            $sql = "SELECT * FROM tb_producto WHERE prod_id = :id " ; 
            $query = $rsta->prepare($sql) ;

            $query->bindParam(':id' , $id) ;

            $query->execute() ; 

            
            while($filas = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $filas ; 
            }

            $rsta = null ;
            return $data ;
        }

        public function deleteProd($id){

            $rspt = $this->conectar() ; 

            $sql=" DELETE FROM tb_producto WHERE prod_id = :id " ;

            $query = $rspt->prepare($sql) ;

            $query->bindParam(':id'  , $id)  ;

            if(!$query){
                echo "No es posible registrar la sentencia" ;
            }else{
                $query->execute() ;
            }

            $rspt = null ;

        }

        //cliente

        public function listClient(){

            $filas = null ;

            $connect = $this->conectar();

            $sql = "SELECT  concat(nom_cliente , ' ' , ape_cliente) AS client ,
                            cod_cliente as cod,
                            nom_distrito , direccion , telefono 
                    FROM tb_cliente tb_c
                    LEFT JOIN  tb_distrito td_d
                    ON (tb_c.cod_distrito = td_d.cod_distrito);" ;
            
            $query = $connect->prepare($sql) ;
            $query->execute();

            while($filas = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $filas ; 
            }

            $connect = null ;
            return $data ;

        }

        public function listdistrict(){

            $filas = null ;

            $connect = $this->conectar();

            $sql = "SELECT * FROM tb_distrito" ;

            $query = $connect->prepare($sql) ;
            $query->execute() ;

            while($filas = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $filas ; 
            }

            $connect = null ;
            return $data ;


        }

        public function registerClient($data){

            $connect = $this->conectar() ;
            $sql = "INSERT INTO tb_cliente VALUES 
                        (:cod , :nom , :ape , :sexo ,
                         :dni , :dir , :tel , :codDis)" ;

            $query = $connect->prepare($sql) ;

            $query->bindParam( ':cod'    , $data['cod'] ) ;
            $query->bindParam( ':nom'    , $data['nom'] ) ;
            $query->bindParam( ':ape'    , $data['ape'] ) ;
            $query->bindParam( ':sexo'   , $data['sexo']) ;
            $query->bindParam( ':dni'    , $data['dni'] ) ;
            $query->bindParam( ':dir'    , $data['dir'] ) ;
            $query->bindParam( ':tel'    , $data['tel'] ) ;
            $query->bindParam( ':codDis' , $data['dis'] ) ;

            if(!$query){
                echo "no se pudo insetar los datos" ;
            }else{
                $query->execute() ;
            }
            $connect = null ;   
        }

        public function deleteClient($cod){

            $connect = $this->conectar() ;
            $sql="DELETE FROM tb_cliente WHERE cod_cliente = :cod " ;

            $query = $connect->prepare($sql) ;
            
            $query->bindParam( ':cod' , $cod ) ;

            if(!$query) {
                echo "no se pudo eliminar" ;
            }else{
                $query->execute() ;
            }

            $connect = null ;

        }

        public function searchClient($cod){

            $filas = null ;
            $connect = $this->conectar() ;
            $sql = "SELECT * FROM tb_cliente WHERE cod_cliente = :cod " ;

            $query = $connect->prepare($sql) ;

            $query->bindParam( ':cod' , $cod ) ;

            $query->execute() ;

            while($filas = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $filas ; 
            }

            $connect = null ;
            return $data ;

        }

        public function updateClient($data){

            $connect = $this->conectar() ;
            $sql = "UPDATE tb_cliente SET
                            nom_cliente = :nom ,
                            ape_cliente = :ape ,
                            sexo_cliente= :sexo ,
                            dni_cliente = :dni ,
                            direccion   = :dir ,
                            telefono    = :tel ,
                            cod_distrito= :dis
                    WHERE cod_cliente =  :cod " ;

            $query = $connect->prepare($sql) ; 
            
            $query->bindParam( ':nom' , $data['nom'] ) ;
            $query->bindParam( ':ape' , $data['ape'] ) ;
            $query->bindParam( ':sexo', $data['sexo']) ;
            $query->bindParam( ':dni' , $data['dni'] ) ;
            $query->bindParam( ':dir' , $data['dir'] ) ;
            $query->bindParam( ':tel' , $data['tel'] ) ;
            $query->bindParam( ':dis' , $data['dis'] ) ;
            $query->bindParam( ':cod' , $data['cod'] ) ;

            if(!$query){
                echo "No se pudo actualizar" ;
            }else{
                $query->execute() ;
            }

            $connect = null ;

        }

    }
?>