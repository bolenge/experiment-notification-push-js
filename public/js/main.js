const PUBLIC_KEY = 'BCgVyigy9JqUuaxjh8lCDOxzvPnb7ckQrVCKHEdIiYt4YYkoCYasO-gYQZtDotYGbwLgj6hp7CC3lZRVrkWIEhY'

function main() {
  const permission = document.getElementById('push-permission')

  if (
    (!permission ||
    !('Notification' in window) ||
    !('serviceWorker' in navigator))
    // || (Notification.permission !== 'default')
  ) {
    return;
  }

  const button = document.createElement('button')
  button.innerHTML = 'Recevoir les notifications'
  permission.appendChild(button)
  button.addEventListener('click', askPermission)
}

async function askPermission() {
  const permission = await Notification.requestPermission()
  
  if (permission == 'granted') {
    registerServiceWorker()
  }
}

async function registerServiceWorker() {
  const registration = await navigator.serviceWorker.register('/public/js/sw.js')
  let subscription = await registration.pushManager.getSubscription()

  if (subscription) {
    return
  }

  subscription = await registration.pushManager.subscribe({
    userVisibleOnly: true,
    applicationServerKey: PUBLIC_KEY
  })

  console.log('SUBSCRIPTION : ', subscription);
}

async function getPublicKey() {
  const { publicKey } = await fetch('/key', {
    headers: {
      Accept: 'application/json'
    }
  }).then(res => res.json())

  return publicKey
}

main()