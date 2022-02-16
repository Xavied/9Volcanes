$( document ).ready(function() {
    $('#crearFormularioForm').on('submit',function(event){        
        event.preventDefault();        
        let inputNumeroFormularios = document.getElementById('crearFormulario');
        let numeroFormularios = parseInt(inputNumeroFormularios.value);
        for (let index = 0; index < numeroFormularios; index++) {
            $("#contenedorFormularios").append(
                crearFormularioProducto(index + 1)
            ); 
        }        
        
        $('#formularioCompleto').fadeIn();
        $('#formularioNumeroProductos').fadeOut();
        let inputNumeroProductos = document.getElementById('numeroProductos');
        inputNumeroProductos.value=numeroFormularios;
         
    }); 

    function botonCargado(idBoton, texto) {
        let boton = document.getElementById(idBoton);
        boton.disabled = false;
        boton.innerText = texto;
    }

    function botonCargando(idBoton) {
        let boton = document.getElementById(idBoton);
        boton.disabled = true;
        boton.innerText = "Cargando...";
    }

    function crearInputFile(id, labelTitle) {
        var div = document.createElement("div");
        div.className = "mb-3";

        var label = document.createElement("label");
        label.className = "form-label";
        var textLabel = document.createTextNode(labelTitle);
        label.appendChild(textLabel);
        div.appendChild(label);

        var input = document.createElement("input");
        input.id = id;
        input.multiple = "multiple";
        input.accept="image/png, image/jpeg, image/jpg, image/svg, image/gif, application/pdf";
        input.type = "file";
        input.className = "form-control"; 

        div.appendChild(input);

        var error = document.createElement("p");
        error.className = "invalid-feedback";
        error.id = 'error-' + id;
        div.appendChild(error);

        return div;
    }
    function crearInputText(id, labelTitle) {
        var div = document.createElement("div");
        div.className = "mb-3";

        var label = document.createElement("label");
        label.className = "form-label";
        var textLabel = document.createTextNode(labelTitle);
        label.appendChild(textLabel);
        div.appendChild(label);
        var input = document.createElement("input");
        input.id = id;
        input.name = id;
        input.type = "text";
        input.className = "form-control"; 
        div.appendChild(input);

        var error = document.createElement("p");
        error.className = "invalid-feedback";
        error.id = 'error-' + id;
        div.appendChild(error);

        return div;        
    }

    function crearTituloFormulario(texto) {
        
        var titulo = document.createElement("h6");
        titulo.className = "fw-bold";

        var textTitulo = document.createTextNode(texto);
        titulo.appendChild(textTitulo);
        return titulo;
    }

    function crearFormularioProducto(numeroProducto) {        
        var divFormulario = document.createElement("div");
        let espacio = document.createElement("br");
        divFormulario.appendChild(espacio);
        let titulo = 'INFORMACIÓN DEL PRODUCTO #'+numeroProducto;
        divFormulario.appendChild(crearTituloFormulario(titulo));
        let inputName = 'empProducto_'+numeroProducto;        
        divFormulario.appendChild(crearInputText(inputName, '1. Nombre del Producto'));
        inputName = 'empMarca_'+numeroProducto;
        divFormulario.appendChild(crearInputText(inputName, '2. Marca del producto'));         
        inputName = 'empDescripcion_'+numeroProducto;
        divFormulario.appendChild(crearInputText(inputName, '3. Descripción'));
        inputName = 'empPresentacion_'+numeroProducto;
        divFormulario.appendChild(crearInputText(inputName, '4. Presentación'));
        inputName = 'empEmpaque_'+numeroProducto;
        divFormulario.appendChild(crearInputText(inputName, '5. Empaque'));
        inputName = 'empValorVenta_'+numeroProducto;
        divFormulario.appendChild(crearInputText(inputName, '6. Valor de Venta al Público'));
        inputName = 'empCapacidad_'+numeroProducto;
        divFormulario.appendChild(crearInputText(inputName, '7. Capacidad de producción (mensual)'));
        inputName = 'empNotificacion_'+numeroProducto;
        divFormulario.appendChild(crearInputText(inputName, '8. Tiene notificación sanitaria'));
        inputName = 'empCertificaciones_'+numeroProducto;
        divFormulario.appendChild(crearInputText(inputName, '9. Tiene otras certificaciones'));
        inputName = 'empArchivos_'+numeroProducto;
        divFormulario.appendChild(crearInputFile(inputName, '10. Favor adjuntar 1 - 2 fotografías o imágenes, en formato gif o Pdf, de no más 2 Mb.'));
         
        return divFormulario;
    }

    $('#formularioEmprendedoresProductos').on('submit',function(event){
        event.preventDefault();
        let ruta = "formularioEmprendedores/enviar";
        let formulario = this;
        let idBoton = 'botonEnviarFormulario';        
        subirArchivos(ruta,formulario, idBoton);
    });

    function limpiarForm(formData) {
        for (let pair of formData.entries()) {
            $('#error-'+pair[0]).empty();
            if ($('#'+pair[0]).is('.is-invalid')){
                $('#'+pair[0]).toggleClass("is-invalid");
            }
        }
    }

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

    function subirArchivos(ruta,formulario, idBoton){
        botonCargando(idBoton);
        let textoBoton = "Enviar Formulario";
        let form = formulario;
        let formData = new FormData(form);
        let productos = formData.get('numeroProductos');
        for (let index = 0; index < productos; index++) {
            $.each($("input[type='file']")[index].files, function(i, file) {
                formData.append('producto_' + (index + 1) + '_' + i , file);
            });            
        }
        
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
                  botonCargado(idBoton, textoBoton);             
            },
            error :function( data ) {
                error(data, formData);
                botonCargado(idBoton, textoBoton);
            },
        });
    }

});