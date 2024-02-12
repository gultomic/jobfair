@php
    $user = auth()->user();
    $token = $user->tokens->first()->token;
    $attend = $user->checkin->sortByDesc('created_at');
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="dashboard({token:'{{$token}}'})">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>{{ __("Daftar telah mengikuti job fair!") }}</p>

                    <livewire:event-attend />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
