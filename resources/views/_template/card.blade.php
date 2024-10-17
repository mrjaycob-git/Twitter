<div class="px-3 pt-4 pb-2">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
            <div>
                <h5 class="card-title mb-0">
                    <a href="#">kokot</a>
                </h5>
            </div>
        </div>
        <div>
            <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    </div>
</div>

<div class="card-body">
    <p class="fs-6 fw-light text-muted">
        {{ $post->content }}
    </p>
    
    <div class="mb-2">
        <button class="btn btn-primary btn-sm" onclick="showSinglePost({{ $post->id }})">View</button>
    </div>

    <div class="d-flex justify-content-between">
        <div>
            <a href="#" class="fw-light nav-link fs-6">
                <span class="fas fa-heart me-1"></span> {{ $post->likes }}
            </a>
        </div>
        <div>
            <span class="fs-6 fw-light text-muted">
                <span class="fas fa-clock"></span> 3-5-2023
            </span>
        </div>
    </div>

    <div>
        <div>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="content" class="form-control" placeholder="Write your comment..." required>
                    <button class="btn btn-primary btn-sm" type="submit">Post Comment</button>
                </div>
            </form>
        </div>
        <hr>
    </div>

    <!-- Display Comments -->
    <div>
        @if($post->comments->isNotEmpty())
            <h6>Comments:</h6>
            @foreach($post->comments as $comment)
                <div class="mb-2">
                    <strong>User:</strong> {{ $comment->content }} <small class="text-muted">{{ $comment->created_at }}</small>
                </div>
            @endforeach
        @else
            <p>No comments yet.</p>
        @endif
    </div>

    <div>
        <button class="btn btn-secondary btn-sm" onclick="showUpdateForm({{ $post->id }})">Update post</button>
    </div>
    <div id="updateForm-{{ $post->id }}" style="display:none;">
        <form action="{{ route('post.update', $post->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <textarea name="content" class="form-control" rows="1">{{ $post->content }}</textarea>
            <button type="submit" class="btn btn-primary btn-sm mt-2">Confirm</button>
        </form>
    </div>
</div>

<script>
    function showUpdateForm(postId) {
        document.getElementById('updateForm-' + postId).style.display = 'block';
    }

    function showSinglePost(postId) {
        // Hide all posts
        document.querySelectorAll('.single-post').forEach(function(post) {
            post.style.display = 'none';
        });

        // Show only the clicked post
        document.getElementById('post-' + postId).style.display = 'block';
    }
</script>
