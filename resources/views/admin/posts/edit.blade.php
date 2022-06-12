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
                            <li class="breadcrumb-item"><a href="{{ route('admins.main') }}">Админка</a></li>
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
                        <form action="{{ route('admin.post.edit', $post) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" value="{{ $post->title }}" class="form-control w-25" name="title" placeholder="Название поста">
                                @error('title')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content" class="form-control" placeholder="Ваш пост">{{ $post->content }}</textarea>
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
                                        <option
                                            {{ $category->posts->contains($post) ? 'selected' : '' }}
                                            value="{{ $category->id }}"
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
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="w-25 mb-2">
                                    <img src="{{ Storage::disk('images')->url($post->preview_image) }}" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Выбирите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить главное изображение</label>
                                <div class="w-25  mb-2">
                                    <img src="{{ Storage::disk('images')->url($post->main_image) }}" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Выбирите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <div class="select2-purple">
                                    <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Выберите теги" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option
                                                {{ $post->tags->contains($tag) ? 'selected' : '' }}
                                                value="{{ $tag->id }}"
                                            >
                                                {{ $tag->title }}
                                            </option>
                                        @endforeach
                                    </select>
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
