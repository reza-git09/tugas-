<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>

    <h1>Edit Post</h1>

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul:</label><br>
        <input type="text" name="title" value="{{ $post->title }}">
        <br><br>

        <label>Isi:</label><br>
        <textarea name="content">{{ $post->content }}</textarea>
        <br><br>

        <button type="submit">Update</button>
    </form>

    <br>

    <a href="{{ route('posts.index') }}">
        <button type="button">Kembali</button>
    </a>

</body>
</html>