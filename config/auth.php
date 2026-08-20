<?php
// config/auth.php

// Konfigurasi keamanan session sebelum session_start()
ini_set('session.cookie_httponly', 1);   // Blokir akses JavaScript ke cookie session
ini_set('session.cookie_samesite', 'Strict'); // Proteksi CSRF dasar
// Aktifkan baris berikut jika sudah menggunakan HTTPS:
// ini_set('session.cookie_secure', 1);

session_start();

// HTTP Security Headers
if (!headers_sent()) {
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('X-XSS-Protection: 1; mode=block');
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function requireAdmin() {
    if (!isLoggedIn() || !isAdmin()) {
        header("Location: ../login.php");
        exit();
    }
}

function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'username' => $_SESSION['username'],
            'role' => $_SESSION['role']
        ];
    }
    return null;
}
?>
