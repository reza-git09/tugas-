<!DOCTYPE html>
<html>
<head>
    <title>Daftar Post</title>
</head>
<body>

    <h1>Daftar Post</h1>

    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>

            @can('update', $post)
                <a href="{{ route('post.edit', $post->id) }}">
                    <button type="button">Edit</button>
                </a>
            @endcan
        </div>
        <hr>
    @endforeach

</body>
</html>