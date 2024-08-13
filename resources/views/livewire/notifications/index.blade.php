<div>
    @if ($unread->count())
        <div class="flex flex-col items-center justify-center mt-8 md:justify-start md:px-8">
            <x-html.h1>{{ __('notifications.unread') }}</x-html.h1>
            <div class="container pt-8 mx-auto sm:p-4">
                <div class="overflow-hidden sm:rounded-lg shadow dark:bg-dm-pr/40">
                    <ul class="divide-y dark:divide-pr/20">
                        <!-- Notification items will be dynamically inserted here -->
                        @foreach ($unread as $notification)
                            <x-notification.item :notification="$notification" />
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    @if ($notifications->count())
        <div class="flex flex-col items-center justify-center mt-8 md:justify-start md:px-8">
            <x-html.h1>{{ __('notifications.all_notifications') }}</x-html.h1>
            <div class="container pt-8 mx-auto sm:p-4">
                <div class="overflow-hidden shadow sm:rounded-lg dark:bg-dm-pr/40">
                    <ul class="divide-y dark:divide-pr/20">
                        <!-- Notification items will be dynamically inserted here -->
                        @foreach ($notifications as $notification)
                            <x-notification.item :notification="$notification" />
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
