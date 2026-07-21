<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Konfirmasi Kode OTP</title>
</head>

<body>
    <div class="card" style="border-top:2px solid blue">
        <div class="card-body" style="margin-top:20px">
            <h2>Hai {{ $user }}</h2>
            Anda berhasil masuk ke Aplikasi Arsa Training K3.<br />
            Berikut adalah kode OTP Anda: <b>
                <h1 style="font-size: 30px">{{ $code }}</h1>
            </b>
            <p>Abaikan email ini jika anda tidak daftar atau masuk Aplikasi Arsa Training K3</p>
        </div>
    </div>
    <img src="https://www.arsatraining.com/storage/slider-%3Eimages/TokOBoyUilKvuI203ii1aRUrf1sm3JUtYUaB0brh.webp"
        alt="gambar" style="width:35%">
    <div>
        PT. ARSA JAYA PRIMA <br />
        - Jl. Panggungan Asri No.37A, Trihanggo, Gamping, Sleman, Yogyakarta <br />
        - (0274) 2250057 | 0823 2561 3477 <br />
        - admin@arsatraining.com | cs@arsatraining.com <br />
        - <a href="https://www.arsatraining.com">www.arsatraining.com </a>
    </div>
</body>

</html>
