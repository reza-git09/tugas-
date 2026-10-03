<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

    <h1>Welcome, {{ Auth::user()->name }}</h1>

    <p>Nama: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>ID User: {{ Auth::id() }}</p>

    @auth
        <p>Selamat datang, {{ Auth::user()->name }}</p>
    @endauth

    @guest
        <p>Silakan login untuk mengakses fitur ini.</p>
    @endguest

</body>
</html>