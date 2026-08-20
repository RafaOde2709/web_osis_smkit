<?php
require_once 'config/auth.php';
require_once 'config/database.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header("Location: admin.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        try {
            $pdo = getDBConnection();
            $stmt = $pdo->prepare("SELECT id, username, password_hash, role FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                // Regenerasi session ID untuk mencegah Session Fixation Attack
                session_regenerate_id(true);
                // Success
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header("Location: admin.php");
                exit();
            } else {
                $error = 'Username atau password salah!';
            }
        } catch (PDOException $e) {
            error_log('[LOGIN ERROR] ' . $e->getMessage()); // catat di server log
            $error = 'Terjadi kesalahan sistem. Silakan coba lagi.';
        }
    } else {
        $error = 'Silakan isi username dan password!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OSIS SMKIT Ibnul Qayyim</title>

    <link rel="icon" type="image/png" sizes="32x32" href="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gradient-to-br from-[#f5f5f0] via-[#e8e7d4] to-[#d4d3b8] min-h-screen">

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white/90 backdrop-blur-xl p-8 md:p-10 rounded-2xl shadow-2xl w-full max-w-md relative overflow-hidden border border-white/50">
            <!-- Decorative -->
            <div class="absolute -top-16 -right-16 w-40 h-40 bg-gradient-to-br from-[#b9b893]/30 to-[#6f6e50]/10 rounded-full"></div>
            <div class="absolute -bottom-12 -left-12 w-32 h-32 bg-[#b9b893]/10 rounded-full"></div>

            <div class="relative z-10">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#b9b893]/20 to-[#6f6e50]/10 flex items-center justify-center shadow-sm">
                        <img src="Pink and Yellow Textured Illustrative English Nature and Elements of Communication Educational Presentation 1.png" alt="Logo" class="w-14 rounded-xl">
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800" style="font-family:'Poppins',sans-serif;">Admin Login</h2>
                    <p class="text-gray-400 text-sm mt-1">Sistem Informasi OSIS SMKIT Ibnul Qayyim</p>
                </div>

                <?php if ($error): ?>
                    <div class="bg-red-50 border border-red-200 text-red-600 p-4 mb-6 rounded-xl flex items-center gap-3 text-sm" role="alert">
                        <i class="fas fa-exclamation-circle text-lg shrink-0"></i>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    </div>
                <?php endif; ?>

                <form method="POST" action="login.php" class="space-y-5">
                    <div>
                        <label class="block text-gray-600 font-medium mb-2 text-sm">Username</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#b9b893]"><i class="fas fa-user"></i></span>
                            <input type="text" name="username" class="input-modern w-full pl-11 pr-4 py-3.5 rounded-xl outline-none text-sm" required autofocus placeholder="Masukkan username">
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-600 font-medium mb-2 text-sm">Password</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#b9b893]"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="input-modern w-full pl-11 pr-4 py-3.5 rounded-xl outline-none text-sm" required placeholder="Masukkan password">
                        </div>
                    </div>
                    <button type="submit" class="btn-shine w-full bg-gradient-to-r from-[#6f6e50] to-[#8a896b] text-white py-4 rounded-xl font-bold shadow-lg shadow-[#b9b893]/20 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 text-sm tracking-wide uppercase">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <a href="index.php" class="text-sm text-gray-400 hover:text-[#6f6e50] transition-colors group">
                        <i class="fas fa-arrow-left mr-1 group-hover:-translate-x-1 transition-transform inline-block"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
