<?php
// Script sementara untuk reset password admin
// HAPUS FILE INI SETELAH DIGUNAKAN!

require_once 'config/database.php';

// ============================================
// GANTI PASSWORD DI SINI:
$username_target = 'admin';
$password_baru   = 'Admin@2025!';  // <-- ganti sesuai keinginan
// ============================================

$hash = password_hash($password_baru, PASSWORD_BCRYPT, ['cost' => 12]);

try {
    $pdo = getDBConnection();

    // Cek user ada atau tidak
    $stmt = $pdo->prepare("SELECT id, username FROM users WHERE username = ?");
    $stmt->execute([$username_target]);
    $user = $stmt->fetch();

    if ($user) {
        // Update password
        $update = $pdo->prepare("UPDATE users SET password_hash = ? WHERE username = ?");
        $update->execute([$hash, $username_target]);
        echo "<div style='font-family:sans-serif;max-width:480px;margin:60px auto;padding:32px;border:2px solid #6f6e50;border-radius:16px;background:#fafaf7;'>";
        echo "<h2 style='color:#6f6e50;'>✅ Password Berhasil Direset!</h2>";
        echo "<p><strong>Username:</strong> <code>{$username_target}</code></p>";
        echo "<p><strong>Password baru:</strong> <code>{$password_baru}</code></p>";
        echo "<p style='margin-top:20px;color:#888;font-size:13px;'>⚠️ <strong>Segera hapus file <code>reset_pw.php</code> ini setelah login berhasil!</strong></p>";
        echo "<a href='login.php' style='display:inline-block;margin-top:16px;background:#6f6e50;color:white;padding:10px 24px;border-radius:10px;text-decoration:none;font-weight:bold;'>→ Ke Halaman Login</a>";
        echo "</div>";
    } else {
        // Buat user admin baru jika belum ada
        $insert = $pdo->prepare("INSERT INTO users (username, password_hash, role) VALUES (?, ?, 'admin')");
        $insert->execute([$username_target, $hash]);
        echo "<div style='font-family:sans-serif;max-width:480px;margin:60px auto;padding:32px;border:2px solid #6f6e50;border-radius:16px;background:#fafaf7;'>";
        echo "<h2 style='color:#6f6e50;'>✅ Admin Baru Berhasil Dibuat!</h2>";
        echo "<p><strong>Username:</strong> <code>{$username_target}</code></p>";
        echo "<p><strong>Password:</strong> <code>{$password_baru}</code></p>";
        echo "<p style='margin-top:20px;color:#888;font-size:13px;'>⚠️ <strong>Segera hapus file <code>reset_pw.php</code> ini setelah login berhasil!</strong></p>";
        echo "<a href='login.php' style='display:inline-block;margin-top:16px;background:#6f6e50;color:white;padding:10px 24px;border-radius:10px;text-decoration:none;font-weight:bold;'>→ Ke Halaman Login</a>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<div style='font-family:sans-serif;max-width:480px;margin:60px auto;padding:32px;border:2px solid red;border-radius:16px;'>";
    echo "<h2 style='color:red;'>❌ Gagal Reset Password</h2>";
    echo "<p>Pastikan database sudah disetup terlebih dahulu.</p>";
    echo "<pre style='font-size:12px;color:#555;'>" . htmlspecialchars($e->getMessage()) . "</pre>";
    echo "</div>";
}
?>
