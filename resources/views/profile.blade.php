<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }

        .profile {
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .profile p {
            margin: 12px 0;
        }

        .label {
            font-weight: bold;
        }

        .password-form {
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .password-form label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        .password-form input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .btn {
            margin-top: 20px;
            padding: 8px 16px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            color: #166534;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <h1>Profil Pengguna</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile">

        <p>
            <span class="label">Nama:</span>
            {{ $user->name }}
        </p>

        <p>
            <span class="label">Email:</span>
            {{ $user->email }}
        </p>

        <p>
            <span class="label">Role:</span>
            {{ ucfirst($user->role) }}
        </p>

    </div>


    <div class="password-form">

        <h2>Ubah Password</h2>

        <form action="{{ route('profil.password') }}" method="POST">
            @csrf

            <label for="password_lama">Password Lama</label>
            <input
                type="password"
                name="password_lama"
                id="password_lama"
            >

            @error('password_lama')
                <div class="error">{{ $message }}</div>
            @enderror


            <label for="password_baru">Password Baru</label>
            <input
                type="password"
                name="password_baru"
                id="password_baru"
            >

            @error('password_baru')
                <div class="error">{{ $message }}</div>
            @enderror


            <label for="password_baru_confirmation">
                Konfirmasi Password Baru
            </label>

            <input
                type="password"
                name="password_baru_confirmation"
                id="password_baru_confirmation"
            >


            <button type="submit" class="btn">
                Ubah Password
            </button>

        </form>

    </div>


    <p>
        <a href="{{ route('books.index') }}">
            ← Kembali ke Buku
        </a>
    </p>

</body>

</html>