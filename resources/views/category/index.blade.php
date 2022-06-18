@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
        <section class="featured-posts-section">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                @foreach($categories as $category)
                    <li class="nav-item active">
                        <a href="{{ route('category.find.post', $category) }}">
                            {{ $category->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>

</main>
@endsection
