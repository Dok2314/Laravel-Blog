@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{ Storage::disk('images')->url($post->main_image) }}">
                    </div>
                    <p class="blog-post-category">{{ $post->category->title }}</p>
                    <a href="{{ route('show', $post) }}" class="blog-post-permalink">
                        <h6 class="blog-post-title">{!! $post->content !!}</h6>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto" style="margin-top: -80px;">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    </div>

</main>
@endsection
