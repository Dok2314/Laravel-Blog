@extends('admin.layouts.main')

@section('title', 'Предпросмотр категории')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователь
                            <span style="color: #f5c6cb;">
                                "{{ $user->name }}"
                            </span>
                            <a href="{{ route('admin.user.edit', $user) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </h1>
                        <a href="{{ route('admin.user.index') }}"><button class="btn btn-warning mt-3">Назад</button></a>
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
                                <th>Имя</th>
                                <th>Роль</th>
                                <th>Дата Создания</th>
                                <th>Последнее обновление</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>Роль</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
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
