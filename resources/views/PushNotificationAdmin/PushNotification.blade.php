<x-app-layout>
    <br>
    <div style="justify-content: center; align-items: center;  display: flex;"  >
        <button type="button" class="btn btn-outline-success btn-block" data-bs-toggle="modal"
        data-bs-target="#modalNuevaNotificacion">
        Crear una NUEVA notificación
        </button>
    </div>
    <br>
    <br>
    @include('PushNotificationAdmin.PushNotificationModal')

</x-app-layout>