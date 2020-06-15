<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-3">
    <a id="titleLocation" class="display-1 text-white navbar-brand">
        <i id="icono"></i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a id="urlListProd" class="navbar-brand text-white" href="../../view/product/listar_prod.php">Productos</a>
                </li>

                <li class="nav-item">
                    <a id="urlListClient" class="navbar-brand text-white" href="../../view/client/list_client.php">Clientes</a>
                </li>

            </ul>
        </form>
    </div>
</nav>

<script>
            
    const urlAct = window.location.href.split('/')
    const idLocation = document.getElementById('titleLocation')
    const icono = document.getElementById('icono')
    const urlListProd = document.querySelector('#urlListProd')
    const urlListClient = document.querySelector('#urlListClient')
        
    switch (urlAct[7]) {

        case 'listar_prod.php':
            icono.className = 'mr-3 fas fa-list'
            idLocation.innerHTML += 'List Product' 
            break;

        case 'list_client.php':
            icono.className = 'mr-3 fas fa-users '
            idLocation.innerHTML += 'List Client' 
            break;

        case 'register_client.php':
            icono.className = 'mr-3 fas fa-user-plus '
            idLocation.innerHTML += 'Register Client' 
            break;

        case 'list_img.php':
            icono.className = 'mr-3 far fa-id-badge'
            idLocation.innerHTML += 'Perfiles de clientes' 
            break;

        case 'listar_prod.php':
            icono.className = 'mr-3 fas fa-list'
            idLocation.innerHTML += 'List Product' 
            break;

        case 'show_info1.php':
            icono.className = 'mr-3 fas fa-info-circle'
            idLocation.innerHTML += 'Info 1' 
            break;

        case 'show_info2.php':
            icono.className = 'mr-3 fas fa-info-circle'
            idLocation.innerHTML += 'Info 2' 
            break;
         
        case 'query_prod.php':
            icono.className = 'mr-3 fas fa-info-circle'
            idLocation.innerHTML += 'Consultar Producto' 
            break;

        case 'search_prod.php':
            icono.className = 'mr-3 fas fa-search   '
            idLocation.innerHTML += 'Buscar Producto' 
            break;

        case 'registrar_prod.php':
            icono.className = 'mr-3 fas fa-cart-plus   '
            idLocation.innerHTML += 'Registrar Producto' 
            break;

        default : 
                
            if( urlAct[5] === '' ){
                urlListProd.setAttribute("href" , "view/product/listar_prod.php")
                urlListClient.setAttribute("href" , "view/client/list_client.php")
                icono.className = 'mr-3 fas fa-store '
                idLocation.innerHTML += 'Inicio'
            }
            else if( urlAct[7].indexOf('edit_prod.php') === 0 ){
                icono.className = 'mr-3 fas fa-edit '
                idLocation.innerHTML += 'Edit Product'
            }
            else if( urlAct[7].indexOf('editClient.php') === 0 ){
                icono.className = 'mr-3 fas fa-user-edit '
                idLocation.innerHTML += 'Edit Client'
            }
            break ;
                
    }

    console.log(urlAct)

</script>