
<?php
session_start();
unset($_SESSION['student_login']);
unset($_SESSION['teacher_login']);
unset($_SESSION['admin_login']);

// Удаление всех переменных сессии
$_SESSION = array();

// Удаление куки сессии
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

header("Location: index.php");
die();
?>