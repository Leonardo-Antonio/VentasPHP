
$(function(){

    $('#btn_search').click(function(e) { 

        var valor = $('#txt_valor').val();

        if(valor != ''){

            $.post('../../controller/product/searchProd_ctl.php', {
                txt_valor : valor
            },
            function (rspt) {
                $('#resultado').html(rspt);
            }
            );   
        }else{
            alert('sd');
            $('#resultado').html('');
        }
    });

    let datos = [
        { nombre : 'Leonardo' , edad : 18 , distrito : 'Comas' } ,
        { nombre : 'Antonio'  , edad : 19 , distrito : 'Lima ' } ,
        { nombre : 'Renato'   , edad : 21 , distrito : 'Lima'  } ,
        { nombre : 'Fernando' , edad : 18 , distrito : 'Comas' } 
    ]

    RenderJson(datos)

    $('#btn_add').click(function (e) { 
        e.preventDefault();
        
        const nom = $('#txt_nom').val()
        const edad = $('#txt_edad').val()
        const dis = $('#txt_dis').val()

        if(nom != '' && edad != '' && dis != '' ){
            datos.push({
                nombre : nom , edad : edad , distrito : dis
            })
            RenderJson(datos)
            
            $('#txt_nom').val('')
            $('#txt_edad').val('')
            $('#txt_dis').val('')

        }else{
            alert("llene todos los datos")
        }

    });

    function RenderJson(datos){
        const json_rnd = JSON.parse(JSON.stringify(datos));

        let content =   `
                        <div class='container'>
                            <table class='table'>
                                <thead class="thead-dark">
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Distrito</th>
                                </thead>
                        `
        for(let i = 0 ; i < json_rnd.length ; i++){
            content += `
                        <tr>
                            <td>${json_rnd[i].nombre}</td>
                            <td>${json_rnd[i].edad}</td>
                            <td>${json_rnd[i].distrito}</td>
                        </tr>
                        `
        }
        content += `
                    </table>            
                    </div>
                    `
        $('#renderJson').html(content)
    }   

    //event change of select => info2

    $('#cb_provincia').change(function (e) { 
        e.preventDefault()
        let valor = $(this).val()
        if(valor != ''){
            
            $.ajax({
                type: "post",
                url: "../../controller/product/show_dis.php",
                data: {valor : valor},
                dataType: "json",
                success: function (resp) {

                    let respons = JSON.parse(JSON.stringify(resp))

                    $('#cb_distrito').empty();
                    $('#cb_distrito').append("<option value=''>Selecione distrito</option>");

                    for(item in respons){
                        $('#cb_distrito').append(new Option(respons[item].nombre))
                    }

                }

            });
        }else{
            $('#cb_distrito').empty().append("<option value=''>Selecione distrito</option>");
        }
    });

    //event focus out  => product_query

    $('#txt_Vid').focusout(function (e) { 
        e.preventDefault();
        let valor = $(this).val()

        if(valor != ''){

            $.ajax({
                type: "post",
                url: "../../controller/product/product_query.php",
                data: {valor : valor},
                success: function (resp) {

                    let response = JSON.parse(resp)

                    
                    if(response.data['state']){

                        Swal.fire({
                            icon  : 'warning' ,
                            title : `El código ${valor} no existe  `,
                            text  : ' No se encontro infomación ' ,
                            confirmButtonColor: '#3085d6' ,
                            confirmButtonText: ' <i class="fas fa-exclamation"></i> Buscar' ,
                        })

                        $('#txt_Vid').val('')
                        $('#txt_Vid').focus()

                    }else{

                        $('#lbl_nom').text(response.data[0].prod_nombre);
                        $('#lbl_med').text(response.data[0].medida);
                        $('#lbl_stk').text(response.data[0].prod_stock);
                        $('#lbl_per').text(response.data[0].perecible);
                        $('#lbl_cst').text(response.data[0].prod_costo);
                        $('#lbl_prs').text(response.data[0].pres_nombre);
                    }
                }
            });

        }
    });

});


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
            Swal.fire({
                icon  : 'success' ,
                title : ' Eliminado ' ,
                text  : ' Dale a ok para poder continuar ' ,
                showCancelButton: false ,
                confirmButtonColor: '#3085d6' ,
                confirmButtonText: ' <i class="fas fa-check"></i> Seguro' ,
                allowOutsideClick : false ,
                allowEscapeKey : false 
            }).then((resp)=>{
                if(resp.value){
                    location.href = '../../controller/product/deleteProd.php?id='+id 
                }
            })
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
            Swal.fire({
                icon  : 'success' ,
                title : ' Eliminado ' ,
                text  : ' Dale a ok para poder continuar ' ,
                showCancelButton: false ,
                confirmButtonColor: '#3085d6' ,
                confirmButtonText: ' <i class="fas fa-check"></i> Seguro' ,
                allowOutsideClick : false ,
                allowEscapeKey : false 
            }).then((resp)=>{
                if(resp.value){
                    location.href = '../../controller/client/deleteClient.php?cod='+cod 
                }
            })
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

