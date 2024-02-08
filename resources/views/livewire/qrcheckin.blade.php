<div
    {{-- x-data="{token: localStorage.getItem('token')}" --}}
    x-init="$wire.token = localStorage.getItem('token')"
    x-cloack
>
    {{-- @if ($token != null) --}}
        <p class="text-3xl font-black uppercase">{{ $event->jobfair->nama }}</p>
        <p>{{ $event->tanggal }}</p>
        <p>{{ $event->refs['lokasi'] }}</p>

        <div class="mt-4 md:mt-10">
            @if ($event->tanggal == Carbon\Carbon::now()->format("Y-m-d"))
                {{-- {{ $user }} --}}
            @else
                <div class="flex items-center justify-center text-red-500 gap-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 1 0-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 0 1 3.15 0v1.5m-3.15 0 .075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 0 1 3.15 0V15M6.9 7.575a1.575 1.575 0 1 0-3.15 0v8.175a6.75 6.75 0 0 0 6.75 6.75h2.018a5.25 5.25 0 0 0 3.712-1.538l1.732-1.732a5.25 5.25 0 0 0 1.538-3.712l.003-2.024a.668.668 0 0 1 .198-.471 1.575 1.575 0 1 0-2.228-2.228 3.818 3.818 0 0 0-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0 1 16.35 15m.002 0h-.002" />
                    </svg>
                    <span class="text-xl font-bold">Event tidak tersedia</span>
                </div>
            @endif
        </div>
        <p>{{ $token }}</p>
    {{-- @else
        Credentials Not Found
    @endif --}}
</div>

{{-- @script
<script>
    document.addEventListener('livewire:initialized', () => {
        let $wire = {
            token: localStorage.getItem('token'),
        }
        // console.log(localStorage.getItem('token'));
    })
</script>
@endscript --}}
