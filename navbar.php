<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-3">
    <a id="titleLocation" class="text-white navbar-brand" href="list_client.php">
        <i class="h4 fas fa-cart-plus"></i>

        <script>
            
            const urlAct = window.location
            const idLocation = document.getElementById('titleLocation')
                        
            switch (urlAct.href.split('/')[4]) {

                case 'listar_prod.php' :
                    idLocation.innerHTML += 'Lista de Productos'
                    break;
                            
                case 'list_client.php' :
                    idLocation.innerHTML += 'Lista de Clientes'
                    break;

                case 'register_client.php' :
                    idLocation.innerHTML += 'Registrar nuevo cliente'
                    break;
                            
                case 'registrar_prod.php' :
                    idLocation.innerHTML += 'Registrar nuevo producto'
                    break;

                case '' :
                    idLocation.innerHTML += 'Inicio'
                    break;
            }

            if(urlAct.href.split('/')[4].indexOf("editClient.php") === 0){
                idLocation.innerHTML += 'Editar Cliente'
            }
            else if(urlAct.href.split('/')[4].indexOf("edit_prod.php") === 0){
                idLocation.innerHTML += 'Editar Producto'
            }


        </script>

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
                    <a class="navbar-brand text-white" href="listar_prod.php">Productos</a>
                </li>

                
                <li class="nav-item">
                    <a class="navbar-brand text-white" href="list_client.php">Clientes</a>
                </li>

            </ul>
        </form>
    </div>
</nav>