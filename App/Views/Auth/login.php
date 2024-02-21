<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <h2 class="text-center">Đăng nhập</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email...">
                    </div>
                    <div class="mb-3">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Email...">
                    </div>
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                    <hr>
                    <p class="text-center"><a href="<?= _WEB_ROOT . '/Auth/register' ?>">Đăng ký tài khoản</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>