<!DOCTYPE html>
<html>
<head>
    <title>Twitter Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">新規ツイート</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tweets.store') }}">
                            @csrf
                            <div class="mb-3">
                                <textarea name="content" class="form-control" rows="3" placeholder="いまどうしてる？" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">ツイート</button>
                        </form>
                    </div>
                </div>

                <div class="mt-4">
                    @foreach ($tweets as $tweet)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="fw-bold">{{ $tweet->user->name }}</div>
                                    <div class="text-muted ms-2 small">{{ $tweet->created_at->format('Y-m-d H:i') }}</div>
                                </div>
                                <p class="mb-0">{{ $tweet->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
