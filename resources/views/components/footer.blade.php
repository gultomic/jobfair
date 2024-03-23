<footer class="block px-1 py-12 bg-gray-100 lg:px-28">
    <div class="grid gap-6 mx-auto mb-12 md:grid-cols-3">
        <div>
            <a href="/" wire:navigate>
                <x-application-logo class="w-12 h-12 text-gray-500 fill-current" />
            </a>

            <p>Pusat Pasar Kerja muncul sebagai realisasi dari sembilan langkah utama yang diambil oleh Kemnaker, terutama dalam konteks menghubungkan pencari kerja dengan pekerjaan yang cocok dengan kemampuan dan minat mereka.</p>
        </div>

        <div>
            <h2 class="mb-5 text-2xl font-medium">PaskerID</h2>

            <div class="flex flex-col gap-4">
                <a href="#">Profil</a>
                <a href="#">Layanan</a>
                <a href="#">Agenda</a>
            </div>
        </div>

        <div>
            <h2 class="mb-5 text-2xl font-medium">Kantor Pelayanan</h2>
        </div>
    </div>

    <div class="flex justify-center py-2 border border-t-gray-300">
        <!--begin::Copyright-->
        <span class="text-sm font-light text-gray-400">©<?php echo date('Y'); ?> Pusat Pasar Kerja. Hak Cipta Dilindungi Undang-Undang.</span>
        <!--end::Copyright-->
    </div>
</footer>
