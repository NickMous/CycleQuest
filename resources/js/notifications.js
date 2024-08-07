let notificationQueue = [];
let notificationRunning = false;
if (typeof user !== 'undefined') {
    Echo.private('App.Models.User.' + user.id)
        .notification((notification) => {
            showNotification(notification);
            dispatchEvent(new CustomEvent('notificationReceived', {detail: notification}));
        });
}

function showNotification(notification) {
    notificationQueue.push(notification);
    Livewire.dispatch('notificationReceived', notification);
    if (!notificationRunning) {
        notificationRunning = true;
        showNextNotification();
    }
}

function showNextNotification() {
    let notificationButton = document.getElementById('notificationButton');
    let notificationInnerDiv = document.getElementById('notificationInnerDiv');
    let notificationIconDiv = document.getElementById('notificationIconDiv');
    let notificationTextDiv = document.getElementById('notificationTextDiv');
    let notificationText = notificationTextDiv.querySelector('p');
    let notificationIcon = notificationTextDiv.querySelector('i');
    let href = notificationButton.href;
    let notification = notificationQueue[0];
    notificationButton.href = notification.url;
    if (notification.status == 'success') {
        notificationButton.classList.add('bg-pr', 'hover:bg-pr/20', 'dark:bg-dm-pr', 'dark:hover:bg-dm-pr/20');
    } else if (notification.status == 'error') {
        notificationButton.classList.add('dark:bg-dm-red', 'dark:hover:bg-dm-dark_red', 'bg-red', 'hover:bg-red-300');
    } else {
        notificationButton.classList.add('bg-pr', 'hover:bg-pr/20', 'dark:bg-dm-pr', 'dark:hover:bg-dm-pr/20');
    }
    notificationButton.classList.remove('bg-pr/20', 'dark:bg-dm-pr/20');
    notificationIconDiv.classList.add('top-10');
    let notificationStep2 = setTimeout(() => {
        notificationInnerDiv.classList.add('w-72');
        notificationInnerDiv.classList.remove('w-6');
        notificationIcon.classList = notification.icon + ' me-2 dark:text-white text-white';
        clearTimeout(notificationStep2);
        let notificationStep3 = setTimeout(() => {
            notificationText.innerText = notification.title;
            notificationTextDiv.style.width = 'inherit';
            notificationTextDiv.classList.remove('hidden');
            notificationTextDiv.classList.add('top-0');
            notificationTextDiv.classList.remove('top-8');
            document.querySelector('.notificationEmpty').classList.add('!hidden');
            document.querySelector('.notificationFull').classList.remove('!hidden');
            clearTimeout(notificationStep3);
            let notificationStep4 = setTimeout(() => {
                notificationTextDiv.classList.add('top-8');
                notificationTextDiv.classList.remove('top-0');
                clearTimeout(notificationStep4);
                let notificationStep5 = setTimeout(() => {
                    notificationTextDiv.classList.add('hidden');
                    notificationTextDiv.style.width = 'auto';
                    notificationInnerDiv.classList.add('w-6');
                    notificationInnerDiv.classList.remove('w-72');
                    clearTimeout(notificationStep5);
                    let notificationStep6 = setTimeout(() => {
                        notificationIconDiv.classList.remove('top-10');
                        notificationButton.classList.add('bg-pr/20', 'dark:bg-dm-pr/20');
                        if (notification.status == 'success') {
                            notificationButton.classList.remove('bg-pr', 'hover:bg-pr/20', 'dark:bg-dm-pr', 'dark:hover:bg-dm-pr/20');
                        } else if (notification.status == 'error') {
                            notificationButton.classList.remove('dark:bg-dm-red', 'dark:hover:bg-dm-dark_red', 'bg-red', 'hover:bg-red-300');
                        } else {
                            notificationButton.classList.remove('bg-pr', 'hover:bg-pr/20', 'dark:bg-dm-pr', 'dark:hover:bg-dm-pr/20');
                        }
                        // notificationButton.classList.remove('dark:bg-dm-aquamarine', 'dark:hover:bg-dm-dark_green-700', 'bg-sea_green', 'hover:bg-mint_green-300');
                        notificationButton.href = href;
                        notificationQueue.shift();
                        if (notificationQueue.length > 0) {
                            showNextNotification();
                        } else {
                            notificationRunning = false;
                        }
                        clearTimeout(notificationStep6);
                    }, 500);
                }, 150);
            }, 5000)
        }, 150);
    }, 500);
}
