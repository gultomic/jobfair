<header>
    <div class="flex items-center justify-between w-full gap-2 px-2 py-4 md:px-28" x-data="{open:false}" x-cloack>
        <div class="flex items-center justify-start flex-1 gap-x-2">
            <button type="button" x-on:click="open=true" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"></rect>
                        <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3"></path>
                    </g>
                </svg>
            </button>
            <img src="https://paskerid.kemnaker.go.id/storage/pengaturan-website/f28c663e-104a-4934-ad56-804cd2bda2b9_Logo%20PaskerID.png" class="h-8" alt="logo kemnaker">
        </div>

        <div class="items-center justify-between hidden px-2 md:flex gap-x-2">
            <a href="https://paskerid.kemnaker.go.id/" class="p-4 rounded-md hover:bg-slate-100">Beranda</a>
            <a href="https://paskerid.kemnaker.go.id/profil" class="p-4 rounded-md hover:bg-slate-100">Profil</a>
            <a href="https://paskerid.kemnaker.go.id/layanan" class="p-4 rounded-md hover:bg-slate-100">Layanan</a>
            <a href="#" class="p-4 rounded-md hover:bg-slate-100">Publikasi</a>
            <a href="https://paskerid.kemnaker.go.id/agenda" class="p-4 rounded-md hover:bg-slate-100">Agenda</a>
            <a href="https://paskerid.kemnaker.go.id/informasi" class="p-4 rounded-md hover:bg-slate-100">Informasi</a>
            <a href="/" class="p-4 rounded-md hover:bg-slate-100">Microlearning</a>
            <a href="#" class="p-4 rounded-md hover:bg-slate-100">JFO</a>
        </div>

        @if (Route::has('login'))
            <div class="items-center hidden h-12 px-2 border-l md:flex text-end border-slate-300">
                @auth
                    @php
                        if (Auth::user()->role === 'admin') {
                            $board = '/admin/dashboard';
                        } else {
                            $board = '/dashboard';
                        }
                    @endphp
                    <a href="#" href="{{ url($board) }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Dashboard</a>
                @else
                    <a href="{{ route('login') }}" title="login" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor"></rect>
                            <path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="currentColor"></path>
                            <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="currentColor"></path>
                        </svg>
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" title="register" class="font-semibold text-gray-700/60 ms-4 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-gray-600 w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="fixed inset-0 z-40 bg-black/40 backdrop-blur-sm" x-show="open" x-on:click="open=false"></div>
        <div class="fixed inset-y-0 left-0 z-50 w-7/12 h-screen bg-white" x-show="open">
            @if (Route::has('login'))
                <div class="flex justify-end m-4">
                    @auth
                        @php
                            if (Auth::user()->role === 'admin') {
                                $board = '/admin/dashboard';
                            } else {
                                $board = '/dashboard';
                            }
                        @endphp
                        <a href="#" href="{{ url($board) }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" title="login" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor"></rect>
                                <path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="currentColor"></path>
                                <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="currentColor"></path>
                            </svg>
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" title="register" class="font-semibold text-gray-700/60 ms-4 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-gray-600 w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            <a href="https://paskerid.kemnaker.go.id/" class="block p-3 border-t border-gray-200 focus:bg-gray-100">Beranda</a>
            <a href="https://paskerid.kemnaker.go.id/profil" class="block p-3 border-t border-gray-200 focus:bg-gray-100">Profil</a>
            <a href="https://paskerid.kemnaker.go.id/layanan" class="block p-3 border-t border-gray-200 focus:bg-gray-100">Layanan</a>
            <a href="#" class="block p-3 border-t border-gray-200">Publikasi</a>
            <a href="https://paskerid.kemnaker.go.id/agenda" class="block p-3 border-t border-gray-200 focus:bg-gray-100">Agenda</a>
            <a href="https://paskerid.kemnaker.go.id/informasi" class="block p-3 border-t border-gray-200 focus:bg-gray-100">Informasi</a>
            <a href="/" class="block p-3 border-t border-gray-200 focus:bg-gray-100">Microlearning</a>
            <a href="#" class="block p-3 border-t border-gray-200 focus:bg-gray-100">JFO</a>
        </div>
    </div>
</header>
