<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('profile.update_password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('profile.update_password_description') }}
    </x-slot>

    <x-slot name="form">
        <x-input-group id="current_password" type="password" name="current_password" :label="__('profile.current_password')" wire:model="state.current_password" required autocomplete="current-password" divclass="col-span-6 sm:col-span-4" error="true" />
        <x-input-group id="password" type="password" name="password" :label="__('profile.new_password')" wire:model="state.password" required autocomplete="new-password" divclass="col-span-6 sm:col-span-4" error="true" />
        <x-input-group id="password_confirmation" type="password" name="password_confirmation" :label="__('profile.confirm_password')" wire:model="state.password_confirmation" required autocomplete="new-password" divclass="col-span-6 sm:col-span-4" error="true" />
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('profile.saved') }}
        </x-action-message>

        <x-button>
            {{ __('profile.save') }}
        </x-button>
    </x-slot>
</x-form-section>
