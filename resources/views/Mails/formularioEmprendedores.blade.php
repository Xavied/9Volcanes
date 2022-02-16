{{-- Plantilla para enviar el correo --}}

<h2 style="text-align:center; color:darkgreen "><b>FORMULARIO PARA REGISTRO DE EMPRENDEDORES</b></h2>

<h3 style="color:darkolivegreen"><b>INFORMACIÓN DEL OFERTANTE</b></h3>
<div>
    <label><b>1. Nombre empresa / Organización</b></label>
    <p>{{$data['empNombreEmpresa']}}</p>
</div>
<div>
    <label><b>2. Número de RUC / C.I. / Pasaporte</b></label>
    <p>{{$data['empNumeroRUC']}}</p>
</div>
<div>
    <label><b>3. Ubicación: Provincia, Cantón, Parroquia</b></label>
    <p>{{$data['empUbicacion']}}</p>
</div>
<div>
    <label><b>4. Dirección</b></label>
    <p>{{$data['empDireccion']}}</p>
</div>
<div>
    <label><b>5. Número de teléfono (celular y/o convencional)</b></label>
    <p>{{$data['empTelefono']}}</p>
</div>
<div>
    <label><b>6. Dirección de correo electrónico y redes sociales</b></label>
    <p>{{$data['empCorreo']}}</p>
    <p>{{$data['empRedes']}}</p>
</div>
<div>
    <label><b>7. Nombre del propietario o representante legal</b></label>
    <p>{{$data['empPropietario']}}</p>
</div>
<div>
    <label><b>8. Persona de contacto</b></label>
    <p>{{$data['empContacto']}}</p>
</div>
<div>
    <label><b>9. Número de teléfono de la persona de contacto</b></label>
    <p>{{$data['empTelfContacto']}}</p>
</div>

<br><hr><br>

@for ($i = 0; $i < $data['numeroProductos']; $i++)
    <h3 style="color:darkolivegreen"><b>INFORMACIÓN DEL PRODUCTO #{{$i+1}}</b></h3>
    <div>
        <label><b>1. Nombre del Producto</b></label>
        <p>{{$data['empProducto_'.($i+1)]}}</p>
    </div>
    <div>
        <label><b>2. Marca del producto</b></label>
        <p>{{$data['empMarca_'.($i+1)]}}</p>
    </div>
    <div>
        <label><b>3. Descripción</b></label>
        <p>{{$data['empDescripcion_'.($i+1)]}}</p>
    </div>
    <div>
        <label><b>4. Presentación</b></label>
        <p>{{$data['empPresentacion_'.($i+1)]}}</p>
    </div>
    <div>
        <label><b>5. Empaque</b></label>
        <p>{{$data['empEmpaque_'.($i+1)]}}</p>
    </div>
    <div>
        <label><b>6. Valor de Venta al Público</b></label>
        <p>{{$data['empValorVenta_'.($i+1)]}}</p>
    </div>
    <div>
        <label><b>7. Capacidad de producción (mensual)</b></label>
        <p>{{$data['empCapacidad_'.($i+1)]}}</p>
    </div>
    <div>
        <label><b>8. Tiene notificación sanitaria</b></label>
        <p>{{$data['empNotificacion_'.($i+1)]}}</p>
    </div>
    <div>
        <label><b>9. Tiene otras certificaciones</b></label>
        <p>{{$data['empCertificaciones_'.($i+1)]}}</p>
    </div>
    <br>
@endfor
