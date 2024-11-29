<?php
// Biến để lưu thông báo
$message = "";
// Xử lý form khi người dùng gửi dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));

    if (empty($title) || empty($content)) {
        $message = "Tiêu đề và nội dung không được để trống.";
    } else {
        try {
            // Tạo kết nối
            $conn = new PDO("mysql:host=localhost;dbname=articles", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Chuẩn bị câu lệnh SQL để chèn dữ liệu
            $sql = "INSERT INTO article (title, content) VALUES (:title, :content)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);

            // Thực hiện câu lệnh
            $stmt->execute();
            $message = "Bài viết đã được thêm thành công!";
        } catch (PDOException $e) {
            $message = "Lỗi: " . $e->getMessage();
        }
        // Đóng kết nối
        $conn = null;
    }
}
?>