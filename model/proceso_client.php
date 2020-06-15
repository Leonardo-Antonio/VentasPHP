<?php

    require_once "conexion.php" ; 

    class ProcesoClient {
        
        public function listClient(){

            $model = new Connection ;
            
            $connect = $model->conectar();

            $filas = null ;

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

            $model = new Connection ;
            
            $connect = $model->conectar();
            
            $filas = null ;

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

            $model = new Connection ;
            
            $connect = $model->conectar();

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

            $model = new Connection ;
            
            $connect = $model->conectar();

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

            $model = new Connection ;
            
            $connect = $model->conectar();

            $filas = null ;

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

            $model = new Connection ;
            
            $connect = $model->conectar();
            
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

        //imagenes

        public function listImg(){

            $model = new Connection() ;
            $rsta = $model->conectar() ; 
            $filas = null ; 

            $sql = "SELECT * FROM tb_img " ; 

            $query = $rsta->prepare($sql) ;
            $query->execute() ; 

            echo "<div class='container' style='width : 450px'>" ;
            echo "<hr/>";
            echo "<div class='row text-center'>";
            

            while($filas = $query->fetch(PDO::FETCH_ASSOC)){

                $img = $filas['img_img'];
                
                if(empty($img)){
                    $img = 'img/img_default.png' ;
                }else{
                    $img = 'data:image/jpg;base64,'.base64_encode($img) ;
                }

                echo "<div class='col-sm-6 col-lg-4 mb-4'>" ;
                echo "<figure class='block-4-image' >" ;
                echo "<img src='".$img."' class='img-fluid' style='width : 100px ; height=120px' />" ;
                echo "</figure>" ;
                echo "<div class='block-4-text p-4' >" ;
                echo "<h5>".$filas['img_nombre']."</h5>" ;
                echo "</div></div>" ;
            }

            $rsta = null ;
            echo "</div></div>" ;
        }

        public function registerImg($data){
            $model = new Connection() ;
            $connect = $model->conectar() ;

            $sql = "INSERT INTO tb_img VALUES 
                        ( null , :img_nom , :img_img)" ;

            $query = $connect->prepare($sql) ;

            $query->bindParam( ':img_nom' , $data['img_nom'] , PDO::PARAM_STR , 50 ) ;
            $query->bindParam( ':img_img' , $data['img_img'] , PDO::PARAM_LOB ) ;

            if(!$query){
                echo "no se pudo insetar los datos" ;
            }else{
                $query->execute() ;
            }
            $connect = null ;   
        }

    }

?>