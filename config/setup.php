<?php
// config/setup.php

// === KEAMANAN: Blokir akses langsung dari browser ===
// File ini hanya boleh dijalankan SEKALI saat instalasi awal.
// Setelah setup selesai, hapus atau rename file ini.
if (isset($_SERVER['HTTP_HOST'])) {
    http_response_code(403);
    die('<h1>403 Forbidden</h1><p>Akses ke halaman ini tidak diizinkan.</p>');
}
// =====================================================

define('DB_HOST_SETUP', 'localhost');
define('DB_USER_SETUP', 'root');
define('DB_PASS_SETUP', '');
define('DB_NAME_SETUP', 'osis_db');

echo "Memulai proses setup database...<br>";

try {
    // 1. Konek ke MySQL server (tanpa milih nama db dulu)
    $pdo = new PDO("mysql:host=" . DB_HOST_SETUP, DB_USER_SETUP, DB_PASS_SETUP);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 2. Buat database jika belum ada
    $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME_SETUP);
    echo "Database '" . DB_NAME_SETUP . "' berhasil dibuat/ditemukan.<br>";
    
    // 3. Konek ke database osis_db
    $pdo = new PDO("mysql:host=" . DB_HOST_SETUP . ";dbname=" . DB_NAME_SETUP, DB_USER_SETUP, DB_PASS_SETUP);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 4. Baca file setup.sql
    $sql = file_get_contents(__DIR__ . '/setup.sql');
    
    // 5. Jalankan query setup
    $pdo->exec($sql);
    echo "Tabel berhasil dibuat.<br>";
    
    // 6. Buat user admin default (admin / admin123)
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute(['admin']);
    if ($stmt->rowCount() == 0) {
        $hash = password_hash('admin123', PASSWORD_DEFAULT);
        $insert = $pdo->prepare("INSERT INTO users (username, password_hash, role) VALUES (?, ?, ?)");
        $insert->execute(['admin', $hash, 'admin']);
        echo "User admin default berhasil dibuat (username: admin, password: admin123).<br>";
    } else {
        echo "User admin sudah ada.<br>";
    }
    
    // (Opsional) Insert test data yang ada di SQLite jika mau
    $stmt = $pdo->prepare("SELECT id FROM kegiatan LIMIT 1");
    $stmt->execute();
    if($stmt->rowCount() == 0) {
        $insertKegiatan = $pdo->prepare("INSERT INTO kegiatan (title, description, image_url) VALUES (?, ?, ?)");
        $insertKegiatan->execute(['test', 'test description', '']);
        echo "Data kegiatan sample berhasil ditambahkan.<br>";
    }

    echo "<br><b>Setup selesai!</b> Silakan kembali ke <a href='../index.php'>Halaman Utama</a>.";

} catch (PDOException $e) {
    die("Setup gagal: " . $e->getMessage());
}
?>
