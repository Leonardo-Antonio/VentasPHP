function deleteProd(id){
    let confirmar = confirm("¿Seguro que desea eliminar?")
    
    confirmar ? location.href = "deleteProd.php?id="+id : console.log('no se elimino el producto')

}

function deleteClient(cod){
    let confirmar = confirm("¿Seguro que desea eliminar?")
    
    confirmar ? location.href = "deleteClient.php?cod="+cod : console.log('no se elimino el producto')

}