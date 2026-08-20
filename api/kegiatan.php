<?php
// api/kegiatan.php
require_once '../config/database.php';
require_once '../config/auth.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$pdo = getDBConnection();

// CREATE
if ($method === 'POST') {
    requireAdmin();
    
    // Check if it's an update (method spoofing via POST)
    $action = $_POST['_method'] ?? 'POST';
    if ($action === 'PUT') {
        goto update_logic;
    }

    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image_url = '';

    if (empty($title)) {
        http_response_code(400);
        echo json_encode(['error' => 'Title is required']);
        exit;
    }

    // Handle Image Upload dengan validasi MIME type
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $_FILES['image']['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mimeType, $allowedMimes)) {
            http_response_code(400);
            echo json_encode(['error' => 'Tipe file tidak diizinkan. Hanya gambar (JPG, PNG, GIF, WEBP) yang boleh diupload.']);
            exit;
        }

        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $extMap = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp'];
        $filename = time() . '_' . bin2hex(random_bytes(8)) . '.' . $extMap[$mimeType];
        $destination = $uploadDir . $filename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            $image_url = 'uploads/' . $filename;
        }
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO kegiatan (title, description, image_url) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $image_url]);
        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId(), 'message' => 'Kegiatan berhasil ditambah']);
    } catch (PDOException $e) {
        error_log('[API/KEGIATAN CREATE] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}

// UPDATE (reached via POST with _method=PUT)
update_logic:
if ($method === 'POST' && ($_POST['_method'] ?? '') === 'PUT') {
    requireAdmin();
    
    $id = $_POST['id'] ?? '';
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (empty($id) || empty($title)) {
        http_response_code(400);
        echo json_encode(['error' => 'ID and Title are required']);
        exit;
    }

    try {
        // Handle optional new image upload dengan validasi MIME type
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $_FILES['image']['tmp_name']);
            finfo_close($finfo);

            if (!in_array($mimeType, $allowedMimes)) {
                http_response_code(400);
                echo json_encode(['error' => 'Tipe file tidak diizinkan. Hanya gambar (JPG, PNG, GIF, WEBP) yang boleh diupload.']);
                exit;
            }

            $uploadDir = '../uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
            $extMap = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp'];
            $filename = time() . '_' . bin2hex(random_bytes(8)) . '.' . $extMap[$mimeType];
            $destination = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $image_url = 'uploads/' . $filename;

                // Hapus gambar lama
                $stmt = $pdo->prepare("SELECT image_url FROM kegiatan WHERE id = ?");
                $stmt->execute([$id]);
                $old = $stmt->fetch();
                if ($old && !empty($old['image_url']) && file_exists('../' . $old['image_url'])) {
                    unlink('../' . $old['image_url']);
                }

                $stmt = $pdo->prepare("UPDATE kegiatan SET title = ?, description = ?, image_url = ? WHERE id = ?");
                $stmt->execute([$title, $description, $image_url, $id]);
            }
        } else {
            $stmt = $pdo->prepare("UPDATE kegiatan SET title = ?, description = ? WHERE id = ?");
            $stmt->execute([$title, $description, $id]);
        }

        echo json_encode(['success' => true, 'message' => 'Kegiatan berhasil diupdate']);
    } catch (PDOException $e) {
        error_log('[API/KEGIATAN UPDATE] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}

// READ
if ($method === 'GET') {
    try {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM kegiatan WHERE id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetch();
            if (!$result) {
                http_response_code(404);
                echo json_encode(['error' => 'Not found']);
                exit;
            }
        } else {
            $stmt = $pdo->query("SELECT * FROM kegiatan ORDER BY created_at DESC");
            $result = $stmt->fetchAll();
        }
        echo json_encode($result);
    } catch (PDOException $e) {
        error_log('[API/KEGIATAN GET] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}

// DELETE
if ($method === 'DELETE') {
    requireAdmin();
    
    // Parsing input for DELETE method (usually sent as raw JSON or query string manually)
    // Tapi karena php tidak parse raw DELETE request formData otomatis, kita baca input file
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $_GET['id'] ?? ($data['id'] ?? null);

    if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'ID is required']);
        exit;
    }

    try {
        // Get image path to delete file
        $stmt = $pdo->prepare("SELECT image_url FROM kegiatan WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        
        if ($row && !empty($row['image_url'])) {
            $filepath = '../' . $row['image_url'];
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }

        $stmt = $pdo->prepare("DELETE FROM kegiatan WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Kegiatan deleted']);
    } catch (PDOException $e) {
        error_log('[API/KEGIATAN DELETE] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}
?>
