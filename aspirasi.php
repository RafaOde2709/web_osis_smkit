<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi Siswa | OSIS SMKIT Ibnul Qayyim</title>

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
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4" style="font-family:'Outfit',sans-serif;">Kotak Aspirasi Siswa</h1>
            <p class="text-white/80 mt-4 max-w-2xl text-lg leading-relaxed">Suaramu penting untuk kemajuan sekolah kita. Sampaikan ide, saran, atau laporanmu di sini.</p>
        </div>
    </header> -->

    <!-- Header Kotak Aspirasi -->
    <section class="relative min-h-screen flex items-center justify-center hero-overlay bg-cover bg-center" style="background-image: url('assets/Group 417.png');">
    <div class="absolute top-20 left-10 w-20 h-20 border-2 border-white/10 rounded-full float-animation"></div>
    <div class="absolute bottom-32 right-16 w-14 h-14 border-2 border-white/10 rounded-lg float-animation" style="animation-delay:2s;"></div>
    
    <!-- Ditambahkan gap-8 agar teks dan logo tidak terlalu rapat di layar desktop -->
    <div class="px-6 max-w-7xl mx-auto w-full flex flex-col md:flex-row items-center gap-8">
        
        <!-- SISI KIRI: Teks Utama & Tombol Aksi (order-2 membuat teks berada di bawah logo saat di HP) -->
        <div class="md:w-3/5 text-left order-2 md:order-1">
            <h1 class="hero-fade-up-delay text-5xl md:text-7xl font-extrabold text-white leading-[1.1] mb-6" style="font-family:'Outfit',sans-serif;">
                Kotak Aspirasi Siswa<br><span class="text-[#b9b893]"></span>
            </h1>
            <p class="hero-fade-up-delay2 text-lg md:text-xl text-[#e8e7d4] max-w-lg mb-10 leading-relaxed">
                Suaramu penting untuk kemajuan sekolah kita. Sampaikan ide, saran, atau laporanmu di sini!
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
        <div class="md:w-2/5 w-full flex justify-center md:justify-end order-1 md:order-2 mb-8 md:mb-0">
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


    <!-- FORM SECTION -->
    <section class="max-w-3xl mx-auto px-6 py-20" data-aos="fade-up">
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-lg border border-gray-100 relative overflow-hidden">
            <!-- Decorative -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-[#b9b893]/10 rounded-full"></div>
            <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-[#6f6e50]/5 rounded-full"></div>

            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
                        <i class="fas fa-paper-plane text-[#6f6e50]"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-xl text-gray-800" style="font-family:'Outfit',sans-serif;">Formulir Aspirasi</h2>
                        <p class="text-gray-400 text-sm">Isi formulir di bawah ini</p>
                    </div>
                </div>

                <form id="aspirasiForm">
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-600 font-medium mb-2 text-sm">Nama (Opsional)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#b9b893]"><i class="fas fa-user"></i></span>
                                <input type="text" name="name" placeholder="Boleh dikosongkan" class="input-modern w-full pl-11 pr-4 py-3.5 rounded-xl outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 font-medium mb-2 text-sm">Kelas <span class="text-red-400">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#b9b893]"><i class="fas fa-school"></i></span>
                                <select name="class" required class="input-modern w-full pl-11 pr-4 py-3.5 rounded-xl outline-none bg-white text-sm appearance-none cursor-pointer">
                                    <option value="">Pilih Kelas</option>
                                    <option value="X-A">Kelas X-A</option>
                                    <option value="X-B">Kelas X-B</option>
                                    <option value="XI-A">Kelas XI-A</option>
                                    <option value="XI-B">Kelas XI-B</option>
                                    <option value="XII-A">Kelas XII-A</option>
                                    <option value="XII-B">Kelas XII-B</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-600 font-medium mb-3 text-sm">Kategori <span class="text-red-400">*</span></label>
                        <div class="flex flex-wrap gap-3">
                            <label class="flex items-center gap-2 cursor-pointer bg-gray-50 px-4 py-2.5 rounded-xl border-2 border-transparent hover:border-[#b9b893]/30 transition-all has-[:checked]:border-[#b9b893] has-[:checked]:bg-[#b9b893]/5">
                                <input type="radio" name="category" value="Sarana & Prasarana" required class="accent-[#6f6e50]">
                                <span class="text-sm font-medium text-gray-600">Sarana & Prasarana</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer bg-gray-50 px-4 py-2.5 rounded-xl border-2 border-transparent hover:border-[#b9b893]/30 transition-all has-[:checked]:border-[#b9b893] has-[:checked]:bg-[#b9b893]/5">
                                <input type="radio" name="category" value="Kegiatan / Event" class="accent-[#6f6e50]">
                                <span class="text-sm font-medium text-gray-600">Kegiatan / Event</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer bg-gray-50 px-4 py-2.5 rounded-xl border-2 border-transparent hover:border-[#b9b893]/30 transition-all has-[:checked]:border-[#b9b893] has-[:checked]:bg-[#b9b893]/5">
                                <input type="radio" name="category" value="Lainnya" class="accent-[#6f6e50]">
                                <span class="text-sm font-medium text-gray-600">Lainnya</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-gray-600 font-medium mb-2 text-sm">Pesan Aspirasi <span class="text-red-400">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-[#b9b893]"><i class="fas fa-message"></i></span>
                            <textarea name="message" rows="5" required placeholder="Tuliskan saran atau masukanmu dengan sopan..." class="input-modern w-full pl-11 pr-4 py-3.5 rounded-xl outline-none text-sm resize-none"></textarea>
                        </div>
                    </div>

                    <button id="btnSubmitAspirasi" type="submit" class="btn-shine w-full bg-gradient-to-r from-[#6f6e50] to-[#8a896b] text-white font-bold py-4 rounded-xl hover:shadow-lg hover:shadow-[#b9b893]/30 transition-all duration-300 transform hover:-translate-y-0.5 relative text-sm tracking-wide uppercase">
                        <span id="btnTextAspirasi"><i class="fas fa-paper-plane mr-2"></i>Kirim Aspirasi</span>
                        <i id="btnLoadingAspirasi" class="fas fa-spinner fa-spin absolute right-5 top-1/2 transform -translate-y-1/2 hidden"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <?php require_once 'includes/footer.php'; ?>

    <script>
        document.getElementById('aspirasiForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const btnSubmit = document.getElementById('btnSubmitAspirasi');
            const btnText = document.getElementById('btnTextAspirasi');
            const btnLoading = document.getElementById('btnLoadingAspirasi');

            btnSubmit.disabled = true;
            btnText.textContent = 'Mengirim...';
            btnLoading.classList.remove('hidden');

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('api/aspirasi.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    showToast('Terima kasih! Aspirasimu telah kami terima.', 'success');
                    this.reset();
                } else {
                    showToast('Gagal mengirim aspirasi: ' + (result.error || 'Unknown error'), 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('Terjadi kesalahan koneksi.', 'error');
            } finally {
                btnSubmit.disabled = false;
                btnText.innerHTML = '<i class="fas fa-paper-plane mr-2"></i>Kirim Aspirasi';
                btnLoading.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
