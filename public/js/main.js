function main() {
  const permission = document.getElementById('push-permission')

  if (
    !permission ||
    !('Notification' in window) ||
    !('serviceWorker' in navigator)
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
}

main()