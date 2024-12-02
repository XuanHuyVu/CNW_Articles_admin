<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=articles;charset=utf8mb4", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = 'admin1';
    $password = password_hash('123456', PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    echo "Tài khoản admin đã được thêm!";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
