@extends('admin.layouts.main')

@section('title', 'Редактирование категории')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование Пользователя <strong>{{ $user->name }}</strong></h1>
                        <a href="{{ route('admin.user.index') }}"><button class="btn btn-warning mt-3">Назад</button></a>
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
                        <form action="{{ route('admin.user.edit', $user) }}" method="post" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Имя">
                                @error('name')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" value="{{ $user->email }}" name="email" placeholder="E-mail">
                                @error('email')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Новый пароль">
                                @error('password')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong><br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password-confirm" placeholder="Повторите пароль">
                                @error('password-confirm')
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
