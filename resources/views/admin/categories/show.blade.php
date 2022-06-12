@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категория
                            <span style="color: #f5c6cb;">
                                "{{ $category->title }}"
                            </span>
                            <a href="{{ route('admin.category.edit', $category) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </h1>
                        <a href="{{ route('admin.category.index') }}"><button class="btn btn-warning mt-3">Назад</button></a>
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
                <div class="col-12">
                    <div class="col-12">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Дата Создания</th>
                                <th>Пследнее обновление</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
