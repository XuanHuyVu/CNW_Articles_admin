<?php
require_once './article/config/connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body class="container">
    <div class="row mt-3">
        <h2 class="text-primary text-center text-uppercase">Quản lý bài viết</h2>
    </div>
    <div class="text-end m-3">
        <a href="article/controller/logout.php" class="btn btn-danger">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
    </div>
    <div class="m-3">
        <a href="article/view/create.php" class="btn btn-success"><i class="fas fa-circle-plus"></i> Thêm bài viết</a>
    </div>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $index => $article): ?>
                    <tr>
                        <td class="text-center"><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars(substr($article['title'], offset:0, length:100)); ?></td>
                        <td><?php echo htmlspecialchars($article['content']); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="article/view/detail.php?id=<?php echo $article['id']; ?>"
                                    class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                <a href="article/view/edit.php?id=<?php echo $article['id']; ?>" class="btn btn-sm btn-primary"><i
                                        class="fas fa-pen-to-square"></i></a>
                                <a href="article/controller/delete.php?id=<?php echo $article['id']; ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')"><i
                                        class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">
                        <div class="alert alert-warning">Không có bài viết nào.</div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                    $maxPagesToShow = 5;
                    $halfMax = floor($maxPagesToShow / 2);

                    // Tính toán vùng trang
                    $start = max(1, min($page - $halfMax, $totalPages - $maxPagesToShow + 1));
                    $end = min($totalPages, $start + $maxPagesToShow - 1);

                    // Hiển thị nút đầu và cuối nếu cần thiết
                    $showFirstPage = $start > 1;
                    $showLastPage = $end < $totalPages;
                    ?>

                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                            </li>
                        <?php endif; ?>

                        <?php
                        // Hiển thị nút trang đầu tiên nếu không nằm trong phạm vi
                        if ($showFirstPage): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=1">1</a>
                            </li>
                            <?php if ($start > 2): ?>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php for ($i = $start; $i <= $end; $i++): ?>
                            <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php
                        // Hiển thị nút trang cuối cùng nếu không nằm trong phạm vi
                        if ($showLastPage): ?>
                            <?php if ($end < $totalPages - 1): ?>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            <?php endif; ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $totalPages; ?>"><?php echo $totalPages; ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </ul>
            </nav>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>