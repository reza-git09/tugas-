<!DOCTYPE html>
<html>
<head>
    <title>Acara 19 - Eloquent ORM</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 5px;
        }

        h2 {
            margin-top: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        h3 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #eee;
        }

        .empty {
            padding: 15px;
            background: #f8f8f8;
            color: #777;
        }

        .user-card {
            margin-top: 15px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .post-card {
            padding: 10px;
            margin-top: 10px;
            background: #f8f8f8;
            border-radius: 5px;
        }

        .post-card p {
            margin-bottom: 0;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Acara 19 - Eloquent ORM</h1>
    <p>Conditional Clause menggunakan Laravel Eloquent ORM</p>


    {{-- WHERE --}}
    <h2>1. where()</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>

        @forelse ($where as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan.</td>
            </tr>
        @endforelse
    </table>


    {{-- ORWHERE --}}
    <h2>2. orWhere()</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>

        @forelse ($orWhere as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan.</td>
            </tr>
        @endforelse
    </table>


    {{-- WHERE BETWEEN --}}
    <h2>3. whereBetween()</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>

        @forelse ($whereBetween as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan.</td>
            </tr>
        @endforelse
    </table>


    {{-- WHERE IN --}}
    <h2>4. whereIn()</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>

        @forelse ($whereIn as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan.</td>
            </tr>
        @endforelse
    </table>


    {{-- WHERENULL --}}
    <h2>5. whereNull()</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>

        @forelse ($whereNull as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan.</td>
            </tr>
        @endforelse
    </table>


    {{-- WHERENOTNULL --}}
    <h2>6. whereNotNull()</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>

        @forelse ($whereNotNull as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan.</td>
            </tr>
        @endforelse
    </table>


    {{-- WHEN --}}
    <h2>7. when()</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>

        @forelse ($when as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan.</td>
            </tr>
        @endforelse
    </table>


    {{-- RELATIONSHIP ONE TO MANY --}}
    <h2>8. Eloquent Relationship - One to Many</h2>

    @forelse ($usersWithPosts as $user)

        <div class="user-card">

            <h3>{{ $user->name }}</h3>

            @forelse ($user->posts as $post)

                <div class="post-card">
                    <strong>{{ $post->title }}</strong>

                    <p>
                        {{ $post->content }}
                    </p>
                </div>

            @empty

                <div class="empty">
                    User ini belum memiliki post.
                </div>

            @endforelse

        </div>

    @empty

        <div class="empty">
            Belum ada data user.
        </div>

    @endforelse


    {{-- RELATIONSHIP ONE TO ONE --}}
    <h2>9. Eloquent Relationship - One to One</h2>

    @forelse ($usersWithProfiles as $user)

        <div class="user-card">

            <h3>{{ $user->name }}</h3>

            @if ($user->profile)

                <div class="post-card">
                    <strong>Profile</strong>

                    <p>
                        {{ $user->profile->bio ?? 'Tidak ada bio.' }}
                    </p>
                </div>

            @else

                <div class="empty">
                    User ini belum memiliki profile.
                </div>

            @endif

        </div>

    @empty

        <div class="empty">
            Belum ada data user.
        </div>

    @endforelse


    {{-- RELATIONSHIP MANY TO MANY --}}
    <h2>10. Eloquent Relationship - Many to Many</h2>

    @forelse ($usersWithRoles as $user)

        <div class="user-card">

            <h3>{{ $user->name }}</h3>

            @forelse ($user->roles as $role)

                <div class="post-card">
                    <strong>Role:</strong>
                    {{ $role->name }}
                </div>

            @empty

                <div class="empty">
                    User ini belum memiliki role.
                </div>

            @endforelse

        </div>

    @empty

        <div class="empty">
            Belum ada data user.
        </div>

    @endforelse


    {{-- QUERY SCOPE --}}
    <h2>11. Query Scope - Active User</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
        </tr>

        @forelse ($activeUsers as $user)

            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>Active</td>
            </tr>

        @empty

            <tr>
                <td colspan="4">
                    Tidak ada user aktif.
                </td>
            </tr>

        @endforelse

    </table>

</div>

</body>
</html>