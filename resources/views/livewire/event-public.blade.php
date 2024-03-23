@php
    $today = $collection->where('tanggal', '=', Carbon\Carbon::now()->format('Y-m-d'));
    $soon = $collection->where('tanggal', '>', Carbon\Carbon::now()->format('Y-m-d'));
    $held = $collection->where('tanggal', '<', Carbon\Carbon::now()->format('Y-m-d'));
@endphp

<div class="sm:py-6">
    <p class="px-4">Event hari ini:</p>
    @if ($today->count() == 0)
        <div class="block p-4 italic text-red-700 border border-red-300 rounded md:mx-4 bg-red-50">
            Mohon maaf hari ini tidak ada event terselenggara..!
        </div>
    @else
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:gap-8">
        @foreach ($today as $item)
            <a href="/event/{{ $item->id }}" class="border rounded-lg cursor-pointer bg-sky-100 border-sky-300 hover:border-sky-500">
                <img class="object-cover w-full h-48 bg-gray-200" src="{{ $item->jobfair->refs['image'] }}" alt="{{ $item->jobfair->nama }} job fair">
                <div class="p-4">
                    <p class="text-2xl font-semibold tracking-tighter uppercase">{{ $item->jobfair->nama }}</p>
                    <p class="leading-5 text-gray-600 font-extralight">{{ $item->refs['lokasi'] }}</p>
                </div>
            </a>
        @endforeach
        </div>
    @endif

    <p class="px-4 pt-6">Event akan datang:</p>
    @if ($soon->count() == 0)
        <div class="block p-4 italic text-red-700 border border-red-300 rounded md:mx-4 bg-red-50">
            Kami belum memiliki event di masa akan datang.
        </div>
    @else
        <div class="grid grid-cols-1 gap-6 md:grid-cols-4 lg:gap-8">
        @foreach ($soon as $item)
            <div class="border rounded-lg bg-emerald-50 border-emerald-300">
                <img class="object-cover w-full h-32 bg-gray-200" src="{{ $item->jobfair->refs['image'] }}" alt="{{ $item->jobfair->nama }} job fair">
                <div class="p-2">
                    <p class="text-xs font-bold text-blue-400">{{ $item->tanggal }}</p>
                    <p class="py-1 text-lg font-semibold leading-5 tracking-tighter uppercase">{{ $item->jobfair->nama }}</p>
                    <p class="leading-4 tracking-tight font-extralight">{{ $item->refs['lokasi'] }}</p>
                </div>
            </div>
        @endforeach
        </div>
    @endif

    <p class="px-4 pt-6">Event selesai:</p>
    <div class="grid grid-cols-2 gap-1 md:grid-cols-6 lg:gap-2">
        @foreach ($held as $item)
            <div class="p-4 bg-white border rounded-lg">
                <p class="text-xs font-bold text-blue-400">{{ $item->tanggal }}</p>
                <p class="py-1 text-lg font-semibold leading-5 tracking-tighter uppercase">{{ $item->jobfair->nama }}</p>
            </div>
        @endforeach
    </div>
</div>
