self.addEventListener('push', function (e) {
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        //notifications aren't supported or permission not granted!
        return;
    }

    if (e.data) {
        var msg = e.data.json();
        console.log(msg)
        e.waitUntil(self.registration.showNotification(msg.title, {
            body: msg.body,
            icon: msg.icon,
            actions: msg.actions
        }));
    }
});
self.addEventListener('notificationclick', 
function(e)
{
    if (e.action === 'some_action') 
    {
        self.clients.openWindow();
    } 
    else {
        self.clients.openWindow('http://127.0.0.1:8000/productos')
    }
    
});