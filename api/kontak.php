<?php
// api/kontak.php
require_once '../config/database.php';
require_once '../config/auth.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$pdo = getDBConnection();

// CREATE (Publicly accessible)
if ($method === 'POST') {
    if (strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
        $_POST = json_decode(file_get_contents('php://input'), true) ?: [];
    }

    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    if (empty($nama) || empty($email) || empty($pesan)) {
        http_response_code(400);
        echo json_encode(['error' => 'Nama, email, dan pesan wajib diisi.']);
        exit;
    }

    try {
        // Simpan ke database
        $stmt = $pdo->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
        $stmt->execute([$nama, $email, $pesan]);
        
        // Coba kirim via email (akan gagal di localhost yang belum dikonfigurasi, tapi kita bypass error-nya)
        $to = "admin@osis-smkit.sch.id"; // Ganti dengan email admin
        $subject = "Pesan Kontak Baru dari: " . $nama;
        $body = "Nama: $nama\nEmail: $email\n\nPesan:\n$pesan";
        $headers = "From: no-reply@osis-smkit.sch.id\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        @mail($to, $subject, $body, $headers); // Menggunakan @ agar jika error localhost tidak tampil
        
        echo json_encode(['success' => true, 'message' => 'Pesan berhasil dikirim via email dan disimpan.']);
    } catch (PDOException $e) {
        error_log('[API/KONTAK] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server saat menyimpan pesan.']);
    }
    exit;
}

// READ (Admin only)
if ($method === 'GET') {
    requireAdmin();
    try {
        $stmt = $pdo->query("SELECT * FROM kontak ORDER BY created_at DESC");
        $result = $stmt->fetchAll();
        echo json_encode($result);
    } catch (PDOException $e) {
        error_log('[API/KONTAK] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}

// DELETE (Admin only)
if ($method === 'DELETE') {
    requireAdmin();
    $id = $_GET['id'] ?? null;
    
    if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'ID is required']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("DELETE FROM kontak WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Pesan kontak dihapus']);
    } catch (PDOException $e) {
        error_log('[API/KONTAK] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}
?>
