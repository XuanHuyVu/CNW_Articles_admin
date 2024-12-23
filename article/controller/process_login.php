<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        // Kết nối database
        $conn = new PDO("mysql:host=localhost;dbname=articles", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: ../../articles_admin.php");
            exit;
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    } catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
        exit;
    }
}
?>