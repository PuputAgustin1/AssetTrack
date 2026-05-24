{{-- resources/views/welcome.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Aset</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    *{
        font-family: 'Poppins', sans-serif;
    }

    body{
        margin: 0;
        background: #f5f5f5;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .welcome-box{
        width: 100%;
        max-width: 500px;
        background: white;
        border-radius: 24px;
        padding: 50px 35px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .title{
        font-size: 38px;
        font-weight: 700;
        color: #111;
        margin-bottom: 15px;
    }

    .subtitle{
        color: #666;
        line-height: 1.8;
        margin-bottom: 35px;
        font-size: 15px;
    }

    .btn-custom{
        width: 100%;
        padding: 14px;
        border-radius: 14px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    .btn-login{
        background: #111;
        color: white;
    }

    .btn-login:hover{
        background: #2c2c2c;
    }

    .btn-register{
        background: #efefef;
        color: #111;
        border: 1px solid #ddd;
    }

    .btn-register:hover{
        background: #e5e5e5;
    }

    @media(max-width: 576px){

        .welcome-box{
            padding: 40px 25px;
        }

        .title{
            font-size: 30px;
        }

        .subtitle{
            font-size: 14px;
        }
    }
</style>
</head>
<body>

<div class="welcome-box">

    <div class="title">
        Monitoring Aset
    </div>

    <div class="subtitle">
        Sistem monitoring aset barang berbasis QR Code
        untuk membantu pengelolaan aset perusahaan
        menjadi lebih cepat dan efisien.
    </div>

    @auth

        <a href="{{ route('dashboard') }}"
           class="btn-custom btn-login">
            Dashboard
        </a>

    @else

        <a href="{{ route('login') }}"
           class="btn-custom btn-login">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="btn-custom btn-register">
            Register
        </a>

    @endauth

</div>

</body>
</html>