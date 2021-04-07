<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>All Posts</title>
</head>
<body>
    <div class="container p-2">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <a href="/add-post" class="btn btn-info btn-sm text-white mb-3">New Post</a>
                <div class="card">
                    @if(Session::has('post_deleted'))
                        <div class="alert alert-danger">{{ Session::get('post_deleted') }}</div>
                    @endif
                    @if(Session::has('post_updated'))
                    <div class="alert alert-warning">{{ Session::get('post_updated') }}</div>
                @endif
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $loop->index }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="/posts/{{ $post->id }}" class="btn btn-sm btn-info text-white me-2">View Post</a>
                                            <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger me-2">Delete</button>
                                            </form>
                                            <a href="/posts/update/{{ $post->id }}" class="btn btn-sm btn-warning text-white">Update</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>