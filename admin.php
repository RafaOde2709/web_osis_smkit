<?php
require_once 'config/auth.php';

// Tambahkan HTTP Security Headers
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('X-XSS-Protection: 1; mode=block');

requireAdmin();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | OSIS SMKIT Ibnul Qayyim</title>

    <link rel="icon" type="image/png" sizes="32x32" href="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-tab {
            animation: fadeSlideUp 0.4s ease-out forwards;
        }
        .sidebar-link { transition: all 0.2s; border-radius: 0.75rem; }
        .sidebar-link:hover { background: rgba(185,184,147,0.2); }
        .sidebar-link.active { background: rgba(185,184,147,0.25); font-weight: 700; }
    </style>
</head>
<body class="bg-[#fafaf7] font-sans">
    <div id="toast-container"></div>

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="closeSidebar()"></div>

    <!-- Mobile Top Bar -->
    <div class="lg:hidden fixed top-0 left-0 right-0 h-14 bg-[#33322a] flex items-center justify-between px-4 z-30 shadow-lg">
        <button onclick="toggleSidebar()" class="text-gray-300 hover:text-white p-2 rounded-lg hover:bg-white/10 transition-colors" aria-label="Toggle menu">
            <i class="fas fa-bars text-lg" id="mobileMenuIcon"></i>
        </button>
        <h2 class="text-white font-bold text-sm" style="font-family:'Poppins',sans-serif;">Admin OSIS</h2>
        <a href="logout.php" class="text-gray-400 hover:text-red-400 p-2 rounded-lg hover:bg-white/10 transition-colors" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-[#33322a] text-gray-300 p-6 z-50 transform -translate-x-full transition-transform duration-300 lg:translate-x-0">
        <div class="flex items-center gap-3 mb-10 mt-2">
            <div class="w-10 h-10 rounded-xl bg-[#b9b893]/20 flex items-center justify-center"><i class="fas fa-gauge-high text-[#b9b893]"></i></div>
            <div><h2 class="text-lg font-bold text-white" style="font-family:'Poppins',sans-serif;">Admin OSIS</h2><p class="text-xs text-gray-500">Dashboard</p></div>
        </div>
        <nav class="space-y-1">
            <button onclick="showTab('kegiatan')" class="sidebar-link active w-full text-left px-4 py-2.5 text-sm" id="btn-kegiatan"><i class="fas fa-camera mr-3 w-5 text-center text-[#b9b893]"></i> Kegiatan</button>
            <button onclick="showTab('artikel')" class="sidebar-link w-full text-left px-4 py-2.5 text-sm" id="btn-artikel"><i class="fas fa-newspaper mr-3 w-5 text-center text-[#b9b893]"></i> Artikel</button>
            <button onclick="showTab('agenda')" class="sidebar-link w-full text-left px-4 py-2.5 text-sm" id="btn-agenda"><i class="fas fa-calendar mr-3 w-5 text-center text-[#b9b893]"></i> Agenda</button>
            <button onclick="showTab('notulensi')" class="sidebar-link w-full text-left px-4 py-2.5 text-sm" id="btn-notulensi"><i class="fas fa-file-alt mr-3 w-5 text-center text-[#b9b893]"></i> Notulensi</button>
            <button onclick="showTab('aspirasi')" class="sidebar-link w-full text-left px-4 py-2.5 text-sm" id="btn-aspirasi"><i class="fas fa-bullhorn mr-3 w-5 text-center text-[#b9b893]"></i> Aspirasi</button>
            <button onclick="showTab('kontak')" class="sidebar-link w-full text-left px-4 py-2.5 text-sm" id="btn-kontak"><i class="fas fa-envelope mr-3 w-5 text-center text-[#b9b893]"></i> Kontak</button>
            <div class="border-t border-white/10 my-4"></div>
            <a href="index.php" class="sidebar-link block w-full text-left px-4 py-2.5 text-sm"><i class="fas fa-external-link-alt mr-3 w-5 text-center text-[#b9b893]"></i> Lihat Website</a>
            <a href="logout.php" class="sidebar-link block w-full text-left px-4 py-2.5 text-sm hover:!bg-red-500/20 hover:!text-red-400"><i class="fas fa-sign-out-alt mr-3 w-5 text-center"></i> Logout</a>
        </nav>
    </div>

    <!-- Content -->
    <div id="mainContent" class="pt-14 lg:pt-0 lg:ml-64 p-4 md:p-8 min-h-screen bg-[#fafaf7]">

        <!-- Tab Kegiatan -->
        <div id="tab-kegiatan" class="tab-content bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3" style="font-family:'Poppins',sans-serif;">Kelola Galeri Kegiatan</h2>

            <!-- Form Add Kegiatan -->
            <form id="formKegiatan" class="mb-8 p-6 bg-gray-50 rounded-lg border shadow-sm" onsubmit="submitForm(event, 'kegiatan')">
                <h3 class="font-bold mb-4 text-[#6f6e50] border-b pb-2" id="kegiatanFormTitle" style="font-family:'Poppins',sans-serif;">Tambah Kegiatan Baru</h3>
                <input type="hidden" name="id" id="kegiatanId">
                <input type="hidden" name="_method" id="kegiatanMethod" value="POST">
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="text" name="title" id="kegiatanTitle" placeholder="Judul Kegiatan" class="input-modern px-4 py-2.5 rounded-xl outline-none text-sm" required>
                    <input type="file" name="image" id="kegiatanImage" accept="image/*" class="input-modern px-4 py-2.5 rounded-xl outline-none bg-white text-sm">
                </div>
                <textarea name="description" id="kegiatanDesc" placeholder="Deskripsi Singkat" class="input-modern w-full px-4 py-2.5 rounded-xl mb-4 outline-none text-sm" rows="3" required></textarea>
                
                <div class="flex gap-2">
                    <button type="submit" class="bg-gradient-to-r from-[#6f6e50] to-[#8a896b] text-white px-6 py-2.5 rounded-xl hover:shadow-md font-semibold text-sm transition-all"><i class="fas fa-save mr-1"></i> Simpan</button>
                    <button type="button" onclick="resetForm('kegiatan')" class="bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl hover:bg-gray-200 font-semibold text-sm hidden transition-all" id="kegiatanBtnCancel">Batal</button>
                </div>
            </form>

            <div class="skeleton w-full h-8 mb-4 hidden" id="kegiatanSk"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="kegiatanList"></div>
        </div>

        <!-- Tab Artikel -->
        <div id="tab-artikel" class="tab-content hidden bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3" style="font-family:'Poppins',sans-serif;">Kelola Artikel / Berita</h2>

            <form id="formArtikel" class="mb-8 p-6 bg-gray-50 rounded-lg border shadow-sm" onsubmit="submitForm(event, 'artikel')">
                <h3 class="font-bold mb-4 text-[#6f6e50] border-b pb-2" id="artikelFormTitle">Tulis Artikel Baru</h3>
                <input type="hidden" name="id" id="artikelId">
                <input type="hidden" name="_method" id="artikelMethod" value="POST">
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="text" name="title" id="artikelTitle" placeholder="Judul Artikel" class="px-4 py-2 border rounded focus:ring-2 focus:ring-[#b9b893] outline-none" required>
                    <select name="category" id="artikelCat" class="px-4 py-2 border rounded focus:ring-2 focus:ring-[#b9b893] outline-none" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Berita OSIS">Berita OSIS</option>
                        <option value="Opini Siswa">Opini Siswa</option>
                        <option value="Pengumuman">Pengumuman</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Gambar (Opsional)</label>
                    <input type="file" name="image" id="artikelImage" accept="image/*" class="px-4 py-2 border rounded w-full bg-white focus:ring-2 focus:ring-[#b9b893] outline-none">
                </div>
                <textarea name="content" id="artikelContent" placeholder="Isi artikel..." class="w-full px-4 py-2 border rounded mb-4 h-48 focus:ring-2 focus:ring-[#b9b893] outline-none" required></textarea>
                
                <div class="flex gap-2">
                    <button type="submit" class="bg-gradient-to-r from-[#6f6e50] to-[#8a896b] text-white px-6 py-2.5 rounded-xl hover:shadow-md font-semibold text-sm transition-all"><i class="fas fa-save mr-1"></i> Simpan</button>
                    <button type="button" onclick="resetForm('artikel')" class="bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl hover:bg-gray-200 font-semibold text-sm hidden transition-all" id="artikelBtnCancel">Batal</button>
                </div>
            </form>

            <div class="skeleton w-full h-8 mb-4 hidden" id="artikelSk"></div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 shadow-sm rounded-lg overflow-hidden text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-left">
                            <th class="p-3 border-b">Tgl</th>
                            <th class="p-3 border-b">Judul</th>
                            <th class="p-3 border-b">Kategori</th>
                            <th class="p-3 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="artikelList"></tbody>
                </table>
            </div>
        </div>

        <!-- Tab Agenda -->
        <div id="tab-agenda" class="tab-content hidden bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3" style="font-family:'Poppins',sans-serif;">Kelola Agenda</h2>

            <form id="formAgenda" class="mb-8 p-6 bg-gray-50 rounded-lg border shadow-sm" onsubmit="submitForm(event, 'agenda')">
                <h3 class="font-bold mb-4 text-[#6f6e50] border-b pb-2" id="agendaFormTitle">Tambah Agenda Baru</h3>
                <input type="hidden" name="id" id="agendaId">
                <input type="hidden" name="_method" id="agendaMethod" value="POST">
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="text" name="title" id="agendaTitle" placeholder="Nama Agenda" class="px-4 py-2 border rounded focus:ring-2 focus:ring-[#b9b893] outline-none w-full" required>
                    <select name="type" id="agendaType" class="px-4 py-2 border rounded focus:ring-2 focus:ring-[#b9b893] outline-none w-full" required>
                        <option value="Segera">Segera</option>
                        <option value="Mendatang">Mendatang</option>
                        <option value="Rutin">Rutin</option>
                    </select>
                </div>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <input type="date" name="date" id="agendaDate" class="px-4 py-2 border rounded focus:ring-2 focus:ring-[#b9b893] outline-none w-full" required>
                    <input type="time" name="time_start" id="agendaTime1" class="px-4 py-2 border rounded focus:ring-2 focus:ring-[#b9b893] outline-none w-full" required>
                    <input type="time" name="time_end" id="agendaTime2" class="px-4 py-2 border rounded focus:ring-2 focus:ring-[#b9b893] outline-none w-full" required>
                </div>
                <textarea name="description" id="agendaDesc" placeholder="Deskripsi" class="w-full px-4 py-2 border rounded mb-4 focus:ring-2 focus:ring-[#b9b893] outline-none" rows="2" required></textarea>
                
                <div class="flex gap-2">
                    <button type="submit" class="bg-gradient-to-r from-[#6f6e50] to-[#8a896b] text-white px-6 py-2.5 rounded-xl hover:shadow-md font-semibold text-sm transition-all"><i class="fas fa-save mr-1"></i> Simpan</button>
                    <button type="button" onclick="resetForm('agenda')" class="bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl hover:bg-gray-200 font-semibold text-sm hidden transition-all" id="agendaBtnCancel">Batal</button>
                </div>
            </form>

            <div class="skeleton w-full h-8 mb-4 hidden" id="agendaSk"></div>
            <div class="space-y-4" id="agendaList"></div>
        </div>

        <!-- Tab Notulensi -->
         <div id="tab-notulensi" class="tab-content hidden bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3" style="font-family:'Poppins',sans-serif;">Daftar Notulensi Rapat</h2>
            
            <div class="skeleton w-full h-8 mb-4 hidden" id="aspirasiSk"></div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 shadow-sm rounded-lg overflow-hidden text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-left">
                            <th class="p-3 border-b">Tgl</th>
                            <th class="p-3 border-b">Nama</th>
                            <th class="p-3 border-b">Kelas</th>
                            <th class="p-3 border-b">Kategori</th>
                            <th class="p-3 border-b">Pesan</th>
                            <th class="p-3 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="notulensiList"></tbody>
                </table>
            </div>
        </div>


        <!-- Tab Aspirasi -->
        <div id="tab-aspirasi" class="tab-content hidden bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3" style="font-family:'Poppins',sans-serif;">Daftar Aspirasi Siswa</h2>
            
            <div class="skeleton w-full h-8 mb-4 hidden" id="aspirasiSk"></div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 shadow-sm rounded-lg overflow-hidden text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-left">
                            <th class="p-3 border-b">Tgl</th>
                            <th class="p-3 border-b">Nama</th>
                            <th class="p-3 border-b">Kelas</th>
                            <th class="p-3 border-b">Kategori</th>
                            <th class="p-3 border-b">Pesan</th>
                            <th class="p-3 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="aspirasiList"></tbody>
                </table>
            </div>
        </div>

        <!-- Tab Kontak -->
        <div id="tab-kontak" class="tab-content hidden bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3" style="font-family:'Poppins',sans-serif;">Pesan dari Form Kontak</h2>
            
            <div class="skeleton w-full h-8 mb-4 hidden" id="kontakSk"></div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 shadow-sm rounded-lg overflow-hidden text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-left">
                            <th class="p-3 border-b">Tgl</th>
                            <th class="p-3 border-b">Nama</th>
                            <th class="p-3 border-b">Email</th>
                            <th class="p-3 border-b w-1/2">Pesan</th>
                            <th class="p-3 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="kontakList"></tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-content p-6">
            <div class="text-center mb-6">
                <i class="fas fa-exclamation-triangle text-red-500 text-5xl mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Konfirmasi Hapus</h3>
                <p class="text-gray-600">Yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="flex justify-center gap-4">
                <button onclick="closeModal('deleteModal')" class="px-6 py-2 rounded border border-gray-300 text-gray-700 hover:bg-gray-100 font-semibold">Batal</button>
                <button id="confirmDeleteBtn" class="px-6 py-2 rounded bg-red-600 text-white hover:bg-red-700 font-semibold">Hapus</button>
            </div>
        </div>
    </div>

    <script>
        // Tab Navigation
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(el => {
                el.classList.add('hidden');
                el.classList.remove('animate-tab');
            });
            const activeTab = document.getElementById('tab-' + tabName);
            activeTab.classList.remove('hidden');
            void activeTab.offsetWidth; // Force reflow to restart animation
            activeTab.classList.add('animate-tab');
            
            // Highlight active menu
            document.querySelectorAll('nav button.sidebar-link').forEach(el => {
                el.classList.remove('active');
            });
            document.getElementById('btn-' + tabName).classList.add('active');
            
            loadData(tabName);
        }

        // --- Core Functions ---
        
        async function loadData(type) {
            const sk = document.getElementById(type + 'Sk');
            if (sk) sk.classList.remove('hidden');
            
            try {
                const res = await fetch(`api/${type}.php`);
                const data = await res.json();
                renderData(type, data);
            } catch (error) {
                console.error(error);
                showToast(`Gagal memuat ${type}`, 'error');
            } finally {
                if (sk) sk.classList.add('hidden');
            }
        }

        function renderData(type, data) {
            const container = document.getElementById(type + 'List');
            if (!container) return;

            if (data.length === 0) {
                container.innerHTML = `<tr><td colspan="6" class="p-6 text-center text-gray-500">Tidak ada data.</td></tr>`;
                if(type === 'kegiatan' || type === 'agenda') container.innerHTML = `<div class="col-span-full p-6 text-center text-gray-500 border rounded-lg bg-gray-50">Tidak ada data.</div>`;
                return;
            }

            let html = '';
            
            if (type === 'kegiatan') {
                html = data.map((item, index) => `
                    <div class="bg-gray-50 rounded-lg p-3 border relative group hover:shadow-md transition opacity-0 animate-tab" style="animation-delay: ${index * 0.05}s">
                        <div class="absolute top-2 right-2 space-x-1 opacity-0 group-hover:opacity-100 transition z-10 flex">
                            <button onclick='editItem("kegiatan", ${JSON.stringify(item).replace(/'/g, "&apos;")})' class="bg-blue-500 text-white w-8 h-8 rounded shadow hover:bg-blue-600 flex items-center justify-center"><i class="fas fa-edit"></i></button>
                            <button onclick="confirmDelete('kegiatan', ${item.id})" class="bg-red-500 text-white w-8 h-8 rounded shadow hover:bg-red-600 flex items-center justify-center"><i class="fas fa-trash"></i></button>
                        </div>
                        <div class="w-full h-32 overflow-hidden rounded mb-3 bg-gray-200">
                            ${item.image_url ? `<img src="${item.image_url}" class="w-full h-full object-cover">` : '<div class="w-full h-full flex flex-col items-center justify-center text-gray-400 text-xs"><i class="fas fa-image text-2xl mb-1"></i> No Image</div>'}
                        </div>
                        <h4 class="font-bold text-sm text-gray-800 line-clamp-1">${item.title}</h4>
                        <p class="text-xs text-gray-600 line-clamp-2 mt-1">${item.description}</p>
                    </div>
                `).join('');
            }
            else if (type === 'artikel') {
                html = data.map((item, index) => `
                    <tr class="border-b hover:bg-gray-50 opacity-0 animate-tab" style="animation-delay: ${index * 0.05}s">
                        <td class="p-3 whitespace-nowrap text-xs text-gray-500">${new Date(item.created_at).toLocaleDateString('id-ID')}</td>
                        <td class="p-3 font-semibold text-gray-800">${item.title}</td>
                        <td class="p-3"><span class="px-2 py-1 bg-gray-200 rounded text-xs">${item.category}</span></td>
                        <td class="p-3 text-center whitespace-nowrap">
                            <button onclick='editItem("artikel", ${JSON.stringify(item).replace(/'/g, "&apos;")})' class="text-blue-500 hover:text-blue-700 mx-1"><i class="fas fa-edit"></i></button>
                            <button onclick="confirmDelete('artikel', ${item.id})" class="text-red-500 hover:text-red-700 mx-1"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `).join('');
            }
            else if (type === 'agenda') {
                html = data.map((item, index) => `
                    <div class="bg-gray-50 rounded-lg p-4 border flex justify-between items-center hover:bg-white transition shadow-sm border-l-4 ${item.type==='Segera'?'border-l-red-500':(item.type==='Mendatang'?'border-l-blue-500':'border-l-green-500')} opacity-0 animate-tab" style="animation-delay: ${index * 0.05}s">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs font-bold px-2 py-1 bg-gray-200 rounded">${item.type}</span>
                                <span class="text-sm text-gray-500 font-semibold"><i class="fas fa-calendar-day mr-1"></i> ${new Date(item.date).toLocaleDateString('id-ID')} | ${item.time_start} - ${item.time_end}</span>
                            </div>
                            <h4 class="font-bold text-gray-800">${item.title}</h4>
                            <p class="text-sm text-gray-600 mt-1">${item.description}</p>
                        </div>
                        <div class="flex gap-2">
                             <button onclick='editItem("agenda", ${JSON.stringify(item).replace(/'/g, "&apos;")})' class="w-8 h-8 rounded bg-gray-200 text-blue-600 hover:bg-blue-100 transition flex justify-center items-center"><i class="fas fa-edit"></i></button>
                             <button onclick="confirmDelete('agenda', ${item.id})" class="w-8 h-8 rounded bg-gray-200 text-red-600 hover:bg-red-100 transition flex justify-center items-center"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                `).join('');
            }
            else if (type === 'notulensi') {
                html = data.map((item, index) => `
                    <tr class="border-b hover:bg-gray-50 opacity-0 animate-tab" style="animation-delay: ${index * 0.05}s">
                        <td class="p-3 text-xs text-gray-500 whitespace-nowrap">${new Date(item.created_at).toLocaleDateString()}</td>
                        <td class="p-3 font-semibold text-gray-800">${item.name || '-'}</td>
                        <td class="p-3 whitespace-nowrap">${item.class}</td>
                        <td class="p-3 whitespace-nowrap"><span class="px-2 py-1 bg-gray-200 rounded text-xs">${item.category}</span></td>
                        <td class="p-3 text-sm text-gray-600">${item.message}</td>
                        <td class="p-3 text-center">
                            <button onclick="confirmDelete('notulensi', ${item.id})" class="text-red-500 hover:text-red-700 bg-red-50 px-2 py-1 rounded w-8 h-8"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `).join('');
            }
            else if (type === 'aspirasi') {
                html = data.map((item, index) => `
                    <tr class="border-b hover:bg-gray-50 opacity-0 animate-tab" style="animation-delay: ${index * 0.05}s">
                        <td class="p-3 text-xs text-gray-500 whitespace-nowrap">${new Date(item.created_at).toLocaleDateString()}</td>
                        <td class="p-3 font-semibold text-gray-800">${item.name || '-'}</td>
                        <td class="p-3 whitespace-nowrap">${item.class}</td>
                        <td class="p-3 whitespace-nowrap"><span class="px-2 py-1 bg-gray-200 rounded text-xs">${item.category}</span></td>
                        <td class="p-3 text-sm text-gray-600">${item.message}</td>
                        <td class="p-3 text-center">
                            <button onclick="confirmDelete('aspirasi', ${item.id})" class="text-red-500 hover:text-red-700 bg-red-50 px-2 py-1 rounded w-8 h-8"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `).join('');
            }
            else if (type === 'kontak') {
                html = data.map((item, index) => `
                    <tr class="border-b hover:bg-gray-50 opacity-0 animate-tab" style="animation-delay: ${index * 0.05}s">
                        <td class="p-3 text-xs text-gray-500 whitespace-nowrap">${new Date(item.created_at).toLocaleDateString('id-ID')}</td>
                        <td class="p-3 font-semibold text-gray-800">${item.nama || '-'}</td>
                        <td class="p-3 whitespace-nowrap text-blue-600"><a href="mailto:${item.email}">${item.email}</a></td>
                        <td class="p-3 text-sm text-gray-600">${item.pesan}</td>
                        <td class="p-3 text-center">
                            <button onclick="confirmDelete('kontak', ${item.id})" class="text-red-500 hover:text-red-700 bg-red-50 px-2 py-1 rounded w-8 h-8"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `).join('');
            }

            container.innerHTML = html;
        }

        async function submitForm(e, type) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            const isEdit = formData.get('_method') === 'PUT';
            
            const btn = form.querySelector('button[type="submit"]');
            const ogBtn = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan';
            btn.disabled = true;

            try {
                const res = await fetch(`api/${type}.php`, {
                    method: 'POST', // Always POST for file upload compat, _method handles PUT
                    body: formData
                });
                
                const result = await res.json();
                
                if (res.ok) {
                    showToast(result.message || 'Sukses', 'success');
                    resetForm(type);
                    loadData(type);
                } else {
                    showToast(result.error || 'Terjadi kesalahan', 'error');
                }
            } catch (error) {
                console.error(error);
                showToast('Gagal terhubung ke server', 'error');
            } finally {
                btn.innerHTML = ogBtn;
                btn.disabled = false;
            }
        }

        function editItem(type, item) {
            const form = document.getElementById('form' + type.charAt(0).toUpperCase() + type.slice(1));
            if (!form) return;
            
            // set fields
            Object.keys(item).forEach(key => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input && input.type !== 'file') {
                    input.value = item[key];
                }
            });

            document.getElementById(type + 'Method').value = 'PUT';
            document.getElementById(type + 'FormTitle').innerHTML = 'Edit ' + type.charAt(0).toUpperCase() + type.slice(1);
            document.getElementById(type + 'BtnCancel').classList.remove('hidden');
            
            // Scroll to form
            form.scrollIntoView({ behavior: 'smooth' });
        }

        function resetForm(type) {
            const form = document.getElementById('form' + type.charAt(0).toUpperCase() + type.slice(1));
            form.reset();
            document.getElementById(type + 'Id').value = '';
            document.getElementById(type + 'Method').value = 'POST';
            document.getElementById(type + 'FormTitle').innerHTML = 'Tambah ' + type.charAt(0).toUpperCase() + type.slice(1) + ' Baru';
            document.getElementById(type + 'BtnCancel').classList.add('hidden');
        }

        // --- Delete via Modal ---
        let deleteType = null;
        let deleteId = null;

        function confirmDelete(type, id) {
            deleteType = type;
            deleteId = id;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', async () => {
            if (!deleteType || !deleteId) return;
            
            const btn = document.getElementById('confirmDeleteBtn');
            const ogBtn = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            btn.disabled = true;

            try {
                // Since _SERVER REQUEST_METHOD checks for DELETE, we send a DELETE request
                const res = await fetch(`api/${deleteType}.php?id=${deleteId}`, {
                    method: 'DELETE'
                });
                const result = await res.json();
                
                if (res.ok) {
                    showToast('Berhasil dihapus', 'success');
                    loadData(deleteType);
                } else {
                    showToast(result.error || 'Gagal menghapus', 'error');
                }
            } catch (err) {
                showToast('Error koneksi', 'error');
            } finally {
                btn.innerHTML = ogBtn;
                btn.disabled = false;
                closeModal('deleteModal');
            }
        });

        // Setup toast helper specifically for admin
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            if(!container) return;
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            const icon = type === 'success' ? '<i class="fas fa-check-circle text-green-500 mt-1"></i>' : '<i class="fas fa-exclamation-circle text-red-500 mt-1"></i>';
            toast.innerHTML = `${icon} <div><p class="font-bold text-sm text-gray-800">${type === 'success' ? 'Sukses' : 'Gagal'}</p><p class="text-xs text-gray-600">${message}</p></div>`;
            container.appendChild(toast);
            setTimeout(() => toast.remove(), 3500);
        }

        // Init
        showTab('kegiatan');

        // Sidebar Mobile Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const icon = document.getElementById('mobileMenuIcon');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
            icon.className = sidebar.classList.contains('-translate-x-full') ? 'fas fa-bars text-lg' : 'fas fa-times text-lg';
        }
        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const icon = document.getElementById('mobileMenuIcon');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            icon.className = 'fas fa-bars text-lg';
        }

        // Close sidebar on tab switch (mobile)
        const origShowTab = showTab;
        window.showTab = function(tabName) {
            if (window.innerWidth < 1024) closeSidebar();
            origShowTab(tabName);
        };
    </script>
</body>
</html>
