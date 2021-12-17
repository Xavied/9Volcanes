$(document).ready(function() {

    // ----------F AÑADIR NUEVO EMPRENDIMIENTO----------
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
            error: function(data) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Algo salio mal :(',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                })
            },
        });
    }
    // ---------- AÑADIR NUEVA EMPRENDIMIENTO----------
    $('#formStoreEmprendimiento').on('submit', function(event) {
        event.preventDefault();
        let ruta = "/emprends/store";
        let formulario = this;
        nuevo(ruta, formulario);
    });

    //----------- F Poblar el modal update EMPRENDIMIENTO---------
    function poblarEmprendimiento(ruta,formulario){
        let form = formulario;
        let formData = new FormData(form);
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: ruta + "/" + formData.get('idPoblarEmprendimiento'),
            type:"GET",
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                myObj = JSON.parse(response);
                $( "#idEditarEmprendimiento" ).val(myObj.id);  
                $( "#editarNombre" ).val(myObj.nombre);  
                $( "#editarDescripcion" ).val(myObj.descripcion);                  
            },
            error: function(data) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Algo salio mal :(',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                })
            },
        });
    }
    //----------- OBTENER INFORMACION DEL EMPRENDIMIENTO---------
    $("form[name='formPoblarEmprendimiento']").on('submit',function(event){
        event.preventDefault();
        let ruta = "/empreds/getEmprendimiento";
        let formulario = this;
        poblarEmprendimiento(ruta,formulario);
    });

    //---------- F ACTUALIZAR EMPRENDIMIENTO -----------
    function editar(ruta,formulario){
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
                    text: 'Algo no salio bien >:c',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            },
        });
    }
    // ---------- EDITAR EMPRENDIMIENTO----------
    $("#formEditEmprendimiento").on('submit',function(event){
        event.preventDefault();
        let ruta = "/emprends/update";
        let formulario = this;
        editar(ruta,formulario);
    });

    //----------F ELIMINAR EMPRENDIMIENTO --------------

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
            error: function(data) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Algo salio mal :(',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                })
            },
        });
    }
    // ---------- ELIMINAR CATEGORIA----------
    $("form[name='formDestroyEmprendimiento']").on('submit', function(event) {
        event.preventDefault();
        let ruta = "/emprends/delete";
        let formulario = this;
        Swal.fire({
            title: '¿Está seguro de que quiere eliminar esta categoria?',
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