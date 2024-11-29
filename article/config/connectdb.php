<?php
session_start();
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    header("Location: ../project03/article/view/login.php");
    exit;
}
try {
    // Kết nối database
    $conn = new PDO("mysql:host=localhost;dbname=articles", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Xác định số bài viết trên mỗi trang
    $articlesPerPage = 5;

    // Xác định trang hiện tại
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $articlesPerPage;

    // Lấy tổng số bài viết
    $totalStmt = $conn->prepare("SELECT COUNT(*) FROM article");
    $totalStmt->execute();
    $totalArticles = $totalStmt->fetchColumn();

    $totalPages = ceil($totalArticles / $articlesPerPage);

    // Lấy các bài viết cho trang hiện tại
    $stmt = $conn->prepare("SELECT id,title,content FROM article ORDER BY id DESC LIMIT :start, :limit");
    $stmt->bindParam(':start', $start, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $articlesPerPage, PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
    $articles = [];
}
// echo "<pre>";
// print_r($articles);
// echo "</pre>";
?>