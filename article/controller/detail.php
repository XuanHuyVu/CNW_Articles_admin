<?php
try {
    // Kết nối database
    $conn = new PDO("mysql:host=localhost;dbname=articles", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $articleId = isset($_GET['id']) ? $_GET['id'] : 0;
    try {
        $stmt = $conn->prepare("SELECT id,title,content FROM article WHERE id = :id");
        $stmt->bindParam(':id', $articleId, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$article) {
            echo "Không tìm thấy bài viết";
        }
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        $article = [];
    }

} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
    $articles = [];
}

$conn = null;
// echo "<pre>";
// print_r($articles);
// echo "</pre>";
?>
