<div>
    @if ($unread->count())
        <div class="flex flex-col items-center justify-center mt-8 md:justify-start md:px-8">
            <x-html.h1>{{ __('notifications.unread') }}</x-html.h1>
            <div class="container p-4 pt-8 mx-auto">
                <div class="overflow-hidden rounded-lg shadow dark:bg-dm-pr/40">
                    <ul class="divide-y dark:divide-pr/20">
                        <!-- Notification items will be dynamically inserted here -->
                        @foreach ($unread as $notification)
                            <li class="flex items-center p-4">
                                <div class="mr-4">
                                    <!-- Icon based on notification type -->
                                    <i
                                        class="{{ $notification->data['view']['icon'] }} text-2xl dark:text-dm-text-300"></i>
                                </div>
                                <div class="flex-1">
                                    <a href="{{ $notification->data['view']['url'] }}">
                                        <h2 class="font-semibold underline text-dm-text">
                                            {{ $notification->data['view']['title'] }}
                                        </h2>
                                    </a>
                                    <p class="text-sm text-dm-text-300">{{ $notification->data['view']['message'] }}</p>
                                    <p class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="ml-4">
                                    <!-- Actions -->
                                    <button class="text-blue-500 hover:underline"
                                        wire:click="markAsRead('{{ $notification->id }}')">{{ __('notifications.mark_as_read') }}</button>
                                    <button class="ml-2 text-red-500 hover:underline"
                                        wire:click="delete('{{ $notification->id }}')">{{ __('notifications.delete') }}</button>
                                </div>
                            </li>
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
                            <li class="flex items-center p-4">
                                <div class="mr-4">
                                    <!-- Icon based on notification type -->
                                    <i
                                        class="{{ $notification->data['view']['icon'] }} text-2xl dark:text-dm-text-300"></i>
                                </div>
                                <div class="flex-1">
                                    <a href="{{ $notification->data['view']['url'] }}">
                                        <h2 class="font-semibold underline text-dm-text">
                                            {{ $notification->data['view']['title'] }}
                                        </h2>
                                    </a>
                                    <p class="text-sm text-dm-text-300">{{ $notification->data['view']['message'] }}
                                    </p>
                                    <p class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="ml-4">
                                    <!-- Actions -->
                                    <button class="ml-2 text-red-500 hover:underline"
                                        wire:click="delete('{{ $notification->id }}')">{{ __('notifications.delete') }}</button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
