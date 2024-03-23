<header>
    <div class="items-center justify-between w-full gap-2 px-2 md:flex">
        <div class="flex items-center justify-between flex-1 py-2 md:justify-start gap-x-2">
            <img src="https://kemnaker.go.id/assets/images/logo-color.png" class="h-10" alt="logo kemnaker">
            <img src="https://siapkerja.kemnaker.go.id/assets/images/logo/siaker-logo-blue.svg" class="h-10" alt="logo kemnaker">
        </div>

        <div class="flex items-center justify-between py-2 lg:px-10 gap-x-2">
            <img src="https://jfo.kemnaker.go.id/landing/assets/img/paskerid.png" class="h-10" alt="logo kemnaker">
            <img src="https://siapkerja.kemnaker.go.id/assets/images/logo/products/karirhub-lower.svg" class="h-10" alt="logo kemnaker">
        </div>

        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif
    </div>
</header>
