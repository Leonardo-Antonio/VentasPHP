<?php

    if(isset($_POST['valor'])){

        $valor = $_POST['valor'] ; 
        
        $data = null ; 

        switch($valor){
            case 'Barranca' :
                $data = [
                    ['nombre' => 'Barranca' ] ,
                    ['nombre' => 'Paramonga'] ,
                    ['nombre' => 'Supe'     ] 
                ];
                break ;
            case 'Lima' : 
                $data = [
                    ['nombre' => 'Lima'      ] ,
                    ['nombre' => 'Calloa'    ] ,
                    ['nombre' => 'chorrillos'] 
                ];
                break;
            case 'Huaral' :
                $data = [
                    ['nombre' => 'Chancay'  ] ,
                    ['nombre' => 'Ihuarí'   ],
                    ['nombre' => 'Sumbilca' ] 
                ];
                break;
        }

        echo json_encode($data);
        
    }
    
?>