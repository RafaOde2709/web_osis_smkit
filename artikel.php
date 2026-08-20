<?php
require_once 'config/database.php';

$pdo = getDBConnection();
$slug = htmlspecialchars(trim($_GET['slug'] ?? ''), ENT_QUOTES, 'UTF-8');
$artikel = null;

if ($slug) {
    $stmt = $pdo->prepare("SELECT * FROM artikel WHERE slug = ?");
    $stmt->execute([$slug]);
    $artikel = $stmt->fetch();
}

if (!$artikel) {
    http_response_code(404);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Tidak Ditemukan | OSIS SMKIT Ibnul Qayyim</title>

    <link rel="icon" type="image/png" sizes="32x32" href="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-[#fafaf7] text-gray-800 flex items-center justify-center min-h-screen">
    <?php require_once 'includes/header.php'; ?>
    <div class="text-center px-6 py-32">
        <div class="w-24 h-24 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center">
            <i class="fas fa-newspaper text-4xl text-[#6f6e50]"></i>
        </div>
        <h1 class="text-6xl font-extrabold text-[#6f6e50] mb-3" style="font-family:'Poppins',sans-serif;">404</h1>
        <h2 class="text-2xl font-bold text-gray-800 mb-3" style="font-family:'Poppins',sans-serif;">Artikel Tidak Ditemukan</h2>
        <p class="text-gray-500 mb-8 max-w-md mx-auto">Artikel yang Anda cari mungkin sudah dihapus atau tautannya tidak valid.</p>
        <a href="kegiatan.php" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#6f6e50] to-[#8a896b] text-white font-bold px-8 py-3 rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
            <i class="fas fa-arrow-left"></i> Kembali ke Kegiatan
        </a>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</body>
</html>
<?php
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($artikel['title']); ?> | OSIS SMKIT Ibnul Qayyim</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-[#fafaf7] text-gray-800">

    <?php require_once 'includes/header.php'; ?>

    <!-- ARTICLE HEADER -->
    <header class="pt-32 pb-12 bg-white" data-aos="fade-down">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <span class="inline-block bg-[#6f6e50] text-white px-4 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider mb-5">
                <?php echo htmlspecialchars($artikel['category']); ?>
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6" style="font-family:'Poppins',sans-serif;">
                <?php echo htmlspecialchars($artikel['title']); ?>
            </h1>
            <div class="flex items-center justify-center gap-4 text-gray-400 text-sm">
                <span class="flex items-center"><i class="fas fa-user-circle mr-2 text-[#b9b893]"></i> <?php echo htmlspecialchars($artikel['author']); ?></span>
                <span class="text-gray-200">•</span>
                <span class="flex items-center"><i class="fas fa-calendar-alt mr-2 text-[#b9b893]"></i> <?php echo date('d F Y', strtotime($artikel['created_at'])); ?></span>
            </div>
        </div>
    </header>

    <!-- ARTICLE BODY -->
    <main class="max-w-4xl mx-auto px-6 pb-20">
        <?php if ($artikel['image_url']): ?>
            <div class="w-full h-64 md:h-[500px] rounded-2xl overflow-hidden shadow-xl mb-12 border border-gray-100" data-aos="zoom-in">
                <img src="<?php echo htmlspecialchars($artikel['image_url']); ?>" alt="<?php echo htmlspecialchars($artikel['title']); ?>" class="w-full h-full object-cover">
            </div>
        <?php endif; ?>

        <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 mb-10 prose prose-lg max-w-none text-gray-600 leading-relaxed" data-aos="fade-up">
            <?php echo nl2br(htmlspecialchars($artikel['content'])); ?>
        </div>

        <!-- Bottom Bar -->
        <div class="bg-gradient-to-r from-[#f5f5f0] to-[#e8e7d4] p-6 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4" data-aos="fade-up">
            <a href="kegiatan.php" class="text-[#6f6e50] font-semibold hover:text-[#4a4933] transition flex items-center group">
                <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i> Kembali ke Kegiatan
            </a>
            <div class="flex items-center gap-3">
                <span class="text-gray-400 text-sm">Bagikan:</span>
                <a href="#" class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-blue-600 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all"><i class="fab fa-facebook-f text-sm"></i></a>
                <a href="#" class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-sky-500 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all"><i class="fab fa-twitter text-sm"></i></a>
                <a href="#" class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-green-500 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all"><i class="fab fa-whatsapp text-sm"></i></a>
            </div>
        </div>
    </main>

    <?php require_once 'includes/footer.php'; ?>
</body>
</html>
