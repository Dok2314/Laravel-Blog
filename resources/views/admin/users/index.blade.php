@extends('admin.layouts.main')

@section('title', 'Список пользователей')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
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
                <div class="col-2 mb-3">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary">Добавить</a>
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
                                        <th>Имя</th>
                                        <th>Роль</th>
                                        <th>Действие</th>
                                        <th>Дата Создания</th>
                                        <th>Удален</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>Role</td>
                                        <td>
                                            @if($user->deleted_at)
                                                <form action="{{ route('admin.user.restore', $user) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button
                                                        class="text text-warning"
                                                        style="background: none; border: none; position: relative; right: 8px; font-size: 20px;">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.user.delete', $user) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="fas fa-backspace text-danger"
                                                        style="background: none; border: none; position: relative; right: 10px;"
                                                    >
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.user.edit', $user) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <br>
                                                <a href="{{ route('admin.user.show', $user) }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        @if(!$user->deleted_at)
                                            <td>Пользователь ещё не удален</td>
                                        @else
                                            <td>{{ $user->deleted_at }}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pl-2">
                                    {{ $users->links('vendor.pagination.bootstrap-4') }}
                                </div>
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
