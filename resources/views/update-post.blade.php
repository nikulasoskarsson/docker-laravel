<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Update Post</title>
</head>
<body>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Post</h3>
                    </div>
                    @if(Session::has('post_updated'))
                        <div class="alert alert-success">{{ Session::get('post_updated') }}</div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                    <label for="title" class="form-label">Post Title *</label>
                                    <input type="text" class="form-control" placeholder="Enter post title" name="title" id="title" value="{{ $post->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Post body *</label>
                                <textarea name="body" id="body" class="form-control" rows="6">{{ $post->body }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>