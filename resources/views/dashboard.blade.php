@php
    $user = auth()->user()->email;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="dashboard({email:'{{ $user }}'})">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div x-show="nouat" class="flex justify-between p-0.5 mb-4  border border-red-200 rounded-lg bg-red-50">
                        <div class="flex items-center gap-1 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>

                            <span class="text-sm italic">Belum memiliki access token!</span>
                        </div>

                        <button @click.stop="modalOpen=true" class="px-4 text-sm text-blue-500 rounded-full hover:bg-sky-200 active:bg-sky-200">buat token</button>
                    </div>

                    <p>{{ __("Daftar telah mengikuti job fair!") }}</p>

                    <livewire:event-attend />

                    <div>
                        {{ $user }}
                    </div>
                </div>
            </div>
        </div>

        <div
            x-show="modalOpen"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                    aria-hidden="true"
                ></div>

                <div x-cloak x-show="modalOpen"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                >
                    <div class="flex items-center justify-between space-x-4">
                        <small x-show="alertOpen" class="italic text-red-500" x-text="message"></small>
                    </div>

                    <form class="mt-5" @submit.prevent="tokenSubmit">
                        <div class="mt-4">
                            <label for="password" class="block text-sm text-gray-700 capitalize">Password</label>
                            <input id="password" type="password" name="password" x-model="password" required class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>

                        <div class="flex justify-end mt-6">
                            <x-primary-button class="ms-3">
                                {{ __('Buat') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
