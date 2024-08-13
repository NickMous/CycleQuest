@props(['notification'])
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
    <div class="ml-4 flex flex-col items-end">
        <!-- Actions -->
        @if($notification->read_at === null)
            <button class="text-blue-500 hover:underline"
                    wire:click="markAsRead('{{ $notification->id }}')">{{ __('notifications.mark_as_read') }}</button>
        @endif
        <button class="ml-2 text-red-500 hover:underline"
                wire:click="delete('{{ $notification->id }}')">{{ __('notifications.delete') }}</button>
    </div>
</li>
