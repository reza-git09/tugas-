<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi Laravel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 40px;
        }

        .container {
            width: 450px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            background: #ffe5e5;
            color: #b00000;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Form Data Pengguna</h2>

    @if ($errors->any())
        <div class="error">
            <strong>Terdapat kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/form/submit" method="POST">

        @csrf

        <label for="name">Nama</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name') }}"
        >

        <label for="email">Email</label>
        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
        >

        <label for="password">Password</label>
        <input
            type="password"
            name="password"
            id="password"
        >

        <label for="password_confirmation">
            Konfirmasi Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
        >

        <button type="submit">
            Kirim Data
        </button>

    </form>

</div>

</body>
</html>