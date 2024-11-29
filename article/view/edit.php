<?php
require_once '../controller/edit.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Quản lý bài viết | Sửa bài viết</title>
</head>

<body>
    <h2 class="text-primary text-center text-uppercase mt-3">Sửa bài viết</h2>
    <?php if (!empty($message)) : ?>
        <div class="alert alert-primary text-center" role="alert">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="card shadow col-md-8">
                <div class="card-body">
                    <form method="post">
                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Tiêu đề:</label>
                            <input class="form-control" type="text" name="title" id="title" value="<?php echo htmlspecialchars($article['title'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold">Nội dung:</label>
                            <textarea class="form-control" name="content" id="content" cols="60" rows="10" required><?php echo htmlspecialchars($article['content'] ?? ''); ?></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success m-3" type="submit">Sửa</button>
                            <button class="btn btn-danger m-3" type="button" onclick="window.location.href='../../articles_admin.php';">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
