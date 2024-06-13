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
            <form action="{{ route('registerProcess') }}" method="POST">
                @csrf
                <h1 class="text-green">Daftar</h1>
                <div class="form-control">
                    <input type="text" name="name" id="username" placeholder="Nama User" value="{{ old('name') }}" />
                    <small id="username-error">{{ $errors->first('name') }}</small>
                    <span></span>
                </div>
                <div class="form-control">
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" />
                    <small id="email-error">{{ $errors->first('email') }}</small>
                    <span></span>
                </div>
                <div class="form-control">
                    <input type="password" name="password" id="password" placeholder="Kata Sandi" />
                    <small id="password-error">{{ $errors->first('password') }}</small>
                    <span></span>
                </div>
                {{-- <div class="form-control">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Kata Sandi" />
                    <small id="password_confirmation-error">{{ $errors->first('password_confirmation') }}</small>
                    <span></span>
                </div> --}}
                <button type="submit" value="submit">Daftar</button>
            </form>
        </div>

        <div class="form-container login-container">
            <form class="form-lg" action="{{ route('loginProcess') }}" method="POST">
                @csrf
                <h1 class="text-green">Login</h1>
                <div class="form-control2">
                    <input type="email" name="email" class="email-2" placeholder="Email" />
                    <small class="email-error-2">{{ $errors->first('email') }}</small>
                    <span></span>
                </div>
                <div class="form-control2">
                    <input type="password" name="password" class="password-2" placeholder="Password" />
                    <small class="password-error-2">{{ $errors->first('password') }}</small>
                    <span></span>
                </div>
                <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" name="checkbox" id="checkbox" />
                        <label for="checkbox">Pengingat</label>
                    </div>
                    <div class="pass-link">
                        <a href="#">Lupa Password?</a>
                    </div>
                </div>
                <button type="submit" value="submit">Masuk</button>
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
                        Perjalanan anda sekarang
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
