<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan | BP Transportation</title>

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

@php
    $produk = request('produk');
@endphp

<section class="py-16">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-8">

        <h1 class="text-2xl font-bold text-brand-brown mb-6">
            Form Pemesanan
        </h1>

        <form id="orderForm" class="space-y-5">

            {{-- Nama --}}
            <div>
                <label class="text-sm font-medium">Nama Pembeli</label>
                <input type="text" class="w-full border rounded-lg px-4 py-2" required>
            </div>

            {{-- Produk --}}
            <div>
                <label class="text-sm font-medium">Produk</label>
                <input type="text"
                       value="{{ ucfirst(str_replace('_',' ',$produk)) }}"
                       class="w-full border rounded-lg px-4 py-2 bg-gray-100"
                       readonly>
            </div>

            {{-- Tipe Batu Bata --}}
            <div id="batuBataField" class="hidden">
                <label class="text-sm font-medium">Tipe Batu Bata</label>
                <select id="batuType" class="w-full border rounded-lg px-4 py-2">
                    <option value="800">Standar</option>
                    <option value="1200">Premium</option>
                </select>
            </div>

            {{-- Jenis Genteng --}}
            <div id="gentengField" class="hidden">
                <label class="text-sm font-medium">Jenis Genteng</label>
                <select id="gentengType" class="w-full border rounded-lg px-4 py-2">
                    <option value="1500">Mantili</option>
                    <option value="1700">Super</option>
                    <option value="1900">Sokka</option>
                    <option value="2100">Flat (Press)</option>
                    <option value="2500">Premium</option>
                </select>
            </div>

            {{-- Jenis Barang Pengiriman --}}
            <div id="pengirimanField" class="hidden">
                <label class="text-sm font-medium">Jenis Barang Dikirim</label>
                <input type="text" class="w-full border rounded-lg px-4 py-2"
                       placeholder="Perabot, kendaraan, stand, dll">
            </div>

            {{-- Jumlah --}}
            <div id="jumlahField">
                <label class="text-sm font-medium">Jumlah Pesanan</label>
                <input type="number" id="jumlah"
                       class="w-full border rounded-lg px-4 py-2"
                       min="1">
                <p id="satuan" class="text-sm text-gray-500 mt-1"></p>
            </div>

            {{-- Harga --}}
            <div id="hargaBox" class="hidden bg-gray-100 p-4 rounded-lg">
                <p class="text-sm text-gray-600">Estimasi Harga</p>
                <p id="hargaText" class="font-semibold text-lg text-brand-brown"></p>
            </div>

            {{-- Alamat --}}
            <div>
                <label class="text-sm font-medium">Alamat Tujuan</label>
                <input type="text" class="w-full border rounded-lg px-4 py-2"
                       placeholder="Desa, Kota">
            </div>

            {{-- Catatan --}}
            <div>
                <label class="text-sm font-medium">Detail / Catatan</label>
                <textarea rows="3"
                          class="w-full border rounded-lg px-4 py-2"
                          placeholder="Detail alamat, patokan, atau catatan tambahan"></textarea>
            </div>

            {{-- WhatsApp --}}
            <div>
                <label class="text-sm font-medium">No WhatsApp</label>
                <input type="tel" class="w-full border rounded-lg px-4 py-2"
                       placeholder="08xxxxxxxxxx" required>
            </div>

            <button type="submit"
                    class="w-full bg-brand-brown text-white py-3 rounded-lg">
                Kirim Pemesanan
            </button>

        </form>
    </div>
</section>

<script>
    const produk = "{{ $produk }}";
    const jumlahInput = document.getElementById('jumlah');
    const hargaBox = document.getElementById('hargaBox');
    const hargaText = document.getElementById('hargaText');
    const satuan = document.getElementById('satuan');

    let hargaSatuan = 0;

    if (produk === 'kayu') {
        hargaSatuan = 150000;
        satuan.innerText = '/ bak';
    }

    if (produk === 'batu_bata') {
        document.getElementById('batuBataField').classList.remove('hidden');
        satuan.innerText = '/ pcs';
    }

    if (produk === 'genteng') {
        document.getElementById('gentengField').classList.remove('hidden');
        satuan.innerText = '/ pcs';
    }

    if (produk === 'pengiriman') {
        document.getElementById('pengirimanField').classList.remove('hidden');
        document.getElementById('jumlahField').classList.add('hidden');
    }

    function hitungHarga() {
        let qty = jumlahInput.value;
        let total = 0;

        if (produk === 'batu_bata') {
            total = qty * document.getElementById('batuType').value;
        } else if (produk === 'genteng') {
            total = qty * document.getElementById('gentengType').value;
        } else {
            total = qty * hargaSatuan;
        }

        if (total > 0) {
            hargaBox.classList.remove('hidden');
            hargaText.innerText = 'Rp ' + total.toLocaleString('id-ID');
        }
    }

    jumlahInput?.addEventListener('input', hitungHarga);
    document.getElementById('batuType')?.addEventListener('change', hitungHarga);
    document.getElementById('gentengType')?.addEventListener('change', hitungHarga);
</script>

</body>
</html>
