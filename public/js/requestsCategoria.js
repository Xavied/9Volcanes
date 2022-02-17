$(document).ready(function() {

    // ---------- AÑADIR NUEVA CATEGORIA----------
    function nuevo(ruta, formulario) {
        let form = formulario;
        let formData = new FormData(form);
        console.log(form);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: ruta,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                Swal.fire({
                    title: '¡Exito!',
                    text: response.success,
                    icon: 'success',
                    allowOutsideClick: false,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        location.reload();
                        //Swal.fire('Saved!', '', 'success')
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            },
            error: function(response) {
                var name = $('#nuevoNombre').val();
                var mensaje = "";
                if (name === "") {
                    mensaje = 'Ingresa un nombre para la categoria'
                } else if (name.length > 45) {
                    mensaje = 'El nombre de la categoria es demasiado largo'
                } else {
                    mensaje = 'El nombre de la categoria ya existe'
                }

                Swal.fire({
                    title: 'Error!',
                    text: mensaje,
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                })
            },
        });
    }
    // ---------- AÑADIR NUEVA CATEGORIA----------
    $('#formStoreCategoria').on('submit', function(event) {
        event.preventDefault();
        let ruta = "admin/categoria/store";
        let formulario = this;
        nuevo(ruta, formulario);
    });

    // ---------- Actualizar Categoria --------
    function actualizar(ruta, formulario) {
        let form = formulario;
        let formData = new FormData(form);
        console.log(formData);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: ruta,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                Swal.fire({
                    title: '¡Exito!',
                    text: response.success,
                    icon: 'success',
                    allowOutsideClick: false,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        location.reload();
                        //Swal.fire('Saved!', '', 'success')
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            },
            error: function() {
                var name = $('#editarNombre').val();
                var mensaje = "";
                if (name === "") {
                    mensaje = 'Ingresa un nombre para la categoria'
                } else if (name.length > 45) {
                    mensaje = 'El nombre de la categoria es demasiado largo'
                } else {
                    mensaje = 'El nombre de la categoria ya existe'
                }

                Swal.fire({
                    title: 'Error!',
                    text: mensaje,
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                })
            },
        });
    }
    // ---------- Actualizar CATEGORIA----------
    $('#formUpdateCategoria').on('submit', function(event) {
        event.preventDefault();
        let ruta = "admin/categoria/update";
        let formulario = this;
        actualizar(ruta, formulario);
    });


    // ---------- ELIMINAR CATEGORIA----------
    function eliminar(ruta, formulario) {
        let form = formulario;
        let formData = new FormData(form);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: ruta,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                Swal.fire({
                    title: '¡Exito!',
                    text: response.success,
                    icon: 'success',
                    allowOutsideClick: false,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        location.reload();
                        //Swal.fire('Saved!', '', 'success')
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            },
            error: function(data) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
            },
        });
    }
    // ---------- ELIMINAR CATEGORIA----------
    $("form[name='formDestroyCategoria']").on('submit', function(event) {
        event.preventDefault();
        let ruta = "admin/categoria/delete";
        let formulario = this;
        Swal.fire({
            title: '¿Está seguro de que quiere eliminar esta categoria?',
            text: "No podrá revertir esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                eliminar(ruta, formulario);
            }
        })
    });

    //Cambiar booleano binaro a turefalse
    function cambiarBooleano(booleano) {
        return (booleano == 1) ? true : false;
    }

    //Poblar modal CATEGORIA
    function poblarCategoria(ruta, formulario) {
        let form = formulario;
        let formData = new FormData(form);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: ruta + "/" + formData.get('idPoblarCategoria'),
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                myObj = JSON.parse(response);
                $("#idEditarCategoria").val(myObj.id);
                $("#editarNombre").val(myObj.nombre);
                $("#editarVisible").prop('checked', cambiarBooleano(myObj.visible));

            },
            error: function(data) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Algo salió mal :(',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            },
        });
    }
    // ---------- OBTENER INFORMACIÓN CATEGORIA----------
    $("form[name='formPoblarCategoria']").on('submit', function(event) {
        event.preventDefault();
        let ruta = "admin/categoria/getCategoria";
        let formulario = this;
        poblarCategoria(ruta, formulario);
    });
});