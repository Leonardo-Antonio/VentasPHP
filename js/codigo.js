function deleteProd(id){

    Swal.fire({
        icon  : 'question' ,
        title : ' ¿Seguro de eliminar? ' ,
        text  : ' No habrá vuelta atrás ' ,
        showCancelButton: true ,
        confirmButtonColor: '#3085d6' ,
        cancelButtonColor: '#d33' ,
        confirmButtonText: ' <i class="fas fa-trash-alt"></i> Seguro' ,
        cancelButtonText: ' <i class="far fa-times-circle"></i> Cancelar' ,
    })
    .then((res)=>{
        if(res.value){
            location.href = 'deleteProd.php?id='+id 
        }else{
            Swal.fire({
                title : '<h2 class="text-white" > <i class="far fa-times-circle"></i> Cancelado</h2>' ,
                position : 'bottom-end' ,
                showConfirmButton: false ,
                width : '300px' ,
                backdrop : false ,
                timer : 2000 ,
                background : '#C8533A' ,
                timerProgressBar : true
            })
        }
    })
}

function deleteClient(cod){
    
    Swal.fire({
        icon  : 'question' ,
        title : ' ¿Seguro de eliminar? ' ,
        text  : ' No habrá vuelta atrás ' ,
        showCancelButton: true ,
        confirmButtonColor: '#3085d6' ,
        cancelButtonColor: '#d33' ,
        confirmButtonText: ' <i class="fas fa-trash-alt"></i> Seguro' ,
        cancelButtonText: ' <i class="far fa-times-circle"></i> Cancelar' ,
    })
    .then((res)=>{
        if(res.value){
            location.href = 'deleteClient.php?cod='+cod 
        }else{
            Swal.fire({
                title : '<h2 class="text-white" > <i class="far fa-times-circle"></i> Cancelado</h2>' ,
                position : 'bottom-end' ,
                showConfirmButton: false ,
                width : '100%' ,
                backdrop : false ,
                timer : 2000 ,
                background : '#C8533A' ,
                timerProgressBar : true
            })
        }
    })

}