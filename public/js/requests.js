$( document ).ready(function() {
    
    // función para errores
    function error(data, formData){
        if( data.status === 422 ) {
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                if($.isPlainObject(value)) {
                    $.each(value, function (key, value2) {
                        $('#error-'+key).empty();
                        $('#'+key).removeClass("is-invalid");
                        $('#error-'+key).append(value2);
                        $('#'+key).addClass("is-invalid");
                    });
                }
            });
        }        
    }

    function limpiarForm(formData) {
        for (let pair of formData.entries()) {
            $('#error-'+pair[0]).empty();
            if ($('#'+pair[0]).is('.is-invalid')){
                $('#'+pair[0]).toggleClass("is-invalid");
            }
        }
    }
    
    function nuevoConMultiplesArchivos(ruta,formulario){
        let form = formulario;
        let formData = new FormData(form);
        $.each($("input[type='file']")[0].files, function(i, file) {
            formData.append('imagen_' + i, file);
        });
        limpiarForm(formData);
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
                // Swal.fire({
                //     title: 'Error!',
                //     text: '¿Desea continuar?',
                //     icon: 'error',
                //     confirmButtonText: 'Cool'
                // })
                error(data, formData);
            },
        });
    }
    // ---------- AÑADIR NUEVO PRODUCTO----------
    $('#formStoreProducto').on('submit',function(event){
        event.preventDefault();
        let ruta = "/prods/store";
        let formulario = this;
        nuevoConMultiplesArchivos(ruta,formulario);
    });

    function seleccionarElemento(elemento, valor){
        Array.from(elemento).forEach(function(option_element) {
            let option_value = option_element.value;
            if(option_value == valor){
                option_element.selected = true;
                return true;
            }
        })
        return false;  
    }

    //Cambiar booleano binaro a turefalse
    function cambiarBooleano(booleano){
        return (booleano == 1)?true:false;
    }

    //Poblar modal Producto
    function poblarProducto(ruta,formulario){
        let form = formulario;
        let formData = new FormData(form);
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: ruta + "/" + formData.get('idPoblarProducto'),
            type:"GET",
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                myObj = JSON.parse(response);
                $( "#idEditarProducto" ).val(myObj.id);  
                $( "#editarNombre" ).val(myObj.nombre);  
                $( "#editarDescripcion" ).val(myObj.descripcion);                  
                $( "#editarPrecio" ).val(myObj.precio);                  
                $( "#editarCantidad" ).val(myObj.cantidad);
                let seleccionarCategoria = document.getElementById('editarCategoria_id');
                seleccionarElemento(seleccionarCategoria, myObj.categoria_id);
                let seleccionarMarca = document.getElementById('editarMarca_id');
                seleccionarElemento(seleccionarMarca, myObj.marca_id);                
                $( "#editarVisible" ).prop('checked', cambiarBooleano(myObj.visible));
                              
            },
            error :function( data ) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Algo salió mal :(',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            },
        });
    }
    // ---------- OBTENER INFORMACIÓN PRODUCTO----------
    $("form[name='formPoblarProducto']").on('submit',function(event){
        event.preventDefault();
        let ruta = "/prods/getProducto";
        let formulario = this;
        poblarProducto(ruta,formulario);
    });

    //EDITAR PRODUCTO
    function editar(ruta,formulario){
        let form = formulario;
        let formData = new FormData(form);
        limpiarForm(formData);
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
                // Swal.fire({
                //     title: 'Error!',
                //     text: 'Do you want to continue',
                //     icon: 'error',
                //     confirmButtonText: 'Cool'
                // })
                error(data, formData);
            },
        });
    }
    // ---------- EDITAR PRODUCTO----------
    $('#formEditProducto').on('submit',function(event){
        event.preventDefault();
        let ruta = "/prods/update";
        let formulario = this;
        editar(ruta,formulario);
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
    $("form[name='formDestroyProducto']").on('submit',function(event){
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
    // ---------- ELIMINAR IMAGEN----------
    $("form[name='formDestroyImagen']").on('submit',function(event){
        event.preventDefault();
        let ruta = "/prods/eliminarImagen";
        let formulario = this;
        Swal.fire({
            title: '¿Está seguro de que quiere eliminar esta imagen?',
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

    // ---------- AÑADIR IMAGEN----------
    $('#formStoreImagenes').on('submit',function(event){
        event.preventDefault();
        let ruta = "/prods/agregarImagenes";
        let formulario = this;
        nuevoConMultiplesArchivos(ruta,formulario);
    });
});