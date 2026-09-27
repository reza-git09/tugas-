<!DOCTYPE html>
<html>
<head>
    <title>Acara 18 - Eloquent ORM</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f5f5;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        input {
            padding: 8px;
            margin: 5px;
        }

        button {
            padding: 8px 15px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background: #eee;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Acara 18 - Eloquent ORM</h1>
    <p>CRUD menggunakan Laravel Eloquent ORM</p>

    <hr>

    <h2>Tambah User</h2>

    <form action="/eloquent-users/store" method="POST">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Nama"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
        >

        <button type="submit">
            Tambah Data
        </button>
    </form>

    <hr>

    <h2>Daftar User</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        @foreach ($users as $user)

        <tr>
            <td>{{ $user->id }}</td>

            <td>{{ $user->name }}</td>

            <td>{{ $user->email }}</td>

            <td>
                <form
                    action="/eloquent-users/update/{{ $user->id }}"
                    method="POST"
                >
                    @csrf

                    <input
                        type="text"
                        name="name"
                        value="{{ $user->name }}"
                        required
                    >

                    <input
                        type="email"
                        name="email"
                        value="{{ $user->email }}"
                        required
                    >

                    <button type="submit">
                        Update
                    </button>
                </form>
            </td>

            <td>
                <form
                    action="/eloquent-users/delete/{{ $user->id }}"
                    method="POST"
                >
                    @csrf

                    <button type="submit">
                        Delete
                    </button>
                </form>
            </td>
        </tr>

        @endforeach

    </table>

</div>

</body>
</html>