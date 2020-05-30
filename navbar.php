<nav class="d-flex justify-content-between navbar navbar-light bg-dark mb-3">
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
            }

            if(urlAct.href.split('/')[4].indexOf("editClient.php") === 0){
                idLocation.innerHTML += 'Editar Cliente'
            }
            else if(urlAct.href.split('/')[4].indexOf("edit_prod.php") === 0){
                idLocation.innerHTML += 'Editar Producto'
            }

        </script>
    </a>
    <div>
        <a class="navbar-brand text-white" href="listar_prod.php">Productos</a>
        <a class="navbar-brand text-white" href="list_client.php">Clientes</a>
    </div>
</nav>