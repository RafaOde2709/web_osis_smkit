<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi | OSIS SMKIT Ibnul Qayyim</title>

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
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4" style="font-family:'Outfit',sans-serif;">Struktur Organisasi</h1>
            <p class="text-white/80 mt-4 max-w-2xl text-lg leading-relaxed">Susunan kepengurusan OSIS SMKIT Ibnul Qayyim Tahun Ajaran 2025.</p>
        </div>
    </header> -->

    <!-- Header Struktur Organisasi -->
     <section class="relative min-h-screen flex items-center justify-center hero-overlay bg-cover bg-center" style="background-image: url('assets/Group 417.png');">
    <div class="absolute top-20 left-10 w-20 h-20 border-2 border-white/10 rounded-full float-animation"></div>
    <div class="absolute bottom-32 right-16 w-14 h-14 border-2 border-white/10 rounded-lg float-animation" style="animation-delay:2s;"></div>
    
    <!-- Ditambahkan gap-8 agar teks dan logo tidak terlalu rapat di layar desktop -->
    <div class="px-6 max-w-7xl mx-auto w-full flex flex-col md:flex-row items-center gap-8">
        
        <!-- SISI KIRI: Teks Utama & Tombol Aksi (order-2 membuat teks berada di bawah logo saat di HP) -->
        <div class="md:w-3/5 text-left order-2 md:order-1">
            <h1 class="hero-fade-up-delay text-5xl md:text-7xl font-extrabold text-white leading-[1.1] mb-6" style="font-family:'Outfit',sans-serif;">
                Struktur Organisasi<br><span class="text-[#b9b893]"></span>
            </h1>
            <p class="hero-fade-up-delay2 text-lg md:text-xl text-justify text-[#e8e7d4] max-w-lg mb-10 leading-relaxed">
                Struktur organisasi wadah siswa ini berfokus pada pembentukan karakter shalih, hafidz, dan terampil. Posisi utama dipimpin oleh Pembina, Ketua, Wakil Ketua, Sekretaris, dan Bendahara, yang membawahi bidang-bidang pengembangan kreativitas, kepemimpinan, serta pembinaan keagamaan.
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


    <!-- LAKI-LAKI -->
    <section class="max-w-5xl mx-auto px-6 py-20">
        <div class="mb-16 text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800" style="font-family:'Outfit',sans-serif;">Struktur Kepengurusan Ikhwan</h2>
            <p class="text-gray-500 mt-3 text-sm">Susunan pengurus OSIS putra periode aktif</p>
        </div>

        <!-- === ORG CHART HIERARCHY === -->
        <div class="flex flex-col items-center">

            <!-- LEVEL 1: Ketua OSIS -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500 group text-center w-full max-w-xs" data-aos="fade-up">
                <div class="w-24 h-24 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center overflow-hidden">
                    <img src="assets/icons/ikhwan_avatar.svg" class="w-16 group-hover:scale-110 transition-transform" alt="Ketua OSIS">
                </div>
                <span class="inline-block bg-[#6f6e50] text-white text-xs px-3 py-1 rounded-lg font-bold uppercase tracking-wider mb-3">Ketua OSIS</span>
                <h3 class="font-bold text-lg text-gray-800" style="font-family:'Poppins',sans-serif;">Azzam Arditia Reymizar</h3>
            </div>

            <!-- Connector: vertical line -->
            <div class="w-0.5 h-10 bg-[#c8c8a9]"></div>

            <!-- Connector: horizontal T-branch -->
            <div class="relative w-full max-w-lg">
                <div class="absolute top-0 left-1/4 right-1/4 h-0.5 bg-[#c8c8a9]"></div>
                <div class="absolute top-0 left-1/4 w-0.5 h-6 bg-[#c8c8a9]"></div>
                <div class="absolute top-0 right-1/4 w-0.5 h-6 bg-[#c8c8a9]"></div>
                <div class="h-6"></div>
            </div>

            <!-- LEVEL 2: Sekretaris & Bendahara -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-lg">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500 group text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center overflow-hidden">
                        <img src="assets/icons/ikhwan_avatar.svg" class="w-14 group-hover:scale-110 transition-transform" alt="Sekretaris">
                    </div>
                    <span class="inline-block bg-[#8a896b] text-white text-xs px-3 py-1 rounded-lg font-bold uppercase tracking-wider mb-2">Sekretaris</span>
                    <h3 class="font-bold text-base text-gray-800" style="font-family:'Poppins',sans-serif;">[Nama Sekretaris]</h3>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500 group text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center overflow-hidden">
                        <img src="assets/icons/ikhwan_avatar.svg" class="w-14 group-hover:scale-110 transition-transform" alt="Bendahara">
                    </div>
                    <span class="inline-block bg-[#8a896b] text-white text-xs px-3 py-1 rounded-lg font-bold uppercase tracking-wider mb-2">Bendahara</span>
                    <h3 class="font-bold text-base text-gray-800" style="font-family:'Poppins',sans-serif;">[Nama Bendahara]</h3>
                </div>
            </div>

            <!-- Connector to divisions -->
            <div class="w-0.5 h-10 bg-[#c8c8a9]"></div>
            <div class="flex items-center gap-2 mb-6">
                <div class="h-0.5 w-8 bg-[#c8c8a9]"></div>
                <span class="text-xs font-bold uppercase tracking-widest text-[#8a896b]">Bidang-Bidang</span>
                <div class="h-0.5 w-8 bg-[#c8c8a9]"></div>
            </div>
        </div>

        <!-- LEVEL 3: Division Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-4xl mx-auto">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center" data-aos="fade-up">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-laptop-code text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Komunikasi Digital</h3>
                <p class="text-sm text-gray-600"><strong>Ketua:</strong> Raghib Abiyyudzaky A.</p>
                <p class="text-xs text-gray-500 mt-1">Anggota: L.M Rafa Fauzan Kamil, Kun Syafe'i Djaelani</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center" data-aos="fade-up" data-aos-delay="50">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-briefcase text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Keterampilan &amp; Kewirausahaan</h3>
                <p class="text-sm text-gray-600"><strong>Ketua:</strong> Muhammad Ridho Nofra Alhaki</p>
                <p class="text-xs text-gray-500 mt-1">Anggota: Andi Atha Azka</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-futbol text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Kepemimpinan &amp; Olahraga</h3>
                <p class="text-sm text-gray-600"><strong>Ketua:</strong> Muhammad Akhtarsyah</p>
                <p class="text-xs text-gray-500 mt-1">Anggota: Rizky Hidayatullah</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center" data-aos="fade-up" data-aos-delay="150">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-handshake text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Hubungan Masyarakat</h3>
                <p class="text-sm text-gray-600"><strong>Ketua:</strong> Ammar Yusuf Wiraputra</p>
                <p class="text-xs text-gray-500 mt-1">Anggota: -</p>
            </div>
        </div>

        <!-- Odd card centered -->
        <div class="flex justify-center mt-5">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center w-full max-w-[calc(50%-10px)] max-w-md" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-mosque text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Keagamaan</h3>
                <p class="text-sm text-gray-600"><strong>Ketua:</strong> Muhammad Al Bukhari</p>
                <p class="text-xs text-gray-500 mt-1">Anggota: Al</p>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <div class="max-w-5xl mx-auto px-6"><div class="border-t border-gray-200"></div></div>

    <!-- PEREMPUAN -->
    <section class="max-w-5xl mx-auto px-6 py-20">
        <div class="mb-16 text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800" style="font-family:'Outfit',sans-serif;">Kepengurusan Akhwat</h2>
            <p class="text-gray-500 mt-3 text-sm">Susunan pengurus OSIS putri periode aktif</p>
        </div>

        <!-- === ORG CHART HIERARCHY === -->
        <div class="flex flex-col items-center">

            <!-- LEVEL 1: Wakil Ketua OSIS -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500 group text-center w-full max-w-xs" data-aos="fade-up">
                <div class="w-24 h-24 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center overflow-hidden">
                    <img src="assets/icons/akhwat_avatar.png" class="w-16 group-hover:scale-110 transition-transform" alt="Wakil Ketua">
                </div>
                <span class="inline-block bg-[#6f6e50] text-white text-xs px-3 py-1 rounded-lg font-bold uppercase tracking-wider mb-3">Wakil Ketua OSIS</span>
                <h3 class="font-bold text-lg text-gray-800" style="font-family:'Poppins',sans-serif;">[Nama Wakil Ketua]</h3>
            </div>

            <!-- Connector: vertical line -->
            <div class="w-0.5 h-10 bg-[#c8c8a9]"></div>

            <!-- Connector: horizontal T-branch -->
            <div class="relative w-full max-w-lg">
                <div class="absolute top-0 left-1/4 right-1/4 h-0.5 bg-[#c8c8a9]"></div>
                <div class="absolute top-0 left-1/4 w-0.5 h-6 bg-[#c8c8a9]"></div>
                <div class="absolute top-0 right-1/4 w-0.5 h-6 bg-[#c8c8a9]"></div>
                <div class="h-6"></div>
            </div>

            <!-- LEVEL 2: Sekretaris & Bendahara -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-lg">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500 group text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center overflow-hidden">
                        <img src="assets/icons/akhwat_avatar.png" class="w-14 group-hover:scale-110 transition-transform" alt="Sekretaris">
                    </div>
                    <span class="inline-block bg-[#8a896b] text-white text-xs px-3 py-1 rounded-lg font-bold uppercase tracking-wider mb-2">Sekretaris</span>
                    <h3 class="font-bold text-base text-gray-800" style="font-family:'Poppins',sans-serif;">[Nama Sekretaris]</h3>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm card-glow hover:-translate-y-2 transition-all duration-500 group text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center overflow-hidden">
                        <img src="assets/icons/akhwat_avatar.png" class="w-14 group-hover:scale-110 transition-transform" alt="Bendahara">
                    </div>
                    <span class="inline-block bg-[#8a896b] text-white text-xs px-3 py-1 rounded-lg font-bold uppercase tracking-wider mb-2">Bendahara</span>
                    <h3 class="font-bold text-base text-gray-800" style="font-family:'Poppins',sans-serif;">[Nama Bendahara]</h3>
                </div>
            </div>

            <!-- Connector to divisions -->
            <div class="w-0.5 h-10 bg-[#c8c8a9]"></div>
            <div class="flex items-center gap-2 mb-6">
                <div class="h-0.5 w-8 bg-[#c8c8a9]"></div>
                <span class="text-xs font-bold uppercase tracking-widest text-[#8a896b]">Bidang-Bidang</span>
                <div class="h-0.5 w-8 bg-[#c8c8a9]"></div>
            </div>
        </div>

        <!-- LEVEL 3: Division Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-4xl mx-auto">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center" data-aos="fade-up">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-laptop-code text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Komunikasi Digital</h3>
                <p class="text-sm text-gray-600"><strong>Ketua:</strong> [Nama Ketua]</p>
                <p class="text-xs text-gray-500 mt-1">Anggota: [Nama-nama anggota]</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center" data-aos="fade-up" data-aos-delay="50">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-briefcase text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Keterampilan &amp; Kewirausahaan</h3>
                <p class="text-sm text-gray-600"><strong>Ketua:</strong> [Nama Ketua]</p>
                <p class="text-xs text-gray-500 mt-1">Anggota: [Nama-nama anggota]</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-futbol text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Kepemimpinan &amp; Olahraga</h3>
                <p class="text-sm text-gray-600"><strong>Ketua:</strong> [Nama Ketua]</p>
                <p class="text-xs text-gray-500 mt-1">Anggota: [Nama-nama anggota]</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center" data-aos="fade-up" data-aos-delay="150">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-handshake text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Hubungan Masyarakat</h3>
                <p class="text-sm text-gray-500">-</p>
            </div>
        </div>

        <!-- Odd card centered -->
        <div class="flex justify-center mt-5">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 text-center w-full max-w-[calc(50%-10px)] max-w-md" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                    <i class="fas fa-mosque text-[#6f6e50]"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2" style="font-family:'Poppins',sans-serif;">Keagamaan</h3>
                <p class="text-sm text-gray-500">-</p>
            </div>
        </div>
    </section>

    <?php require_once 'includes/footer.php'; ?>
</body>
</html>
