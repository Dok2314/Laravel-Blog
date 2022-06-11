@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
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
                <div class="col-2 mb-3">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-primary">Добавить</a>
                </div>
            </div>
                <div class="col-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Количество постов у категории</th>
                                        <th>Действие</th>
                                        <th>Дата Создания</th>
                                        <th>Удалено</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td><strong>33</strong></td>
                                        <td>
                                            <form action="">
                                                <a href="" class="text text-danger">
                                                    <i class="fas fa-backspace"></i>
                                                </a>
                                            </form>
                                            <a href="{{ route('admin.category.edit', $category) }}">
                                                    <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>{{ $category->created_at }}</td>
                                        @if(!$category->deleted_at)
                                            <td>Категория ещё не была удалена</td>
                                        @else
                                            <td>{{ $category->deleted_at }}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
