<?php
// api/agenda.php
require_once '../config/database.php';
require_once '../config/auth.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$pdo = getDBConnection();

// CREATE
if ($method === 'POST') {
    requireAdmin();
    
    $action = $_POST['_method'] ?? 'POST';
    if ($action === 'PUT') {
        goto update_logic;
    }

    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $type = trim($_POST['type'] ?? '');
    $time_start = trim($_POST['time_start'] ?? '');
    $time_end = trim($_POST['time_end'] ?? '');

    if (empty($title) || empty($date)) {
        http_response_code(400);
        echo json_encode(['error' => 'Title and date are required']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO agenda (title, description, date, type, time_start, time_end) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $date, $type, $time_start, $time_end]);
        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId(), 'message' => 'Agenda berhasil ditambah']);
    } catch (PDOException $e) {
        error_log('[API/AGENDA] ' . $e->getMessage());
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
    $description = trim($_POST['description'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $type = trim($_POST['type'] ?? '');
    $time_start = trim($_POST['time_start'] ?? '');
    $time_end = trim($_POST['time_end'] ?? '');

    if (empty($id) || empty($title) || empty($date)) {
        http_response_code(400);
        echo json_encode(['error' => 'ID, Title, and Date are required']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("UPDATE agenda SET title=?, description=?, date=?, type=?, time_start=?, time_end=? WHERE id=?");
        $stmt->execute([$title, $description, $date, $type, $time_start, $time_end, $id]);
        echo json_encode(['success' => true, 'message' => 'Agenda diupdate']);
    } catch (PDOException $e) {
        error_log('[API/AGENDA] ' . $e->getMessage());
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
            $stmt = $pdo->prepare("SELECT * FROM agenda WHERE id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetch();
        } else {
            $stmt = $pdo->query("SELECT * FROM agenda ORDER BY date ASC");
            $result = $stmt->fetchAll();
        }
        echo json_encode($result);
    } catch (PDOException $e) {
        error_log('[API/AGENDA] ' . $e->getMessage());
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
        $stmt = $pdo->prepare("DELETE FROM agenda WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Agenda deleted']);
    } catch (PDOException $e) {
        error_log('[API/AGENDA] ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Terjadi kesalahan server.']);
    }
    exit;
}
?>
