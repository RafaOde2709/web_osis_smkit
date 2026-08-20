<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

function isActive($page, $currentPage) {
    return ($page === $currentPage) ? 'text-[#6f6e50] font-semibold' : 'text-gray-600 hover:text-[#6f6e50]';
}
?>
<!-- Toast Notification Container -->
<div id="toast-container"></div>

<!-- NAVBAR — Glassmorphism -->
<nav class="fixed w-full top-0 left-0 glass-nav shadow-sm z-50 transition-all duration-300" id="mainNav">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
        <!-- Brand -->
        <a href="index.php" class="flex items-center space-x-3 group">
            <img src="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png" alt="Logo OSIS" class="w-12 rounded-xl">
            <div>
                <h1 class="font-bold text-lg text-[#4a4933] leading-tight tracking-tight" style="font-family:'Outfit',sans-serif;">OSIS SMKIT</h1>
                <p class="text-xs text-[#8a896b] font-medium -mt-0.5">Ibnul Qayyim Makassar</p>
            </div>
        </a>

        <!-- Desktop Nav -->
        <ul class="hidden md:flex items-center space-x-1 text-sm font-medium">
            <li><a href="index.php" class="<?php echo isActive('index.php', $currentPage); ?> px-4 py-2 rounded-lg hover:bg-[#b9b893]/10 transition-all duration-200">Beranda</a></li>
            <li><a href="visi-misi.php" class="<?php echo isActive('visi-misi.php', $currentPage); ?> px-4 py-2 rounded-lg hover:bg-[#b9b893]/10 transition-all duration-200">Visi & Misi</a></li>
            <li><a href="struktur.php" class="<?php echo isActive('struktur.php', $currentPage); ?> px-4 py-2 rounded-lg hover:bg-[#b9b893]/10 transition-all duration-200">Struktur</a></li>
            
            <!-- Desktop Hamburger Dropdown -->
            <li class="relative ml-2">
                <button id="desktopMenuBtn" class="flex items-center justify-center w-10 h-10 rounded-xl text-gray-600 hover:text-[#6f6e50] hover:bg-[#b9b893]/10 transition-all duration-200 focus:outline-none">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                <div id="desktopDropdown" class="hidden absolute right-0 mt-3 w-52 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50 transform opacity-0 scale-95 transition-all duration-200 origin-top-right">
                    <a href="kegiatan.php" class="flex items-center px-5 py-2.5 text-sm text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-colors"><i class="fas fa-calendar-alt mr-3 w-4 text-center text-[#6f6e50]"></i> Kegiatan</a>
                    <a href="aspirasi.php" class="flex items-center px-5 py-2.5 text-sm text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-colors"><i class="fas fa-comment-dots mr-3 w-4 text-center text-[#6f6e50]"></i> Aspirasi</a>
                    <a href="kontak.php" class="flex items-center px-5 py-2.5 text-sm text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-colors"><i class="fas fa-envelope mr-3 w-4 text-center text-[#6f6e50]"></i> Kontak</a>
                    <div class="border-t border-gray-100 my-2"></div>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="px-3 pb-1">
                            <a href="admin.php" class="flex items-center justify-center w-full bg-gradient-to-r from-[#6f6e50] to-[#8a896b] text-white px-4 py-2 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 text-sm font-semibold">
                                <i class="fas fa-gauge-high mr-2 text-xs"></i> Dashboard
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="px-3 pb-1">
                            <a href="login.php" class="flex items-center justify-center w-full border-2 border-[#b9b893] text-[#6f6e50] px-4 py-2 rounded-xl hover:bg-[#6f6e50] hover:text-white transition-all duration-300 text-sm font-semibold">
                                <i class="fas fa-sign-in-alt mr-2 text-xs"></i> Login
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </li>
        </ul>

        <!-- Mobile Hamburger -->
        <button class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl hover:bg-[#b9b893]/10 transition-colors" id="menuBtn" aria-label="Toggle menu">
            <i class="fas fa-bars text-[#6f6e50] text-xl" id="menuIcon"></i>
        </button>
    </div>

    <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden md:hidden bg-white/95 backdrop-blur-xl border-t border-[#b9b893]/10 absolute w-full left-0 top-full shadow-xl z-40">
        <div class="max-w-md mx-auto py-4 px-6 space-y-1">
            <a href="index.php" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-all duration-200 font-medium">
                <i class="fas fa-home mr-3 w-5 text-center text-[#b9b893]"></i> Beranda
            </a>
            <a href="visi-misi.php" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-all duration-200 font-medium">
                <i class="fas fa-bullseye mr-3 w-5 text-center text-[#b9b893]"></i> Visi & Misi
            </a>
            <a href="struktur.php" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-all duration-200 font-medium">
                <i class="fas fa-sitemap mr-3 w-5 text-center text-[#b9b893]"></i> Struktur
            </a>
            <a href="kegiatan.php" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-all duration-200 font-medium">
                <i class="fas fa-calendar-alt mr-3 w-5 text-center text-[#b9b893]"></i> Kegiatan
            </a>
            <a href="aspirasi.php" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-all duration-200 font-medium">
                <i class="fas fa-comment-dots mr-3 w-5 text-center text-[#b9b893]"></i> Aspirasi
            </a>
            <a href="kontak.php" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#b9b893]/10 hover:text-[#6f6e50] transition-all duration-200 font-medium">
                <i class="fas fa-envelope mr-3 w-5 text-center text-[#b9b893]"></i> Kontak
            </a>
            <div class="border-t border-gray-100 my-2"></div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="admin.php" class="flex items-center px-4 py-3 rounded-xl bg-gradient-to-r from-[#6f6e50] to-[#8a896b] text-white font-semibold shadow-md">
                    <i class="fas fa-gauge-high mr-3 w-5 text-center"></i> Dashboard
                </a>
            <?php else: ?>
                <a href="login.php" class="flex items-center px-4 py-3 rounded-xl border-2 border-[#b9b893] text-[#6f6e50] font-semibold hover:bg-[#6f6e50] hover:text-white transition-all">
                    <i class="fas fa-sign-in-alt mr-3 w-5 text-center"></i> Login
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            if (mobileMenu.classList.contains('hidden')) {
                menuIcon.className = 'fas fa-bars text-[#6f6e50] text-xl';
            } else {
                menuIcon.className = 'fas fa-times text-[#6f6e50] text-xl';
            }
        });
    }

    // Desktop Dropdown
    const desktopMenuBtn = document.getElementById('desktopMenuBtn');
    const desktopDropdown = document.getElementById('desktopDropdown');
    
    if (desktopMenuBtn && desktopDropdown) {
        desktopMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            desktopDropdown.classList.toggle('hidden');
            setTimeout(() => {
                desktopDropdown.classList.toggle('opacity-0');
                desktopDropdown.classList.toggle('scale-95');
            }, 10);
        });

        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (!desktopMenuBtn.contains(e.target) && !desktopDropdown.contains(e.target)) {
                if (!desktopDropdown.classList.contains('hidden')) {
                    desktopDropdown.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => {
                        desktopDropdown.classList.add('hidden');
                    }, 200);
                }
            }
        });
    }

    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('mainNav');
        if (nav) {
            if (window.scrollY > 50) {
                nav.classList.add('shadow-md');
                nav.classList.remove('shadow-sm');
            } else {
                nav.classList.remove('shadow-md');
                nav.classList.add('shadow-sm');
            }
        }
    });

    // Helper Toast Notifications Function
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;

        const toast = document.createElement('div');
        toast.className = `toast ${type}`;

        const icon = type === 'success' ? '<i class="fas fa-check-circle text-green-500 text-lg"></i>' : '<i class="fas fa-exclamation-circle text-red-500 text-lg"></i>';

        toast.innerHTML = `
            ${icon}
            <div>
                <p class="font-semibold text-sm">${type === 'success' ? 'Sukses' : 'Error'}</p>
                <p class="text-xs text-gray-500">${message}</p>
            </div>
        `;

        container.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3500);
    }
</script>
