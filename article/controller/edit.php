<?php
$message = "";

$article_id = isset($_GET['id']) ? $_GET['id'] : 0;

try {
    $conn = new PDO("mysql:host=localhost;dbname=articles", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));

        if (empty($title) || empty($content)) {
            $message = "Tiêu đề và nội dung không được để trống.";
        } else {
            $stmt = $conn->prepare("UPDATE article SET title = :title, content = :content WHERE id = :id");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':id', $article_id);
            $stmt->execute();
            header("Location: ../../articles_admin.php");
        }
    } else {
        $stmt = $conn->prepare("SELECT title, content FROM article WHERE id = :id");
        $stmt->bindParam(':id', $article_id);
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$article) {
            echo "Bài viết không tồn tại.";
            exit;
        }
    }
} catch (PDOException $e) {
    $message = "Lỗi: " . $e->getMessage();
} finally {
    $conn = null;
}
?>