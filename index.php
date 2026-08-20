<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi OSIS SMKIT Ibnul Qayyim. Wadah aspirasi, kreativitas, dan kepemimpinan siswa yang berkarakter Islami.">
    <title>OSIS SMKIT Ibnul Qayyim | Beranda</title>

    <link rel="icon" type="image/png" sizes="32x3" href="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-[#fafaf7] text-gray-800">
    <?php require_once 'includes/header.php'; ?>

    <!-- HERO -->
    <section class="relative min-h-screen flex items-center justify-center hero-overlay bg-cover bg-center" style="background-image: url('assets/Group 417.png');">
    <div class="absolute top-20 left-10 w-20 h-20 border-2 border-white/10 rounded-full float-animation"></div>
    <div class="absolute bottom-32 right-16 w-14 h-14 border-2 border-white/10 rounded-lg float-animation" style="animation-delay:2s;"></div>
    
    <!-- Ditambahkan gap-8 agar teks dan logo tidak terlalu rapat di layar desktop -->
    <div class="px-6 max-w-7xl mx-auto w-full flex flex-col md:flex-row items-center gap-8">
        
        <!-- SISI KIRI: Teks Utama & Tombol Aksi (order-2 membuat teks berada di bawah logo saat di HP) -->
        <div class="md:w-3/5 text-left order-2 md:order-1">
            <h1 class="hero-fade-up-delay text-5xl md:text-7xl font-extrabold text-white leading-[1.1] mb-6" style="font-family:'Outfit',sans-serif;">
                OSIS SMKIT<br><span class="text-[#b9b893]">Ibnul Qayyim</span>
            </h1>
            <p class="hero-fade-up-delay2 text-lg md:text-xl text-justify text-[#e8e7d4] max-w-lg mb-10 leading-relaxed">
                Wadah aspirasi, kreativitas, dan kepemimpinan siswa. Bersama membangun generasi yang Shalih, Hafidz, dan Terampil.
            </p>
            <div class="hero-fade-up-delay2 flex flex-col sm:flex-row gap-4">
                <a href="visi-misi.php" class="btn-shine inline-flex items-center justify-center bg-[#b9b893] text-[#4a4933] font-bold px-8 py-4 rounded-xl shadow-lg hover:-translate-y-1 transition-all duration-300 pulse-ring">
                    Mulai Jelajahi
                </a>
                <a href="kegiatan.php" class="inline-flex items-center justify-center border-2 border-white/30 text-white font-medium px-8 py-4 rounded-xl hover:bg-white/10 hover:-translate-y-1 transition-all duration-300 backdrop-blur-sm">
                    Lihat Kegiatan
                </a>
            </div>
        </div>
        
        <!-- SISI KANAN: Kontainer Logo OSIS Baru (order-1 membuat logo berada di atas saat di HP) -->
        <div class="w-full md:w-auto flex justify-center md:justify-start order-1 md:order-2 mb-8 md:mb-0">
            <div class="hero-fade-up">
                <!-- Ukuran dinaikkan ke md:w-80 (320px) / md:w-96 agar gagah dan seimbang dengan tinggi teks -->
                <img src="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png" 
                     class="w-48 md:w-64 lg:w-80 object-contain drop-shadow-2xl"
                     alt="Logo OSIS" 
                     onerror="this.style.display='none'">
            </div>
        </div>

    </div>

  </section>


    <!-- ABOUT -->
    <section class="py-24 bg-white" data-aos="fade-up">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6" style="font-family:'Outfit',sans-serif;">Tempat Berkembang & Berkreasi</h2>
            <p class="text-gray-500 text-lg text-center leading-relaxed max-w-3xl mx-auto">
                OSIS SMKIT Ibnul Qayyim adalah wadah bagi para siswa untuk menyalurkan aspirasi, kreativitas, dan kepemimpinan.
                Kami berkomitmen membangun lingkungan sekolah yang aktif, religius, dan berkarakter unggul.
            </p>
        </div>
    </section>

    <!-- CARDS -->
    <section class="py-24 bg-[#fafaf7]">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800" style="font-family:'Outfit',sans-serif;">Apa yang Kami Lakukan?</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <a href="visi-misi.php" class="group block bg-white p-8 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-bullseye text-xl text-[#6f6e50]"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3 text-gray-800 group-hover:text-[#6f6e50] transition-colors" style="font-family:'Outfit',sans-serif;">Visi & Misi</h3>
                    <p class="text-gray-500 leading-relaxed text-justify text-sm">Menjadi organisasi yang menumbuhkan kepemimpinan dan solidaritas siswa berdasarkan nilai Islami.</p>
                    <div class="mt-5 flex items-center text-[#b9b893] font-semibold text-sm group-hover:text-[#6f6e50] transition-colors">
                        Selengkapnya <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </a>
                <a href="struktur.php" class="group block bg-white p-8 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-xl text-[#6f6e50]"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3 text-gray-800 group-hover:text-[#6f6e50] transition-colors" style="font-family:'Outfit',sans-serif;">Struktur Organisasi</h3>
                    <p class="text-gray-500 leading-relaxed text-justify text-sm">Kenali pengurus OSIS kami yang berdedikasi membangun karakter siswa yang berakhlak mulia.</p>
                    <div class="mt-5 flex items-center text-[#b9b893] font-semibold text-sm group-hover:text-[#6f6e50] transition-colors">
                        Selengkapnya <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </a>
                <a href="kegiatan.php" class="group block bg-white p-8 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-camera text-xl text-[#6f6e50]"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3 text-gray-800 group-hover:text-[#6f6e50] transition-colors" style="font-family:'Outfit',sans-serif;">Kegiatan & Galeri</h3>
                    <p class="text-gray-500 leading-relaxed text-justify text-sm">Lihat berbagai dokumentasi kegiatan menarik OSIS SMKIT Ibnul Qayyim sepanjang tahun ajaran.</p>
                    <div class="mt-5 flex items-center text-[#b9b893] font-semibold text-sm group-hover:text-[#6f6e50] transition-colors">
                        Selengkapnya <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- STATS — Ubah angka di data-target dan teks di data-suffix sesukamu -->
    <section id="stats-section" class="py-16 bg-gradient-to-r from-[#6f6e50] to-[#8a896b]" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div>
                <div class="text-4xl font-extrabold mb-1" style="font-family:'Outfit',sans-serif;">
                    <span class="counter" data-target="30" data-suffix="+">0</span>
                </div>
                <div class="text-sm text-white/70">Pengurus Aktif</div>
            </div>
            <div>
                <div class="text-4xl font-extrabold mb-1" style="font-family:'Outfit',sans-serif;">
                    <span class="counter" data-target="20" data-suffix="+">0</span>
                </div>
                <div class="text-sm text-white/70">Program Kerja</div>
            </div>
            <div>
                <div class="text-4xl font-extrabold mb-1" style="font-family:'Outfit',sans-serif;">
                    <span class="counter" data-target="50" data-suffix="+">0</span>
                </div>
                <div class="text-sm text-white/70">Siswa Terlibat</div>
            </div>
            <div>
                <div class="text-4xl font-extrabold mb-1" style="font-family:'Outfit',sans-serif;">
                    <span class="counter" data-target="5" data-suffix="+">0</span>
                </div>
                <div class="text-sm text-white/70">Bidang Divisi</div>
            </div>
        </div>
    </section>

    <!-- Counter Animation Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.counter');
        let animated = false;

        function animateCounters() {
            if (animated) return;
            animated = true;

            counters.forEach(function (counter) {
                const target = parseInt(counter.getAttribute('data-target'), 10);
                const suffix = counter.getAttribute('data-suffix') || '';
                const duration = 2000; // durasi animasi dalam ms
                const startTime = performance.now();

                function update(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);

                    // Easing: ease-out cubic
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const current = Math.round(eased * target);

                    counter.textContent = current + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    }
                }

                requestAnimationFrame(update);
            });
        }

        // Mulai animasi saat section masuk viewport
        const section = document.getElementById('stats-section');
        if (section) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            observer.observe(section);
        }
    });
    </script>

    <!-- CTA -->
    <section class="py-24 bg-white" data-aos="fade-up">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="bg-gradient-to-br from-[#f5f5f0] to-[#e8e7d4] rounded-3xl p-12 md:p-16 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-[#b9b893]/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#6f6e50]/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" style="font-family:'Outfit',sans-serif;">Punya Ide atau Aspirasi?</h2>
                    <p class="text-gray-500 text-lg mb-8 max-w-xl mx-auto">Suaramu penting! Sampaikan ide, saran, dan aspirasi terbaikmu untuk kemajuan OSIS.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="aspirasi.php" class="btn-shine inline-flex items-center justify-center bg-[#6f6e50] text-white font-bold px-8 py-4 rounded-2xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Aspirasi
                        </a>
                        <a href="kontak.php" class="inline-flex items-center justify-center border-2 border-[#b9b893] text-[#6f6e50] font-semibold px-8 py-4 rounded-2xl hover:bg-[#6f6e50] hover:text-white hover:border-[#6f6e50] transition-all duration-300">
                            <i class="fas fa-envelope mr-2"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once 'includes/footer.php'; ?>
</body>
</html>
