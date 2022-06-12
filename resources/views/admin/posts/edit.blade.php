@extends('admin.layouts.main')

@section('title', 'Редактирование поста')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Обновление Поста</h1>
                        <a href="{{ route('admin.post.index') }}" class="btn btn-warning mt-3">Назад</a>
                        <hr>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.edit', $post) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control w-25" name="title" value="{{ $post->title }}">
                                @error('title')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="summernote" class="form-control">{{ $post->content }}</textarea>
                                @error('content')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <select name="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->posts->contains($post) ? 'selected' : '' }}
                                        >
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong><br>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
