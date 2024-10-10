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
    
    <!-- View Button Added Here -->
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
        <div class="mb-3">
            <textarea class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm">Post Comment</button>
        </div>
        <hr>
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
