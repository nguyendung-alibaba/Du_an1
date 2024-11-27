<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập admin</title>
    <style>
        /* Hiệu ứng mờ dần khi tải trang */
        .login-box {
            opacity: 0;
            transform: translateY(-30px);
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Khung input mặc định */
        .input-group input {
            border: 2px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            transition: all 0.3s ease-in-out;
        }

        /* Hiệu ứng focus */
        .input-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.6);
            background: linear-gradient(120deg, #f0f9ff, #dff6ff);
        }

        /* Hiệu ứng lắc khi bỏ trống input */
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }
        }

        .shake {
            animation: shake 0.5s;
        }

        /* Hiệu ứng nút Sign In khi hover */
        .btn-primary {
            position: relative;
            overflow: hidden;
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-primary::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 200%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: skewX(-45deg);
            transition: left 0.5s ease-in-out;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">Shop thú cưng</a>
            </div>
            <div class="card-body">
            <div class="form-group">
                  <?php if (isset($_SESSION['error'])) { ?>
                    <p class="text-danger login-box-msg"><?= $_SESSION['error'] ?></p>
                  <?php }else{?><p class="login-box-msg">Vui long dang nhap</p>
                  <?php } ?>
                </div>

                <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
                    <div class="input-group mb-3">
                        <input tabindex="1" type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input tabindex="2" type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">Quên mật khẩu</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Chuyển focus khi nhấn Enter ở ô email
        document.querySelector('form').addEventListener('keydown', function(e) {
            const emailInput = document.querySelector('input[type="email"]');
            const passwordInput = document.querySelector('input[type="password"]');

            if (e.key === 'Enter' && document.activeElement === emailInput) {
                e.preventDefault();
                passwordInput.focus();
            }
        });

        // Hiệu ứng lắc nếu input bị bỏ trống
        document.querySelector('form').addEventListener('submit', function(e) {
            const inputs = document.querySelectorAll('input');
            let hasError = false;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('shake');
                    hasError = true;
                }
            });

            if (hasError) {
                e.preventDefault();
                setTimeout(() => {
                    inputs.forEach(input => input.classList.remove('shake'));
                }, 500);
            }
        });
    </script>
</body>

</html>