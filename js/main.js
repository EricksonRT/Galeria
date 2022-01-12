$(document).ready(function() {

    // Funcion de añadir imagen
    $('#btn_foto').click(function() {
        var formData = new FormData($("#formImagen")[0]);
        $.ajax({
            type: 'POST',
            url: './php/subir_img.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (e) => {
                Swal.fire(
                    'Listo!',
                    'La imagen ha sido añadida con exito!'
                ).then(() => {
                    $("#sec_fotos").load(" #sec_fotos");

                }).catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups',
                        text: 'Algo no salió como esperabamos',
                        footer: 'Intente nuevamente'
                    })
                });

            }
        });
    });
});


// Funcion para eliminar imagenes
function eliminar(id) {
    var img_id = id;
    Swal.fire({
        title: 'Esta seguro que desea eliminar la imagen?',
        text: "El borrado es permanente y deberá subirla de nuevo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
            // espera una respuesta
    }).then((result) => {
        if (result.isConfirmed) {
            // Si es confirmado se ejecuta la consulta ajax
            $.ajax({
                type: 'POST',
                url: "./php/eliminar.php",
                data: 'img_id=' + img_id,
                cache: false,
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups',
                        text: 'Algo no salió como esperabamos',
                        footer: 'Intente nuevamente'
                    })
                },
                success: (e) => {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Imagen eliminada!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#sec_fotos').load(' #sec_fotos');
                }

            });
        }
    })
}

// Funcion para calcular el maximo de ch del textarea, donde se compara el maximo de la variable maxlenght en el input
function maxlengthNumber(obj) {

    if (obj.value.length > obj.maxLength) {

        obj.value = obj.value.slice(0, obj.maxLength);

    }

}

// Galery box
$(document).ready(function() {
    $('.zoom').lightBox({
        overlayBgColor: '#FFF',
        overlayOpacity: 0.8,
        containerResizeSpeed: 350,
        txtImage: 'Imagen',
        txtOf: 'de'
    });
});
// function cambiarFile() {
//     const input = document.getElementById('formFile[]');
//     if (input.files && input.files[0])
//         console.log("File Seleccionado : ", input.files[0]);