@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        <div class="card overflow-hidden">
            <div class="card-body pt-3">
                <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                            <span>Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Explore</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Feed</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Terms</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Support</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Settings</span></a>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center py-2">
                <a class="btn btn-link btn-sm" href="#">View Profile </a>
            </div>
        </div>
    </div>
    <div class="col-6">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h4> Share your ideas </h4>
        <div class="row">
            <!-- Form for creating a post -->
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="content" id="idea" rows="3" required></textarea>
                </div>
                <div class="">
                    <button class="btn btn-dark"> Share </button>
                </div>
            </form>
        </div>
        <hr>

        <div class="mt-3">
            <div id="posts-container" class="card">
                @foreach($posts as $post)
                <div id="post-{{ $post->id }}" class="single-post">
                    @include('_template.card', ['post' => $post])
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-header pb-0 border-0">
                <h5 class="">Search</h5>
            </div>
            <div class="card-body">
                <!-- Search Bar -->
                <form action="{{ route('posts.search') }}" method="GET" class="d-flex mb-3">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search posts..." aria-label="Search" required>
                    <button class="btn btn-dark" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header pb-0 border-0">
                <h5 class="">Who to follow</h5>
            </div>
            <div class="card-body">
                <div class="hstack gap-2 mb-3">
                    <div class="avatar">
                        <a href="#!"><img class="avatar-img rounded-circle"
                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                    </div>
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="#!">Mario Brother</a>
                        <p class="mb-0 small text-truncate">@Mario</p>
                    </div>
                    <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                            class="fa-solid fa-plus"> </i></a>
                </div>
                <div class="d-grid mt-3">
                    <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showSinglePost(postId) {
        // Hide all posts
        document.querySelectorAll('.single-post').forEach(function(post) {
            post.style.display = 'none';
        });

        // Show only the clicked post
        document.getElementById('post-' + postId).style.display = 'block';
    }
</script>
@endsection
