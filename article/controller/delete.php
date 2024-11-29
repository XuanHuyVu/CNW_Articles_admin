<?php
if (!isset($_GET['id'])) {
    header('Location: ../../articles_admin.php');
    exit();
}

$id = $_GET['id'];
try {
    $conn = new PDO("mysql:host=localhost;dbname=articles", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Delete article from database
    $stmt = $conn->prepare("DELETE FROM article WHERE id = ?");
    $stmt->execute([$id]);

    // Redirect with success message
    header('Location: ../../articles_admin.php?msg=deleted');
    exit();
} catch (PDOException $e) {
    // Redirect with error message
    echo "Lỗi: " . $e->getMessage();
    header('Location: ../../articles_admin.php?error=delete_failed');
    exit();
}
?>
