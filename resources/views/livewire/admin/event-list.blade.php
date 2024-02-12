<div>
    @foreach ($events as $item)
        <div class="flex justify-between">
            <div>
            {{
                Carbon\Carbon::parse($item->tanggal)
                    ->translatedFormat('l, j F Y')
            }}
            </div>
            {{-- <div class="text-left">
            {{
                Carbon\Carbon::parse($item->tanggal)
                    ->locale('id_ID')
                    ->toFormattedDateString()
            }}
            </div> --}}
            <div>
            {{
                Carbon\Carbon::parse($item->tanggal)
                    ->diffForHumans()
            }}
            </div>
            <div>
            {{ $item->jobfair->nama }}
            {{-- {{ $item->refs['lokasi'] }} --}}
            {{-- {{ $item->kehadiran->count() }} --}}
            </div>
        </div>
    @endforeach
</div>
