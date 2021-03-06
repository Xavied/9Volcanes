//funcion para comprobar serviceworker o pushmanager
function initSW() {
    if (!"serviceWorker" in navigator) {
        //service worker isn't supported
        return;
    }

    if (!"PushManager" in window) {
        //push isn't supported
        return;
    }

    //registro para el serviceworker
    navigator.serviceWorker.register('../sw.js')
        .then(() => {
            console.log('serviceWorker installed!')
            initPush();
        })
        .catch((err) => {
            console.log(err)
        });
}
//funcion para pedir permisos de notificaciones.
function initPush() {
    if (!navigator.serviceWorker.ready) {
        return;
    }

    new Promise(function (resolve, reject) {
        const permissionResult = Notification.requestPermission(function (result) {
            resolve(result);
        });

        if (permissionResult) {
            permissionResult.then(resolve, reject);
        }
    })
        .then((permissionResult) => {
            if (permissionResult !== 'granted') {
                throw new Error('We weren\'t granted permission.');
            }
            subscribeUser();
        });
}
//Funcion de suscribirse para el usuario.SOLO SI ACEPTA(ALLOW)
function subscribeUser() {
    navigator.serviceWorker.ready
        .then((registration) => {
            const subscribeOptions = {
                userVisibleOnly: true,
                applicationServerKey: urlBase64ToUint8Array(
                    //AQUI VA LA PUBLIC_VAPID_KEY //
                    'BFhnfmf4KTSFPp2URazqKCPGpiyQz7PDQMJSInPeK-hiJBPKiRK147-9tatkZJs1IbNF0z0AEcVsd2FA3dCQP-E'
                    
                )
            };

            return registration.pushManager.subscribe(subscribeOptions);
        })
        .then((users) => {
            console.log('Received PushSubscription: ', JSON.stringify(users));
            storePushSubscription(users);
        });
}
//funcion para tranformar a BASE64 la clave pública
function urlBase64ToUint8Array(base64String) {
    var padding = '='.repeat((4 - base64String.length % 4) % 4);
    var base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

    var rawData = window.atob(base64);
    var outputArray = new Uint8Array(rawData.length);

    for (var i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}
//MANDAMOS LA SUSCRIPCIÓN A LA BASE DE DATOS
function storePushSubscription(users) {
    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');

    fetch('/pushstore', {
        method: 'POST',
        body: JSON.stringify(users),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-Token': token
        }
        
    })
        .then((res) => {
            return (res.json());
        })
        .then((res) => {
            console.log(res)
        })
        .catch((err) => {
            console.log(err)
        });
}
