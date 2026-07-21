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
            <h2>Hai {{$user->username}}</h2>
            <p>
                Saat ini anda sudah terdaftar menjadi pengguna aplikasi Arsa Training K3. Berikut adalah detail akun anda.<br />
            </p>
            Username: {{$user->username}} <br />
            Password: {{$user->password_otomatis}} <br />
            <p>
                Email ini bersifat rahasia jangan bagikan kepada pihak lain. Harap segera mengganti password akun anda setelah menerima email ini.
                Terima Kasih.
            </p>
        </div>
    </div>
    <img src="https://www.arsatraining.com/storage/slider-%3Eimages/TokOBoyUilKvuI203ii1aRUrf1sm3JUtYUaB0brh.webp" alt="gambar" style="width:100%">
    <div>
        Regards, <br>
        Arsa Training Team
    </div>
</body>

</html>