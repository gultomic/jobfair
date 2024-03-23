<div class="py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Job Fair') }}
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
                        <div class="inline-flex items-center">
                            <x-input-label for="image" :value="__('Banner')" />
                            <span class="pl-3 text-xs italic text-gray-400">*max-size: 1024kb</span>
                        </div>
                        <input wire:model="image" id="image" class="block w-full mt-1 border py-[0.32rem] px-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="image" required />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <x-primary-button type="submit">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </form>

                <div>
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="object-cover w-full bg-gray-100 h-80">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
