<div class="py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detail Job Fair') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="grid grid-cols-2 p-6 text-gray-900 gap-x-4">
                <form wire:submit="save">
                    <!-- Nama Job Fair -->
                    <div class="mb-4">
                        <x-input-label for="nama" :value="__('Nama Job Fair')" />
                        <x-text-input wire:model="nama" id="nama" class="block w-full mt-1" type="text" name="nama" required autofocus />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <div class="flex items-center">
                            <x-input-label for="image{{ $itteration }}" :value="__('Banner')" />
                            <span class="pl-3 text-xs italic text-gray-400">*max-size: 1024kb</span>
                        </div>
                        <div class="flex items-center gap-x-1">
                            <input wire:model.live="image" id="image{{ $itteration }}" class="block w-full mt-1 border py-[0.32rem] px-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="image" />
                            <button class="p-2 mt-1 rounded-full hover:bg-gray-200" type="button" wire:click='undoImage'>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <x-primary-button type="submit">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </form>
                <div>
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="object-cover w-full bg-gray-100 h-80">
                    @else
                        <img src="{{ $preview }}" class="object-cover w-full bg-gray-100 h-80">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
