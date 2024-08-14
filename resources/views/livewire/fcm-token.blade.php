<div>

</div>
<script type="module">
    import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js'
    import {getMessaging, onMessage, getToken} from "https://www.gstatic.com/firebasejs/10.12.2/firebase-messaging.js";

    const firebaseConfig = {
        apiKey: "{{ $config['apiKey'] }}",
        authDomain: "{{ $config['authDomain'] }}",
        databaseURL: "{{ $config['databaseURL'] }}",
        projectId: "{{ $config['projectId'] }}",
        storageBucket: "{{ $config['storageBucket'] }}",
        messagingSenderId: "{{ $config['messagingSenderId'] }}",
        appId: "{{ $config['appId'] }}",
        measurementId: "{{ $config['measurementId'] }}",
    };
    const app = initializeApp(firebaseConfig);
    const messaging = getMessaging(app);
    Notification.requestPermission().then((permission) => {
        if (permission === "granted") {
            if ("serviceWorker" in navigator) {
                navigator.serviceWorker
                    .register("/firebase-messaging-sw.js");
            }
            navigator.serviceWorker.getRegistration().then(async (reg) => {
                let token = await getToken(messaging, {vapidKey: "{{ $config['vapid'] }}"});
                if(token){
                    Livewire.dispatch('fcm-token', {token: token})
                }


                onMessage(messaging, (payload) => {
                    Livewire.dispatch('fcm-notification', {data: payload})
                    // push notification can send event.data.json() as well
                    const options = {
                        body: payload.data.body,
                        icon: payload.data.image,
                        tag: "alert",
                    };
                    let notification = reg.showNotification(
                        payload.data.title,
                        options
                    );
                    // link to page on clicking the notification
                    notification.onclick = (payload) => {
                        window.open(payload.data.url);
                    };
                });
            });
        }

    });

</script>
