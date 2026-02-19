<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan | BP Transportation</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-brown': '#7a4a2e',
                        'brand-orange': '#f97316',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">

@include('partials.header')

<section class="py-16">
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow p-8">

        <h1 class="text-2xl font-bold text-brand-brown mb-6">
            Form Pemesanan
        </h1>

        <form method="POST" action="{{ route('pemesanan.store') }}" class="space-y-5">
            @csrf

            {{-- Nama Pembeli --}}
            <div>
                <label class="text-sm font-medium">Nama Pembeli</label>
                <input type="text" name="nama_pembeli"
                       class="w-full border rounded-lg px-4 py-2"
                       required>
            </div>

            {{-- Produk (FIX / READ ONLY) --}}
            <div>
                <label class="text-sm font-medium">Produk</label>

                {{-- Tampilan --}}
                <input type="text"
                       value="{{ ucfirst(str_replace('_',' ',$namaProduk)) }}"
                       class="w-full border rounded-lg px-4 py-2 bg-gray-100 cursor-not-allowed"
                       readonly>

                {{-- Data dikirim --}}
                <input type="hidden"
                       name="produk"
                       id="produkHidden"
                       value="{{ $namaProduk }}"
                       data-need-pickup="{{ strtolower($namaProduk) === 'pengiriman' ? '1' : '0' }}">
            </div>

            {{-- Tipe Produk Card --}}
  <div class="flex space-x-4 overflow-x-auto py-2 hide-scrollbar mt-2">
    @foreach($produkList as $produk)
        @if(strtolower($produk['nama_produk']) == strtolower($namaProduk))
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex-shrink-0 w-48 p-4 cursor-pointer tipe-card text-center text-sm"
             data-tipe="{{ $produk['tipe_produk'] }}"
             data-harga="{{ $produk['harga'] }}"
             data-image="{{ $produk['image'] }}">

            <img src="{{ asset('storage/' . $produk['image']) }}"
                 alt="{{ $produk['tipe_produk'] }}"
                 class="w-full h-32 object-cover mb-1 rounded">

            {{-- Tipe Produk --}}
            <h4 class="font-semibold text-md mb-1">
                {{ $produk['tipe_produk'] }}
            </h4>

            {{-- Deskripsi --}}
            <p class="text-sm text-gray-600 line-clamp-3 mb-2">
                {{ $produk['deskripsi'] ?? 'Produk siap kirim.' }}
            </p>

            {{-- Harga --}}
            <p class="text-sm font-semibold text-brand-brown">
                Rp {{ number_format($produk['harga'],0,',','.') }}
            </p>
        </div>
        @endif
    @endforeach
</div>

            {{-- Tipe Produk Hidden --}}
            <input type="hidden" name="tipe_produk" id="tipeHidden">
            <input type="hidden" name="harga" id="hargaHidden">

            {{-- Jumlah --}}
            <div>
                <label class="text-sm font-medium">Jumlah</label>
                <input type="number"
                       id="jumlah"
                       name="jumlah"
                       class="w-full border rounded-lg px-4 py-2"
                       min="1"
                       required>
            </div>

            {{-- Estimasi Harga --}}
            <div id="hargaBox" class="hidden bg-gray-100 p-4 rounded-lg">
                <p class="text-sm text-gray-600">Estimasi Harga</p>
                <p id="hargaText" class="font-semibold text-lg text-brand-brown"></p>
            </div>

            {{-- Alamat Penjemputan --}}
            <div id="alamatPenjemputanField" class="hidden">
                <label class="text-sm font-medium">Alamat Penjemputan</label>
                <input type="text"
                       name="alamat_penjemputan"
                       class="w-full border rounded-lg px-4 py-2">
            </div>

            {{-- Alamat Tujuan --}}
            <div>
                <label class="text-sm font-medium">Alamat Tujuan</label>
                <input type="text"
                       name="alamat"
                       class="w-full border rounded-lg px-4 py-2"
                       required>
            </div>

            {{-- Catatan --}}
            <div>
                <label class="text-sm font-medium">Catatan</label>
                <textarea name="catatan"
                          rows="3"
                          class="w-full border rounded-lg px-4 py-2"></textarea>
            </div>

            {{-- WhatsApp --}}
            <div>
                <label class="text-sm font-medium">No WhatsApp</label>
                <input type="tel"
                       name="whatsapp"
                       class="w-full border rounded-lg px-4 py-2"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-gradient-to-br from-[#14532d] via-[#052e16] to-[#020617] text-white py-3 rounded-lg hover:bg-opacity-90">
                Kirim Pemesanan
            </button>
        </form>

        @if(session('success'))
    <div class="mb-5 px-4 py-3 rounded-lg bg-green-100 border border-green-300 text-green-800">
        {{ session('success') }}
    </div>
@endif

    </div>
</section>

{{-- JavaScript --}}
<script>
const produkHidden = document.getElementById('produkHidden');
const tipeHidden = document.getElementById('tipeHidden');
const hargaHidden = document.getElementById('hargaHidden');
const jumlahInput = document.getElementById('jumlah');
const hargaBox = document.getElementById('hargaBox');
const hargaText = document.getElementById('hargaText');
const alamatPenjemputanField = document.getElementById('alamatPenjemputanField');

// Klik card tipe produk
document.querySelectorAll('.tipe-card').forEach(card => {
    card.addEventListener('click', () => {
        // Set hidden input
        tipeHidden.value = card.dataset.tipe;
        hargaHidden.value = card.dataset.harga;

        // Highlight card aktif
        document.querySelectorAll('.tipe-card').forEach(c => c.classList.remove('ring-2', 'ring-brand-brown'));
        card.classList.add('ring-2', 'ring-brand-brown');

        // Update harga estimasi
        updateHarga();
    });
});

function updateHarga() {
    const qty = parseInt(jumlahInput.value) || 0;
    const harga = parseInt(hargaHidden.value) || 0;

    if(qty <= 0 || harga <= 0){
        hargaBox.classList.add('hidden');
        return;
    }

    const total = qty * harga;
    hargaText.innerText = 'Rp ' + total.toLocaleString('id-ID');
    hargaBox.classList.remove('hidden');
}

function updateAlamatPenjemputan() {
    const needPickup = produkHidden.dataset.needPickup === '1';
    alamatPenjemputanField.classList.toggle('hidden', !needPickup);
}

// Event jumlah
jumlahInput.addEventListener('input', updateHarga);

// Init
updateAlamatPenjemputan();
updateHarga();
</script>

</body>
</html>
