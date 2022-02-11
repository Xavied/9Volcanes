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
    function nuevo(ruta, formulario) {
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
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                if(response.info=='Todavía no hay susbcriptores :(')
                {
                    Swal.fire({
                        title: response.info,
                        icon: 'info',
                        allowOutsideClick: false,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload()
                            //Swal.fire('Saved!', '', 'success')
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    })
                }
                else
                {
                    Swal.fire({
                        title: '¡Exito!',
                        text: response.success,
                        icon: 'success',
                        allowOutsideClick: false,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload()
                            //Swal.fire('Saved!', '', 'success')
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    })
                }
                
            },
            error :function( data ) {
                error(data, formData);
            },
        });
    }
    // ---------- Enviar la notificación push----------
    $('#formSendNews').on('submit', function(event) {
        event.preventDefault();
        let ruta = '/admin/newsprev';
        let formulario = this;
        nuevo(ruta, formulario);
    });
});