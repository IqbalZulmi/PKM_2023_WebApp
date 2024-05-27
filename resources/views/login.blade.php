<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <title>IoTrove Login</title>
    <link rel="stylesheet" href="{{ asset('login_assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container" id="container">
        <div class="form-container register-container">
            <form>
                <h1 class="text-green">Daftar</h1>
                <div class="form-control">
                    <input type="text" id="username" placeholder="Nama User" />
                    <small id="username-error"></small>
                    <span></span>
                </div>
                <div class="form-control">
                    <input type="email" id="email" placeholder="Email" />
                    <small id="email-error"></small>
                    <span></span>
                </div>
                <div class="form-control">
                    <input type="password" id="password" placeholder="Kata Sandi" />
                    <small id="password-error"></small>
                    <span></span>
                </div>
                <button type="submit" value="submit">Daftar</button>
            </form>
        </div>

        <div class="form-container login-container">
            <form class="form-lg">
                <h1 class="text-green">Masuk</h1>
                <div class="form-control2">
                    <input type="email" class="email-2" placeholder="Email" />
                    <small class="email-error-2"></small>
                    <span></span>
                </div>
                <div class="form-control2">
                    <input type="password" class="password-2" placeholder="Password" />
                    <small class="password-error-2"></small>
                    <span></span>
                </div>

                <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" name="checkbox" id="checkbox" />
                        <label for="">Pengingat</label>
                    </div>
                    <div class="pass-link">
                        <a href="#">Lupa Password?</a>
                    </div>
                </div>
                <button type="submit" value="submit">Masuk</button>
                <span>Masuk dengan</span>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">
                        Halo <br />
                        teman teman
                    </h1>
                    <p>Jika Anda memiliki akun, masuk di sini dan bersenang-senanglah</p>
                    <button class="ghost" id="login">
                        Gabung
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1 class="title">
                        Mulailah <br />
                        Perjalnan anda sekarang
                    </h1>
                    <p>
                        Jika Anda belum memiliki akun, bergabunglah dengan kami dan mulailah perjalanan Anda
                    </p>
                    <button class="ghost" id="register">
                        Daftar
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('login_assets/js/main.js') }}"></script>

</html>
