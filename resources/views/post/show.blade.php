@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->day }} • {{ $date->translatedFormat('F') }} • {{ $date->format('H:i') }} {{ $post->comments->count() }} комментария</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ Storage::disk('images')->url($post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-3">
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
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="fas fa-heart"></i>
                        @endguest
                    </section>
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{ Storage::disk('images')->url($relatedPost->main_image) }}" class="post-thumbnail">
                                <p class="post-category">{{ $relatedPost->category->title }}</p>
                                <a href="{{ route('show', $relatedPost) }}"><h5 class="post-title">{{ $relatedPost->title }}</h5></a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-5" data-aos="fade-up">Коментарии({{ $post->comments->count() }})</h2>
                        @foreach($post->comments as $comment)
                        <div class="comment-text  mb-4">
                            <span class="username">
                              <div>
                                  {{ $comment->user->name }}
                              </div>
                              <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                            </span><!-- /.username -->
                            {{ $comment->message }}
                        </div>
                        @endforeach
                    </section>
                    @auth
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                            <form action="{{ route('store', $post) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="message" class="sr-only">Comment</label>
                                        <textarea name="message" id="message" class="form-control" rows="10">Оставь свой комментарий!</textarea>
                                    </div>
                                    @error('message')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send Message" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @elseguest
                        <a href="{{ route('login') }}">Войти чтобы оставить комментарий?</a>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
