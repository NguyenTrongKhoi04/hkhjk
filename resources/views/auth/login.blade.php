<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập bằng Google</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Đăng nhập bằng Google</h2>
        <div class="text-center">
            <a href="{{ url('/auth/google') }}" class="btn btn-danger">Đăng nhập với Google</a>
        </div>
    </div>
</body>

</html>
