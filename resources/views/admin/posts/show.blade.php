@extends('admin.layouts.main')

@section('title', 'Предпросмотр поста')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пост
                            <span style="color: #f5c6cb;">
                                "{{ $post->title }}"
                            </span>
                            <a href="{{ route('admin.post.edit', $post) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </h1>
                        <a href="{{ route('admin.post.index') }}"><button class="btn btn-warning mt-3">Назад</button></a>
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
                <div class="col-12">
                    <div class="col-12">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Пост</th>
                                <th>Категория</th>
                                <th>Дата Создания</th>
                                <th>Пследнее обновление</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                            </tbody>
                        </table>
                        <img src="{{ Storage::disk('images')->url($post->main_image) }}" class="w-50 h-50">
                    </div>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
