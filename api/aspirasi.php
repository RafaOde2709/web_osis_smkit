<?php
// api/aspirasi.php
require_once '../config/database.php';
require_once '../config/auth.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$pdo = getDBConnection();

// CREATE (Publicly accessible)
if ($method === 'POST') {
    // Parse JSON or Form Data
    if (strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
        $_POST = json_decode(file_get_contents('php://input'), true) ?: [];
    }

    $name = trim($_POST['name'] ?? '');
    $class = trim($_POST['class'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($class) || empty($category) || empty($message)) {
        http_response_code(400);
        echo json_encode(['error' => 'Class, category, and message are required']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO aspirasi (name, class, category, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $class, $category, $message]);
        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId(), 'message' => 'Aspirasi submitted']);
    } catch (PDOException $e) {
        error_log('[API/ASPIRASI] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}

// READ (Admin only)
if ($method === 'GET') {
    requireAdmin();
    try {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM aspirasi WHERE id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetch();
        } else {
            $stmt = $pdo->query("SELECT * FROM aspirasi ORDER BY created_at DESC");
            $result = $stmt->fetchAll();
        }
        echo json_encode($result);
    } catch (PDOException $e) {
        error_log('[API/ASPIRASI] ' . $e->getMessage());
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
        $stmt = $pdo->prepare("DELETE FROM aspirasi WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Aspirasi deleted']);
    } catch (PDOException $e) {
        error_log('[API/ASPIRASI] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}
?>
