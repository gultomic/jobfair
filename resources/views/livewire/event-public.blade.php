@php
    $today = $collection->where('tanggal', '=', Carbon\Carbon::now()->format('Y-m-d'));
    $soon = $collection->where('tanggal', '>', Carbon\Carbon::now()->format('Y-m-d'));
    $held = $collection->where('tanggal', '<', Carbon\Carbon::now()->format('Y-m-d'));
@endphp

<div class="sm:py-6">
    <p class="px-4">Job Fair hari ini:</p>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:gap-8">
        @foreach ($today as $item)
            <a href="/event/{{ $item->id }}" class="p-4 border rounded-lg cursor-pointer bg-sky-100 border-sky-300 hover:border-sky-500">
                <p class="text-2xl font-black tracking-tighter uppercase">{{ $item->jobfair->nama }}</p>
                <p>{{ $item->refs['lokasi'] }}</p>
            </a>
        @endforeach
    </div>

    <p class="px-4 pt-6">Job Fair akan datang:</p>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-4 lg:gap-8">
        @foreach ($soon as $item)
            <div class="p-4 border rounded-lg bg-emerald-50 border-emerald-300">
                <p class="text-xs font-bold text-blue-400">{{ $item->tanggal }}</p>
                <p class="py-1 text-lg font-black leading-5 tracking-tighter uppercase">{{ $item->jobfair->nama }}</p>
                <p>{{ $item->refs['lokasi'] }}</p>
            </div>
        @endforeach
    </div>

    <p class="px-4 pt-6">Job Fair selesai:</p>
    <div class="grid grid-cols-2 gap-1 md:grid-cols-6 lg:gap-2">
        @foreach ($held as $item)
            <div class="p-4 bg-white border rounded-lg">
                <p class="text-xs font-bold text-blue-400">{{ $item->tanggal }}</p>
                <p class="py-1 text-lg font-black leading-5 tracking-tighter uppercase">{{ $item->jobfair->nama }}</p>
            </div>
        @endforeach
    </div>
</div>
