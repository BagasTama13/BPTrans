@extends('admin.layout')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Riwayat Aktivitas</h1>

    @if($riwayat->isEmpty())
        <p>Tidak ada aktivitas.</p>
    @else
        <ul class="space-y-2">
            @foreach($riwayat as $item)
                <li class="bg-white shadow p-4 rounded-lg cursor-pointer hover:bg-gray-50"
                    onclick="toggleDetail({{ $item->id }})">
                    <strong>{{ $item->tipe_aktivitas }}</strong>

                    <div id="detail-{{ $item->id }}" class="hidden mt-2 text-sm text-gray-600">
                        {{ $item->keterangan }}
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>

<script>
    function toggleDetail(id) {
        const el = document.getElementById('detail-' + id);
        el.classList.toggle('hidden');
    }
</script>
@endsection
