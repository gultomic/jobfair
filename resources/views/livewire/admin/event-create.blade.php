<div class="py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Event') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="grid grid-cols-2 p-6 text-gray-900 gap-x-4">
                <form wire:submit="save">
                    <!-- Tanggal -->
                    <div class="mb-4">
                        <x-input-label for="tanggal" :value="__('Tanggal')" />
                        <x-text-input wire:model="tanggal" id="tanggal" class="block mt-1" type="date" name="tanggal" required autofocus />
                        <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                    </div>

                    <!-- Job fair -->
                    <div class="mb-4">
                        <x-input-label for="jobfair" :value="__('Job Fair')" />
                        <select wire:model.live="jobfair" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="" selected>Pilih Job Fair</option>
                            @foreach ($jfList as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('jobfair')" class="mt-2" />
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-4">
                        <x-input-label for="lokasi" :value="__('Lokasi')" />
                        <x-text-input wire:model="lokasi" id="lokasi" class="block w-full mt-1" type="text" name="lokasi" required />
                        <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-4">
                        <x-input-label for="keterangan" :value="__('Keterangan')" />
                        <textarea wire:model="keterangan" id="keterangan" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="keterangan" required rows="5"></textarea>
                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                    </div>

                    <x-primary-button type="submit">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </form>

                <div class="h-80">
                    <img class="object-cover bg-gray-100 w-full h-80 {{ $jobfair!=null ? 'block' : 'hidden' }}" src="{{ $img }}" alt="Job Fair" x-cloak>
                </div>
            </div>
        </div>
    </div>
</div>
