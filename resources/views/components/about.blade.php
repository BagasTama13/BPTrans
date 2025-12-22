<style>
    /* CSS Kustom untuk menyembunyikan Scrollbar */
    .hide-scrollbar {
        -ms-overflow-style: none;  /* IE dan Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .hide-scrollbar::-webkit-scrollbar {
        display: none; /* Chrome, Safari and Opera */
    }
    
    /* Memastikan track terlihat jelas di mobile dengan padding yang cukup */
    #about-track-wrapper {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    /* Style dasar kartu saat tidak aktif */
    .about-card {
        transform-origin: center;
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out; 
    }

    /* Style untuk tombol, pastikan z-index tinggi agar selalu di atas */
    .about-nav-btn {
        /* z-index diterapkan eksplisit di HTML untuk memastikan stacking */
        @apply w-12 h-12 flex items-center justify-center text-xl text-brand-brown hover:text-brand-orange transition duration-200 focus:outline-none;
    }
</style>

<section id="about-section" class="py-16 md:py-24 overflow-hidden relative">
    
    <div class="absolute inset-0 bg-brand-brown">
        <div class="absolute inset-0 bg-repeat opacity-10" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMSIgZmlsbD0icmdoYShhbiwyNTUsIDI1NSwgMjU1LCAwLjIyIi8+PC9zdmc+')"></div>
        
        <div class="absolute -top-10 -left-10 w-96 h-96 bg-brand-orange/10 rounded-full blur-3xl hidden md:block"></div>
        <div class="absolute -bottom-10 -right-10 w-80 h-80 bg-brand-red/10 rounded-full blur-3xl opacity-70"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">

        <div class="text-center mb-12 md:mb-16 animate-fadeInSlow">
            <span class="inline-block px-4 py-1.5 rounded-full bg-brand-orange text-white text-sm font-bold uppercase tracking-wider shadow-lg">
                Kenapa Harus Kursus di
            </span>
            <h2 class="mt-4 outfit text-4xl md:text-5xl font-extrabold text-white leading-tight">
                <span class="text-brand-orange inline-block transform hover:scale-[1.05] transition duration-200 cursor-default">English Cafe</span>
            </h2>
            <p class="mt-3 text-lg text-white/90 max-w-4xl mx-auto">
                English Cafe tempat anak Anda belajar, dan merupakan lembaga yang sudah teruji dan terpercaya di Indonesia.
            </p>
        </div>

        <div class="relative mt-8"> 

            <div id="about-track-wrapper" class="overflow-x-scroll hide-scrollbar snap-x snap-mandatory -mx-6 px-6 md:mx-0 md:px-0">
                
                <div id="about-track" class="flex space-x-6">

                    <div class="about-card flex-shrink-0 w-11/12 md:w-80 snap-center bg-white p-6 md:p-8 rounded-2xl shadow-xl hover:shadow-brand-orange/40 transition duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 bg-brand-red/10 text-brand-red rounded-full flex items-center justify-center text-xl mb-3">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-brown mb-2">Berdiri Sejak 2012</h3>
                        <p class="text-gray-600 text-sm">
                            English Cafe, berpengalaman 13 tahun! Belajar Bahasa Inggris jadi menyenangkan dan efektif bersama lembaga yang sudah teruji.
                        </p>
                    </div>

                    <div class="about-card flex-shrink-0 w-11/12 md:w-80 snap-center bg-white p-6 md:p-8 rounded-2xl shadow-xl hover:shadow-brand-terra/40 transition duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 bg-brand-terra/10 text-brand-terra rounded-full flex items-center justify-center text-xl mb-3">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-brown mb-2">16 Cabang di 7 Kota</h3>
                        <p class="text-gray-600 text-sm">
                            English Cafe hadir di berbagai kota besar seperti Bandung, Jogja, Semarang, Solo, Malang, Pamekasan dan Padang. Akses belajar Bahasa Inggris yang lebih dekat dari kamu!
                        </p>
                    </div>

                    <div class="about-card flex-shrink-0 w-11/12 md:w-80 snap-center bg-white p-6 md:p-8 rounded-2xl shadow-xl hover:shadow-brand-orange/40 transition duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 bg-brand-orange/10 text-brand-orange rounded-full flex items-center justify-center text-xl mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-brown mb-2">Lebih dari 39.000 Member</h3>
                        <p class="text-gray-600 text-sm">
                            Lebih dari 39.000 member sudah ngerasain serunya belajar di sini. Jadi kamu nggak sendirian, ada komunitas besar yang tumbuh bareng English Cafe.
                        </p>
                    </div>

                    <div class="about-card flex-shrink-0 w-11/12 md:w-80 snap-center bg-white p-6 md:p-8 rounded-2xl shadow-xl hover:shadow-brand-red/40 transition duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 bg-brand-red/10 text-brand-red rounded-full flex items-center justify-center text-xl mb-3">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-brown mb-2">Dipercaya oleh 600 Brand</h3>
                        <p class="text-gray-600 text-sm">
                            Bukan cuma individu, tapi juga lebih dari 600 brand dan institusi profesional yang percaya pada English Cafe.
                        </p>
                    </div>

                    <div class="about-card flex-shrink-0 w-11/12 md:w-80 snap-center bg-white p-6 md:p-8 rounded-2xl shadow-xl hover:shadow-brand-terra/40 transition duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 bg-brand-terra/10 text-brand-terra rounded-full flex items-center justify-center text-xl mb-3">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-brown mb-2">Ratusan Project Penelitian</h3>
                        <p class="text-gray-600 text-sm">
                            Bukan cuma populer di kalangan Profesional, English Cafe juga jadi topik penelitian akademik karena konsep uniknya dalam belajar bahasa Inggris.
                        </p>
                    </div>

                    <div class="about-card flex-shrink-0 w-11/12 md:w-80 snap-center bg-white p-6 md:p-8 rounded-2xl shadow-xl hover:shadow-brand-orange/40 transition duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 bg-brand-orange/10 text-brand-orange rounded-full flex items-center justify-center text-xl mb-3">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-brown mb-2">Terbaik versi BIDC</h3>
                        <p class="text-gray-600 text-sm">
                            English Cafe dinobatkan sebagai lembaga kursus bahasa Inggris terbaik versi BIDC di Bandung.
                        </p>
                    </div>
                    
                    <div class="about-card flex-shrink-0 w-11/12 md:w-80 snap-center bg-white p-6 md:p-8 rounded-2xl shadow-xl hover:shadow-brand-red/40 transition duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 bg-brand-red/10 text-brand-red rounded-full flex items-center justify-center text-xl mb-3">
                            <i class="fas fa-user-circle"></i> 
                        </div>
                        <h3 class="text-xl font-bold text-brand-brown mb-2">Ditemani Personal Chef</h3>
                        <p class="text-gray-600 text-sm">
                            Belajar Bahasa Inggris bareng mentor asik yang siap membimbingmu sampai mahir.
                        </p>
                    </div>

                    <div class="about-card flex-shrink-0 w-11/12 md:w-80 snap-center bg-white p-6 md:p-8 rounded-2xl shadow-xl hover:shadow-brand-terra/40 transition duration-300 transform hover:-translate-y-1">
                        <div class="w-10 h-10 bg-brand-terra/10 text-brand-terra rounded-full flex items-center justify-center text-xl mb-3">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-brown mb-2">Our Brand</h3>
                        <p class="text-gray-600 text-sm">
                            English Cafe juga memiliki anak usaha. Diantaranya, Jam Belajar, fokus pada kelas public speaking. Kamar Tamu dengan 13 unit villa di Jogja dan Imersa bergerak di digital marketing.
                        </p>
                    </div>

                </div>
            </div>
            <button id="about-prev" class="about-nav-btn hidden md:block absolute left-0 top-1/2 transform -translate-y-1/2 bg-white/70 hover:bg-white/90 p-3 rounded-full shadow-lg transition-all duration-300 -ml-4 z-50">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <button id="about-next" class="about-nav-btn hidden md:block absolute right-0 top-1/2 transform -translate-y-1/2 bg-white/70 hover:bg-white/90 p-3 rounded-full shadow-lg transition-all duration-300 -mr-4 z-50">
                <i class="fas fa-chevron-right"></i>
            </button>

        </div> 
        <div class="mt-16 text-center">
            <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-4">Belajar English? Nggak Perlu Kaku Kok!</h3>
            <p class="text-white/80 max-w-2xl mx-auto mb-6">
                Kami mewujudkan belajar bahasa Inggris yang menyenangkan dan efektif untuk anak, didukung oleh lembaga yang sudah teruji.
            </p>
            <a href="#program-section" class="inline-block px-8 py-3 bg-brand-orange text-white text-lg font-bold rounded-full shadow-lg hover:bg-brand-red transition duration-300 transform hover:scale-105">
                Program English Cafe Kids <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const trackWrapper = document.getElementById('about-track-wrapper');
        const track = document.getElementById('about-track');
        const prevButton = document.getElementById('about-prev');
        const nextButton = document.getElementById('about-next');
        const realCards = Array.from(track.children);
        
        if (!trackWrapper || realCards.length === 0) return;

        const totalCards = realCards.length;
        let currentCardIndex = 0; 
        
        let isAutoScrolling = false; 
        let autoSlideTimeout; 

        // Konstanta
        const SLIDE_INTERVAL = 4000; // DIUBAH: Jeda antar slide 4 detik (4000ms)
        const SCROLL_DURATION = 500; 
        
        // --- LOGIKA KLONING ---
        // Kloning kartu terakhir di awal, dan kartu pertama di akhir
        const lastCardClone = realCards[totalCards - 1].cloneNode(true);
        lastCardClone.classList.add('clone-last');
        track.prepend(lastCardClone);

        const firstCardClone = realCards[0].cloneNode(true);
        firstCardClone.classList.add('clone-first');
        track.appendChild(firstCardClone);
        
        const allCards = Array.from(track.children);
        
        // Indeks kartu nyata (kartu asli) dalam array allCards
        const REAL_START_INDEX = 1; 
        const REAL_END_INDEX = totalCards; 

        
        // UTILITAS: Fungsi untuk mendapatkan nilai scrollLeft agar kartu di tengah viewport
        function getScrollLeftForCenter(card) {
            if (!card) return 0;
            const trackWidth = trackWrapper.clientWidth;
            const cardWidth = card.offsetWidth;
            
            // Perhitungan selalu untuk menempatkan kartu di tengah (sesuai snap-center)
            return card.offsetLeft - ((trackWidth - cardWidth) / 2);
        }

        // 1. Fungsi Kontrol Auto-Slide (Timeout Rekursif/Berantai)
        function startAutoSlide() {
            stopAutoSlide(); 
            
            autoSlideTimeout = setTimeout(() => {
                const nextIndex = (currentCardIndex + 1) % totalCards;
                scrollToCard(nextIndex, true, true); 
            }, SLIDE_INTERVAL);
        }

        function stopAutoSlide() {
            clearTimeout(autoSlideTimeout);
        }

        // 2. Fungsi untuk Scroll ke Kartu tertentu
        function scrollToCard(index, smooth = true, isFromAutoSlide = false) {
            const targetIndexInAllCards = index + REAL_START_INDEX; 
            const targetCard = allCards[targetIndexInAllCards];

            currentCardIndex = index; 
            
            if (smooth && isFromAutoSlide) {
                isAutoScrolling = true;
            }

            const targetScrollLeft = getScrollLeftForCenter(targetCard);

            trackWrapper.scrollTo({
                left: targetScrollLeft, 
                behavior: smooth ? 'smooth' : 'auto'
            });
            
            if (isFromAutoSlide) {
                setTimeout(() => {
                    isAutoScrolling = false; 
                    
                    // Logika untuk melakukan teleportasi instan saat mencapai klon
                    if (index === totalCards - 1) { // Jika baru saja menavigasi ke kartu nyata terakhir
                        scrollToCard(0, false);
                    } else {
                        startAutoSlide();
                    }
                    
                }, SCROLL_DURATION + 50); 
            }
        }

        // 3. Listener untuk tombol panah
        if (prevButton && nextButton) {
            prevButton.addEventListener('click', () => {
                stopAutoSlide();
                const prevIndex = (currentCardIndex - 1 + totalCards) % totalCards;
                scrollToCard(prevIndex);
                setTimeout(startAutoSlide, SLIDE_INTERVAL); 
            });

            nextButton.addEventListener('click', () => {
                stopAutoSlide();
                const nextIndex = (currentCardIndex + 1) % totalCards;
                scrollToCard(nextIndex);
                setTimeout(startAutoSlide, SLIDE_INTERVAL);
            });
        }

        // 4. Deteksi posisi scroll (Logika Looping Reset HANYA untuk scroll manual)
        let scrollTimeout;

        trackWrapper.addEventListener('scroll', () => {
            if (isAutoScrolling) return; 
            stopAutoSlide(); 
            
            const centeredFirstCardPos = getScrollLeftForCenter(allCards[REAL_START_INDEX]);
            const centeredLastCardPos = getScrollLeftForCenter(allCards[REAL_END_INDEX]);
            
            const firstCloneOffset = allCards[REAL_END_INDEX + 1].offsetLeft; 
            const lastCloneOffset = allCards[REAL_START_INDEX - 1].offsetLeft; 
            
            // --- LOGIKA RESET INSTAN UNTUK LOOPING ---
            
            // Reset maju: Jika scroll melewati batas akhir (klon pertama di akhir)
            if (trackWrapper.scrollLeft >= firstCloneOffset) {
                trackWrapper.scrollLeft = centeredFirstCardPos; 
                currentCardIndex = 0;
            } 
            
            // Reset mundur: Jika scroll melewati batas awal (klon terakhir di awal)
            else if (trackWrapper.scrollLeft <= lastCloneOffset) {
                trackWrapper.scrollLeft = centeredLastCardPos;
                currentCardIndex = totalCards - 1;
            }

            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(function() {
                
                // Hitung kartu terdekat saat scroll manual berhenti (targetnya center)
                let closestIndex = 0; 
                let minDistance = Infinity;
                
                const currentScroll = trackWrapper.scrollLeft;

                for (let i = REAL_START_INDEX; i <= REAL_END_INDEX; i++) {
                    const card = allCards[i];
                    
                    // Target scroll position yang membuat kartu berada di tengah
                    const targetScroll = getScrollLeftForCenter(card);
                    
                    const distance = Math.abs(currentScroll - targetScroll);

                    if (distance < minDistance) {
                        minDistance = distance;
                        closestIndex = i - REAL_START_INDEX; 
                    }
                }

                if (closestIndex !== currentCardIndex) {
                    currentCardIndex = closestIndex;
                }

                // Mulai kembali auto-slide setelah scroll manual (drag/swipe) berakhir
                startAutoSlide(); 
            }, 50); 
            
        });


        // 5. Jeda auto-slide saat interaksi hover/touch
        trackWrapper.addEventListener('mouseenter', stopAutoSlide);
        trackWrapper.addEventListener('mouseleave', startAutoSlide);
        trackWrapper.addEventListener('touchstart', stopAutoSlide);
        trackWrapper.addEventListener('touchend', startAutoSlide); 
        
        // 6. Inisialisasi Awal
        if (allCards[REAL_START_INDEX]) {
             scrollToCard(0, false); 
        }
        
        // Mulai auto-slide
        startAutoSlide(); 
    });
</script>