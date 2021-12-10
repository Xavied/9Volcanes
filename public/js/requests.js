//const Swal = require('sweetalert2');

$( document ).ready(function() {
    
    
    function nuevo(ruta,formulario){
        let form = formulario;
        let formData = new FormData(form);
        console.log(form);
        $.each($("input[type='file']")[0].files, function(i, file) {
            formData.append('imagen_' + i, file);
            console.log(file);
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: ruta,
            type:"POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success:function(response){
                Swal.fire({
                    title: '¡Exito!',
                    text: response.success,
                    icon: 'success',
                    allowOutsideClick: false,
                  }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {location.reload();
                      //Swal.fire('Saved!', '', 'success')
                    } else if (result.isDenied) {
                      Swal.fire('Changes are not saved', '', 'info')
                    }
                  })                
            },
            error :function( data ) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
            },
        });
    }
    // ---------- AÑADIR NUEVO PRODUCTO----------
    $('#formStoreProducto').on('submit',function(event){
        event.preventDefault();
        let ruta = "/prods/store";
        let formulario = this;
        nuevo(ruta,formulario);
    });

    function eliminar(ruta,formulario){
        let form = formulario;
        let formData = new FormData(form);        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: ruta,
            type:"POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success:function(response){
                Swal.fire({
                    title: '¡Exito!',
                    text: response.success,
                    icon: 'success',
                    allowOutsideClick: false,
                  }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {location.reload();
                      //Swal.fire('Saved!', '', 'success')
                    } else if (result.isDenied) {
                      Swal.fire('Changes are not saved', '', 'info')
                    }
                  })                
            },
            error :function( data ) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
            },
        });
    }
    // ---------- ELIMINAR PRODUCTO----------
    $('#formDestroyProducto').on('submit',function(event){
        event.preventDefault();
        let ruta = "/prods/delete";
        let formulario = this;
        Swal.fire({
            title: '¿Está seguro de que quiere eliminar este producto?',
            text: "No podrá revertir esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar'
          }).then((result) => {
            if (result.isConfirmed) {
                eliminar(ruta, formulario);
            }
          })
    });
});