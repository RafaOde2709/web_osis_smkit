<?php
require_once 'config/database.php';
$pdo = getDBConnection();

// Fetch activities
$kegiatan = [];
try {
    $stmt = $pdo->query("SELECT * FROM kegiatan ORDER BY created_at DESC");
    $kegiatan = $stmt->fetchAll();
} catch (Exception $e) {}

// Fetch agenda
$agenda = [];
try {
    $stmt = $pdo->query("SELECT * FROM agenda ORDER BY date ASC");
    $agenda = $stmt->fetchAll();
} catch (Exception $e) {}

// Fetch articles
$artikel = [];
try {
    $stmt = $pdo->query("SELECT * FROM artikel ORDER BY created_at DESC");
    $artikel = $stmt->fetchAll();
} catch (Exception $e) {}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan & Dokumentasi | OSIS SMKIT Ibnul Qayyim</title>

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
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4" style="font-family:'Outfit',sans-serif;">Kegiatan & Agenda</h1>
            <p class="text-white/80 mt-4 max-w-2xl text-lg leading-relaxed">Dokumentasi aktivitas seru, artikel terbaru, dan jadwal kegiatan mendatang OSIS SMKIT Ibnul Qayyim.</p>
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
                Kegiatan & Agenda<br><span class="text-[#b9b893]"></span>
            </h1>
            <p class="hero-fade-up-delay2 text-lg md:text-xl text-justify text-[#e8e7d4] max-w-lg mb-10 leading-relaxed">
                kegiatan dan agenda organisasi ini dirancang secara terpadu sebagai sarana aplikatif untuk mentransformasikan visi menjadi aksi nyata. Setiap program kerja dikemas secara menarik, adaptif, dan berorientasi pada hasil guna membentuk ekosistem yang mendukung lahirnya generasi yang Shalih dalam berakhlak, Hafidz dalam menjaga Al-Qur'an, serta Terampil dalam menghadapi tantangan zaman.
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


    <!-- ABOUT -->
    <section class="py-24 bg-white" data-aos="fade-up">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6" style="font-family:'Outfit',sans-serif;">Tempat Berkembang & Berkreasi</h2>
            <p class="text-gray-500 text-lg leading-relaxed max-w-3xl mx-auto">
                OSIS SMKIT Ibnul Qayyim adalah wadah bagi para siswa untuk menyalurkan aspirasi, kreativitas, dan kepemimpinan.
                Kami berkomitmen membangun lingkungan sekolah yang aktif, religius, dan berkarakter unggul.
            </p>
        </div>
    </section>

    <!-- ARTIKEL TERBARU -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="inline-block text-[#b9b893] font-semibold text-sm tracking-[0.15em] uppercase mb-3">Berita Terkini</span>
            <div class="section-line"></div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family:'Outfit',sans-serif;">Artikel Terbaru</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            <?php if (empty($artikel)): ?>
                <p class="text-center col-span-3 text-gray-400 py-12">Belum ada artikel.</p>
            <?php else: ?>
                <?php foreach ($artikel as $item): ?>
                    <a href="artikel.php?slug=<?php echo htmlspecialchars($item['slug']); ?>" class="group block rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-400 bg-white border border-gray-100 card-glow">
                        <div class="relative h-52 overflow-hidden bg-gray-100">
                            <?php if ($item['image_url']): ?>
                                <img src="<?php echo htmlspecialchars($item['image_url']); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="<?php echo htmlspecialchars($item['title']); ?>">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-300"><i class="fas fa-image text-4xl"></i></div>
                            <?php endif; ?>
                            <span class="absolute top-4 left-4 bg-[#6f6e50] text-white text-xs px-3 py-1.5 rounded-lg font-bold uppercase tracking-wider"><?php echo htmlspecialchars($item['category']); ?></span>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-800 line-clamp-2 group-hover:text-[#6f6e50] transition-colors" style="font-family:'Outfit',sans-serif;"><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p class="text-gray-400 text-xs mt-3 flex items-center gap-3">
                                <span class="flex items-center"><i class="fas fa-user-circle mr-1 text-[#b9b893]"></i><?php echo htmlspecialchars($item['author']); ?></span>
                                <span class="flex items-center"><i class="fas fa-calendar mr-1 text-[#b9b893]"></i><?php echo date('d M Y', strtotime($item['created_at'])); ?></span>
                            </p>
                            <p class="text-gray-500 text-sm line-clamp-2 mt-3 leading-relaxed"><?php echo htmlspecialchars(strip_tags($item['content'])); ?></p>
                            <span class="inline-flex items-center mt-4 text-[#6f6e50] font-semibold text-sm group-hover:text-[#4a4933]">Baca selengkapnya <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- GALERI KEGIATAN -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14" data-aos="fade-up">
                <span class="inline-block text-[#b9b893] font-semibold text-sm tracking-[0.15em] uppercase mb-3">Dokumentasi</span>
                <div class="section-line"></div>
                <h2 class="text-3xl font-bold text-gray-800" style="font-family:'Outfit',sans-serif;">Galeri Kegiatan</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
                <?php if (empty($kegiatan)): ?>
                    <p class="text-center col-span-3 text-gray-400 py-12">Belum ada dokumentasi kegiatan.</p>
                <?php else: ?>
                    <?php foreach ($kegiatan as $item): ?>
                        <div class="group rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-400 bg-white border border-gray-100 card-glow">
                            <div class="relative h-52 overflow-hidden bg-gray-100">
                                <?php if ($item['image_url']): ?>
                                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="<?php echo htmlspecialchars($item['title']); ?>">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center text-gray-300"><i class="fas fa-image text-4xl"></i></div>
                                <?php endif; ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="p-6">
                                <h3 class="font-bold text-lg text-gray-800 group-hover:text-[#6f6e50] transition-colors" style="font-family:'Outfit',sans-serif;"><?php echo htmlspecialchars($item['title']); ?></h3>
                                <p class="text-gray-500 text-sm mt-2 leading-relaxed"><?php echo nl2br(htmlspecialchars($item['description'])); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- AGENDA -->
    <section class="py-20 bg-[#fafaf7]" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-14">
                <span class="inline-block text-[#b9b893] font-semibold text-sm tracking-[0.15em] uppercase mb-3">Jadwal</span>
                <div class="section-line"></div>
                <h2 class="text-3xl font-bold text-gray-800" style="font-family:'Outfit',sans-serif;">Agenda Mendatang</h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if (empty($agenda)): ?>
                    <p class="text-center col-span-3 text-gray-400 py-12">Belum ada agenda terdekat.</p>
                <?php else: ?>
                    <?php foreach ($agenda as $item):
                        $badgeColor = 'bg-gray-100 text-gray-600';
                        $borderColor = 'border-gray-300';

                        if ($item['type'] === 'Segera') {
                            $badgeColor = 'bg-red-50 text-red-600';
                            $borderColor = 'border-red-400';
                        } elseif ($item['type'] === 'Mendatang') {
                            $badgeColor = 'bg-blue-50 text-blue-600';
                            $borderColor = 'border-blue-400';
                        } elseif ($item['type'] === 'Rutin') {
                            $badgeColor = 'bg-emerald-50 text-emerald-600';
                            $borderColor = 'border-emerald-400';
                        }
                    ?>
                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden border-l-4 <?php echo $borderColor; ?> hover:shadow-xl hover:-translate-y-1 transition-all duration-300 card-glow">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="<?php echo $badgeColor; ?> px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider"><?php echo htmlspecialchars($item['type']); ?></span>
                                    <span class="text-gray-400 text-sm font-medium"><?php echo date('d M Y', strtotime($item['date'])); ?></span>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-family:'Outfit',sans-serif;"><?php echo htmlspecialchars($item['title']); ?></h3>
                                <p class="text-gray-500 text-sm mb-4 leading-relaxed"><?php echo nl2br(htmlspecialchars($item['description'])); ?></p>
                                <div class="flex items-center text-gray-400 text-sm border-t border-gray-50 pt-4 mt-4">
                                    <i class="fas fa-clock mr-2 text-[#b9b893]"></i>
                                    <?php echo htmlspecialchars($item['time_start']); ?> - <?php echo htmlspecialchars($item['time_end']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php require_once 'includes/footer.php'; ?>
</body>
</html>
