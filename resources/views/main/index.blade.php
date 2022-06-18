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
                    <div class="d-flex justify-content-between">
                        <p class="blog-post-category">{{ $post->category->title }}</p>
                        @auth()
                        <form action="{{ route('like', $post) }}" method="post">
                            @csrf
                            <span>{{ $post->liked_users_count }}</span>
                            <button type="submit" class="border-0 bg-transparent">
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-heart" style="color: red;"></i>
                                    @else
                                        <i class="fas fa-heart"></i>
                                    @endif
                            </button>
                        </form>
                        @endauth
                        @guest()
                            <div>
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="fas fa-heart"></i>
                            </div>
                        @endguest
                    </div>
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
        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach($randomPosts as $random)
                        <div class="col-md-6 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ Storage::disk('images')->url($random->main_image) }}">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $random->category->title }}</p>
                                @auth()
                                <form action="{{ route('like', $random) }}" method="post">
                                    @csrf
                                    <span>{{ $random->liked_users_count }}</span>
                                    <button type="submit" class="border-0 bg-transparent">

                                            @if(auth()->user()->likedPosts->contains($random->id))
                                                <i class="fas fa-heart" style="color: red;"></i>
                                            @else
                                                <i class="fas fa-heart"></i>
                                            @endif
                                    </button>
                                </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span>{{ $random->liked_users_count }}</span>
                                        <i class="fas fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <p class="blog-post-category">{{ $random->category->title }}</p>
                            <a href="{{ route('show', $random) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{!! $random->content !!}</h6>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Популярные посты</h5>
                    <ul class="post-list">
                        @foreach($likedPosts as $post)
                        <li class="post">
                            <a href="{{ route('show', $post) }}" class="post-permalink media">
                                <img src="{{ Storage::disk('images')->url($post->main_image) }}">

                                <div class="d-flex justify-content-between">
                                    <p class="blog-post-category">{{ $post->title }}</p>
                                    <form action="{{ route('like', $post) }}" method="post">
                                        @csrf
                                        <button type="submit" class="border-0 bg-transparent">
                                            @auth()
                                                @if(auth()->user()->likedPosts->contains($post->id))
                                                    <i class="fas fa-heart" style="color: red;"></i>
                                                @else
                                                    <i class="fas fa-heart"></i>
                                                @endif
                                            @endauth
                                        </button>
                                    </form>
                                </div>

                                <div class="media-body">
                                    <h6 class="post-title">{{ $post->title }}</h6>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
{{--                <div class="widget">--}}
{{--                    <h5 class="widget-title">Categories</h5>--}}
{{--                    <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories" class="w-100">--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

</main>
@endsection
