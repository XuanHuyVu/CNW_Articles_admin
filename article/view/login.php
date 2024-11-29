<?php
require_once '../controller/process_login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Quản lý bài viết | Đăng nhập</title>
</head>

<body>
    <h2 class="text-primary text-center text-uppercase mt-3">Đăng nhập</h2>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="card shadow col-md-8">
                <div class="card-body">
                    <form method="post">
                        <div class="mb-4">
                            <label for="username" class="form-label fw-bold">Tên đăng nhập:</label>
                            <input class="form-control" type="text" name="username" id="username" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Mật khẩu:</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success m-3" type="submit">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>