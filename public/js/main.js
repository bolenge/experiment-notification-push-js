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
  const subscription = await registration.pushManager.getSubscription()

  console.log(subscription);
}

main()