<x-filament::header :breadcrumbs="$breadcrumbs">
    <x-slot name="heading">
        {{ $heading }}
    </x-slot>

    <x-slot name="subheading">
        {{ $subheading }}
    </x-slot>

    <x-slot name="actions">
        {{-- This retains only the sign out button --}}
        <x-filament::button
            color="gray"
            icon="heroicon-m-arrow-left-on-rectangle"
            icon-alias="panels::header.buttons.logout"
            href="{{ route('filament.auth.logout') }}"
            tag="a"
        >
            {{ __('filament-panels::layout.actions.logout.label') }}
        </x-filament::button>
    </x-slot>
</x-filament::header>