<?php
// api/artikel.php
require_once '../config/database.php';
require_once '../config/auth.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$pdo = getDBConnection();

function createSlug($str) {
    $str = strtolower(trim($str));
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = preg_replace('/-+/', '-', $str);
    return rtrim($str, '-');
}

// CREATE
if ($method === 'POST') {
    requireAdmin();
    
    $action = $_POST['_method'] ?? 'POST';
    if ($action === 'PUT') {
        goto update_logic;
    }

    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $author = 'Admin'; 
    $slug = createSlug($title) . '-' . time();
    $image_url = '';

    if (empty($title) || empty($content)) {
        http_response_code(400);
        echo json_encode(['error' => 'Title and content are required']);
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
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $extMap = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp'];
        $filename = time() . '_' . bin2hex(random_bytes(8)) . '.' . $extMap[$mimeType];
        $destination = $uploadDir . $filename;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            $image_url = 'uploads/' . $filename;
        }
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO artikel (title, slug, content, image_url, author, category) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $slug, $content, $image_url, $author, $category]);
        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId(), 'message' => 'Artikel berhasil ditambah']);
    } catch (PDOException $e) {
        error_log('[API/ARTIKEL CREATE] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}

// UPDATE
update_logic:
if ($method === 'POST' && ($_POST['_method'] ?? '') === 'PUT') {
    requireAdmin();
    $id = $_POST['id'] ?? '';
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $category = trim($_POST['category'] ?? '');

    if (empty($id) || empty($title)) {
        http_response_code(400);
        echo json_encode(['error' => 'ID and Title are required']);
        exit;
    }

    try {
        // Handle optional new image upload
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
                
                $stmt = $pdo->prepare("SELECT image_url FROM artikel WHERE id = ?");
                $stmt->execute([$id]);
                $old = $stmt->fetch();
                if ($old && !empty($old['image_url']) && file_exists('../' . $old['image_url'])) {
                    unlink('../' . $old['image_url']);
                }

                $stmt = $pdo->prepare("UPDATE artikel SET title=?, content=?, category=?, image_url=? WHERE id=?");
                $stmt->execute([$title, $content, $category, $image_url, $id]);
            }
        } else {
            $stmt = $pdo->prepare("UPDATE artikel SET title=?, content=?, category=? WHERE id=?");
            $stmt->execute([$title, $content, $category, $id]);
        }
        echo json_encode(['success' => true, 'message' => 'Artikel diupdate']);
    } catch (PDOException $e) {
        error_log('[API/ARTIKEL UPDATE] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}

// READ
if ($method === 'GET') {
    try {
        $id = $_GET['id'] ?? null;
        $slug = $_GET['slug'] ?? null;
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetch();
        } else if ($slug) {
            $stmt = $pdo->prepare("SELECT * FROM artikel WHERE slug = ?");
            $stmt->execute([$slug]);
            $result = $stmt->fetch();
        } else {
            $stmt = $pdo->query("SELECT * FROM artikel ORDER BY created_at DESC");
            $result = $stmt->fetchAll();
        }
        echo json_encode($result);
    } catch (PDOException $e) {
        error_log('[API/ARTIKEL GET] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}

// DELETE
if ($method === 'DELETE') {
    requireAdmin();
    $id = $_GET['id'] ?? null;
    
    if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'ID is required']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT image_url FROM artikel WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row && !empty($row['image_url'])) {
            $filepath = '../' . $row['image_url'];
            if (file_exists($filepath)) unlink($filepath);
        }

        $stmt = $pdo->prepare("DELETE FROM artikel WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Artikel deleted']);
    } catch (PDOException $e) {
        error_log('[API/ARTIKEL DELETE] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}
?>
