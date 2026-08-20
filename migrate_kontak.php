<?php
// Script migrasi: buat tabel kontak + hapus data kontak yg salah masuk ke aspirasi
// HAPUS FILE INI SETELAH DIJALANKAN!

require_once 'config/database.php';

try {
    $pdo = getDBConnection();

    // 1. Buat tabel kontak baru
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS kontak (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            no_wa VARCHAR(30),
            pesan TEXT NOT NULL,
            is_read TINYINT(1) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
    echo "✅ Tabel <strong>kontak</strong> berhasil dibuat.<br>";

    // 2. Hapus data yang salah masuk ke tabel aspirasi (kategori 'Pesan Kontak')
    $stmt = $pdo->prepare("DELETE FROM aspirasi WHERE category = 'Pesan Kontak'");
    $stmt->execute();
    $deleted = $stmt->rowCount();
    echo "🧹 <strong>{$deleted}</strong> data 'Pesan Kontak' yang salah masuk ke tabel aspirasi berhasil dihapus.<br>";

    echo "<br><div style='background:#d1fae5;padding:16px;border-radius:10px;font-family:sans-serif;'>
        <strong>✅ Migrasi selesai!</strong><br>
        Sekarang hapus file <code>migrate_kontak.php</code> ini, lalu refresh aplikasi Anda.
        <br><br>
        <a href='admin.php' style='background:#6f6e50;color:white;padding:8px 20px;border-radius:8px;text-decoration:none;font-weight:bold;'>→ Buka Admin Dashboard</a>
    </div>";

} catch (PDOException $e) {
    echo "<div style='background:#fee2e2;padding:16px;border-radius:10px;font-family:sans-serif;'>
        <strong>❌ Gagal:</strong> " . htmlspecialchars($e->getMessage()) . "
    </div>";
}
?>
