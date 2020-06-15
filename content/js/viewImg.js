$(function(){
    $("#img").change(function (event) { 
        mostrarImg(this)
    });
});

function mostrarImg(img){
    if( img.files && img.files[0] ){
        let file_read = new FileReader();
        file_read.onload = function (event) { 
            document.getElementById("img_previa").src = event.target.result ; 
        }

        file_read.readAsDataURL(img.files[0]) ;

    }
}