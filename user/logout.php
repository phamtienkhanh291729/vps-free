<?php
// Bắt đầu session an toàn
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Xóa toàn bộ biến session
$_SESSION = [];

// Nếu có cookie lưu session, xoá luôn
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Huỷ session trên server
session_destroy();

// Chuyển hướng an toàn về trang đăng nhập
header("Location: login.php");
exit;
?>
