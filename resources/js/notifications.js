let notificationQueue = [];
let notificationRunning = false;
if (typeof user !== "undefined") {
    Echo.private("App.Models.User." + user.id).notification((notification) => {
        showNotification(notification);
        dispatchEvent(
            new CustomEvent("notificationReceived", { detail: notification }),
        );
    });
}

function showNotification(notification) {
    notificationQueue.push(notification);
    Livewire.dispatch("notificationReceived", notification);
    if (!notificationRunning) {
        notificationRunning = true;
        showNotifications();
    }
}

function showNotifications() {
    const notificationButton = document.getElementById("notificationButton");
    const notificationInnerDiv = document.getElementById(
        "notificationInnerDiv",
    );
    const notificationIconDiv = document.getElementById("notificationIconDiv");
    const notificationTextDiv = document.getElementById("notificationTextDiv");
    const notificationText = notificationTextDiv.querySelector("p");
    const notificationIcon = notificationTextDiv.querySelector("i");
    const href = notificationButton.href;
    const notification = notificationQueue[0];
    const isNotificationButtonVisible = notificationButton.checkVisibility({
        visibilityProperty: true,
    });
    console.log(isNotificationButtonVisible);
    if (!isNotificationButtonVisible) {
        notificationButton.classList.add(
            "visible",
            "opacity-100",
            "absolute",
            "top-4",
        );
    }

    notificationButton.href = notification.url;

    const statusClasses = {
        success: [
            "bg-pr",
            "hover:bg-pr/20",
            "dark:bg-dm-pr",
            "dark:hover:bg-dm-pr/20",
        ],
        error: [
            "dark:bg-dm-red",
            "dark:hover:bg-dm-dark_red",
            "bg-red",
            "hover:bg-red-300",
        ],
        default: [
            "bg-pr",
            "hover:bg-pr/20",
            "dark:bg-dm-pr",
            "dark:hover:bg-dm-pr/20",
        ],
    };

    const classesToAdd =
        statusClasses[notification.status] || statusClasses["default"];
    notificationButton.classList.add(...classesToAdd);
    notificationButton.classList.remove("bg-pr/20", "dark:bg-dm-pr/20");
    notificationIconDiv.classList.add("top-10");

    notificationIconDiv.ontransitionend = () => {
        notificationIconDiv.ontransitionend = null;
        notificationInnerDiv.classList.add("w-72");
        notificationInnerDiv.classList.remove("w-6");
        notificationIcon.classList = `${notification.icon} me-2 dark:text-white text-white`;

        notificationInnerDiv.ontransitionend = () => {
            notificationInnerDiv.ontransitionend = null;
            notificationText.innerText = notification.title;
            notificationTextDiv.style.width = "inherit";
            notificationTextDiv.classList.add("flex", "top-0");
            notificationTextDiv.classList.remove("hidden", "top-8");
            document
                .querySelector(".notificationEmpty")
                .classList.add("!hidden");
            document
                .querySelector(".notificationFull")
                .classList.remove("!hidden");
            notificationQueue.shift();

            const notificationStep4 = setInterval(() => {
                if (notificationQueue.length > 0) {
                    notificationQueue.shift();
                    notificationTextDiv.classList.add("top-8");
                    notificationTextDiv.classList.remove("top-0");

                    notificationTextDiv.ontransitionend = () => {
                        notificationButton.href = notification.url;
                        notificationText.innerText = notification.title;
                        notificationIcon.classList = `${notification.icon} me-2 dark:text-white text-white`;
                        notificationTextDiv.classList.add("top-0");
                        notificationTextDiv.classList.remove("top-8");
                    };
                } else {
                    notificationTextDiv.classList.add("top-8");
                    notificationTextDiv.classList.remove("top-0");
                    clearInterval(notificationStep4);

                    notificationTextDiv.ontransitionend = () => {
                        notificationTextDiv.ontransitionend = null;
                        notificationTextDiv.classList.add("hidden");
                        notificationTextDiv.classList.remove("flex");
                        notificationTextDiv.style.width = "auto";
                        notificationInnerDiv.classList.add("w-6");
                        notificationInnerDiv.classList.remove("w-72");

                        notificationInnerDiv.ontransitionend = () => {
                            notificationInnerDiv.ontransitionend = null;
                            notificationIconDiv.classList.remove("top-10");
                            notificationButton.classList.add(
                                "bg-pr/20",
                                "dark:bg-dm-pr/20",
                            );
                            notificationButton.classList.remove(
                                ...classesToAdd,
                            );
                            notificationButton.href = href;
                            notificationRunning = false;

                            if (!isNotificationButtonVisible) {
                                notificationButton.ontransitionend = () => {
                                    notificationButton.ontransitionend = null;
                                    notificationButton.classList.remove(
                                        "opacity-100",
                                    );
                                    notificationButton.ontransitionend = () => {
                                        notificationButton.ontransitionend =
                                            null;
                                        notificationButton.classList.remove(
                                            "visible",
                                            "absolute",
                                            "top-4",
                                        );
                                    };
                                };
                            }
                        };
                    };
                }
            }, 5000);
        };
    };
}
