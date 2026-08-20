<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi | OSIS SMKIT Ibnul Qayyim</title>

    <link rel="icon" type="image/png" sizes="32x32" href="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-[#fafaf7] text-gray-800">
    <?php require_once 'includes/header.php'; ?>

    <!-- PAGE HEADER -->
    <!-- <header class="pt-32 pb-20 bg-gradient-to-br from-[#6f6e50] to-[#8a896b] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10" data-aos="fade-down">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4" style="font-family:'Outfit',sans-serif;">Visi & Misi</h1>
            <p class="text-white/80 mt-4 max-w-2xl text-lg leading-relaxed">Landasan utama OSIS SMKIT Ibnul Qayyim dalam bergerak dan menginspirasi.</p>
        </div>

    </header> -->
    <section class="relative min-h-screen flex items-center justify-center hero-overlay bg-cover bg-center" style="background-image: url('assets/Group 417.png');">
    <div class="absolute top-20 left-10 w-20 h-20 border-2 border-white/10 rounded-full float-animation"></div>
    <div class="absolute bottom-32 right-16 w-14 h-14 border-2 border-white/10 rounded-lg float-animation" style="animation-delay:2s;"></div>
    
    <!-- Ditambahkan gap-8 agar teks dan logo tidak terlalu rapat di layar desktop -->
    <div class="px-6 max-w-7xl mx-auto w-full flex flex-col md:flex-row items-center gap-8">
        
        <!-- SISI KIRI: Teks Utama & Tombol Aksi (order-2 membuat teks berada di bawah logo saat di HP) -->
        <div class="md:w-3/5 text-left order-2 md:order-1">
            <h1 class="hero-fade-up-delay text-5xl md:text-7xl font-extrabold text-white leading-[1.1] mb-6" style="font-family:'Outfit',sans-serif;">
                Visi & Misi<br><span class="text-[#b9b893]"></span>
            </h1>
            <p class="hero-fade-up-delay2 text-lg md:text-xl text-justify text-[#e8e7d4] max-w-lg mb-10 leading-relaxed">
                Berlandaskan nilai Islami, organisasi berkomitmen penuh untuk mencetak generasi masa depan yang seimbang secara spiritual, intelektual, dan praktis demi mewujudkan profil generasi yang Shalih, Hafidz, dan Terampil.
            </p>
            <!-- <div class="hero-fade-up-delay2 flex flex-col sm:flex-row gap-4">
                <a href="visi-misi.php" class="btn-shine inline-flex items-center justify-center bg-[#b9b893] text-[#4a4933] font-bold px-8 py-4 rounded-xl shadow-lg hover:-translate-y-1 transition-all duration-300 pulse-ring">
                    Mulai Jelajahi
                </a>
                <a href="kegiatan.php" class="inline-flex items-center justify-center border-2 border-white/30 text-white font-medium px-8 py-4 rounded-xl hover:bg-white/10 hover:-translate-y-1 transition-all duration-300 backdrop-blur-sm">
                    Lihat Kegiatan
                </a>
            </div> -->
        </div>
        
        <!-- SISI KANAN: Kontainer Logo OSIS Baru (order-1 membuat logo berada di atas saat di HP) -->
        <div class="w-full md:w-auto flex justify-center md:justify-start order-1 md:order-2 mb-8 md:mb-0">
            <div class="hero-fade-up">
                <!-- Ukuran w-36 di HP dan md:w-52 di laptop agar lebih pas secara visual -->
                <img src="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png" 
                     class="w-48 md:w-64 lg:w-80 object-contain drop-shadow-2xl" 
                     alt="Logo OSIS" 
                     onerror="this.style.display='none'">
            </div>
        </div>

    </div>
  </section>

    <!-- VISI -->
    <section class="py-24 bg-white" data-aos="fade-up">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <span class="inline-block text-[#b9b893] font-semibold text-sm tracking-[0.15em] uppercase mb-3">Arah Tujuan</span>
            <div class="section-line"></div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8" style="font-family:'Outfit',sans-serif;">Visi</h2>
            <div class="relative">
                <i class="fas fa-quote-left text-5xl text-[#b9b893]/20 absolute -top-4 -left-2"></i>
                <p class="text-gray-600 text-xl leading-relaxed italic px-8">
                    Menjadi organisasi siswa yang unggul, berkarakter Islami, dan mampu menjadi teladan dalam disiplin, tanggung
                    jawab, serta solidaritas.
                </p>
                <i class="fas fa-quote-right text-5xl text-[#b9b893]/20 absolute -bottom-4 -right-2"></i>
            </div>
        </div>
    </section>

    <!-- MISI -->
    <section class="py-24 bg-[#fafaf7]" data-aos="fade-up">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-14">
                <span class="inline-block text-[#b9b893] font-semibold text-sm tracking-[0.15em] uppercase mb-3">Langkah Nyata</span>
                <div class="section-line"></div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800" style="font-family:'Outfit',sans-serif;">Misi Kami</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex gap-5" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center shrink-0">
                        <span class="text-[#6f6e50] font-bold text-lg" style="font-family:'Outfit',sans-serif;">01</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed">Menumbuhkan semangat kepemimpinan yang amanah dan disiplin.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex gap-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center shrink-0">
                        <span class="text-[#6f6e50] font-bold text-lg" style="font-family:'Outfit',sans-serif;">02</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed">Mengembangkan kreativitas serta inovasi dalam kegiatan sekolah.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex gap-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center shrink-0">
                        <span class="text-[#6f6e50] font-bold text-lg" style="font-family:'Outfit',sans-serif;">03</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed">Meningkatkan kerja sama dan rasa tanggung jawab antar siswa.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex gap-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center shrink-0">
                        <span class="text-[#6f6e50] font-bold text-lg" style="font-family:'Outfit',sans-serif;">04</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed">Mewujudkan kegiatan positif yang berdampak pada lingkungan sosial.</p>
                </div>
            </div>
        </div>
    </section>

    <?php require_once 'includes/footer.php'; ?>
</body>
</html>
