@extends('_template.card')
@extends('layout.layout')

@section('content')
    @parent
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5>{{ $post->content }}</h5>
                    <p>Likes: {{ $post->likes }}</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Back to all posts</a>
                </div>
            </div>
        </div>
    </div>
@endsection