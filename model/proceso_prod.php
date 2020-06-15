<?php

    require_once "conexion.php" ;

    class ProcesoProducto {
        
        public function listarProd(){
            $filas = null ; 
            $model = new Connection() ;
            $rsta = $model->conectar() ; 
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

            $model = new Connection() ;
            $rspt = $model->conectar() ;
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
            $model = new Connection() ;
            $rsta = $model->conectar() ; 
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

            $model = new Connection() ;

            $connect = $model->conectar() ;

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
            $model = new Connection() ;
            $rsta = $model->conectar() ; 
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

            $model = new Connection() ;

            $rspt = $model->conectar() ; 

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

        //search product 

        public function searchProdporValor($valor){

            $filas = null ; 

            $model = new Connection() ;
            $rsta = $model->conectar() ; 

            $valor = $valor."%" ;
            $sql = "SELECT * FROM tb_producto where prod_nombre like :valor" ; 

            $query = $rsta->prepare($sql) ;
            $query->bindParam( ':valor' , $valor , PDO::PARAM_STR , 50 );
            $query->execute() ; 

            $num_row = $query->rowCount() ;

            if($num_row == 0){
                echo "no" ;
            }
            else{
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
                echo "</table>" ;
                echo "</div>" ;
            }

            $rsta = null ;
            
        }

        public function productQuery($id){

            $filas = null ; 
            $model = new Connection() ;
            $rsta = $model->conectar() ;    
            
            $sql = "" ;
            $sql.= "select prod_id , prod_nombre , prod_stock , prod_costo , pres_nombre , ";
            $sql.= "case when prod_medida = 'L' then 'Litro' ";           
            $sql.= "when prod_medida = 'K' then 'kilo' ";           
            $sql.= "when prod_medida = 'U' then 'Unidad' ";           
            $sql.= "end as 'medida', ";           
            $sql.= "case when prod_perecible = 1 then 'Perecible' ";           
            $sql.= "when prod_perecible = 0 then 'No perecible' ";           
            $sql.= "end as 'perecible' ";           
            $sql.= "from tb_producto tb_pd ";           
            $sql.= "left join tb_presentacion tb_prs ";           
            $sql.= "on (tb_pd.prod_pres_id = tb_prs.pres_id) ";           
            $sql.= "where prod_id = :id ";           

            $query = $rsta->prepare($sql) ;

            $query->bindParam(':id' , $id) ;

            $query->execute() ; 

            $num_row = $query->rowCount();

            if($num_row != 0){

                while($filas = $query->fetch(PDO::FETCH_ASSOC)){
                    $data['data'][] = $filas ; 
                }

            }else{

                $data['data']['state'] = "nada" ;
            }
            

            $rsta = null ;
            echo json_encode($data , JSON_FORCE_OBJECT);
        }

    }
?>