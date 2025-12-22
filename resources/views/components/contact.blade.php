<section id="contact-section" class="py-20 bg-white">
    <div class="container mx-auto px-6">

        {{-- Judul --}}
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-4">
                Hubungi Kami
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Jika Anda memiliki pertanyaan, ingin bekerja sama,
                atau membutuhkan informasi lebih lanjut terkait layanan
                BP Transportation, silakan hubungi kami.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            {{-- Informasi Kontak --}}
            <div class="space-y-6">
                <div>
                    <h3 class="text-xl font-bold mb-2">Alamat</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Alamat operasional BP Transportation akan
                        ditampilkan di sini.
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-bold mb-2">Telepon</h3>
                    <p class="text-gray-700 text-sm">
                        Nomor telepon akan ditampilkan di sini.
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-bold mb-2">Email</h3>
                    <p class="text-gray-700 text-sm">
                        Email resmi akan ditampilkan di sini.
                    </p>
                </div>

                <div class="text-sm text-gray-500">
                    Jam operasional mengikuti jam kerja
                    pengiriman dan administrasi.
                </div>
            </div>

            {{-- Form Kontak --}}
            <div class="border rounded-xl p-8 bg-gray-50">
                <form method="POST" action="#">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">
                            Nama
                        </label>
                        <input type="text"
                               class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
                               placeholder="Nama lengkap">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">
                            Nomor HP
                        </label>
                        <input type="text"
                               class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
                               placeholder="08xxxxxxxxxx">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">
                            Pesan
                        </label>
                        <textarea rows="4"
                                  class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
                                  placeholder="Tulis pesan Anda..."></textarea>
                    </div>

                    <button type="submit"
                            class="w-full bg-orange-500 text-white font-bold py-3 rounded-lg hover:bg-orange-600 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>

        </div>

    </div>
</section>
