@extends('admin.layouts.main')

@section('title', 'Создание категории')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление Пользователя</h1>
                    <a href="{{ route('admin.user.index') }}"><button class="btn btn-warning mt-3">Назад</button></a>
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
                    <form action="{{ route('admin.user.store') }}" method="post" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Имя">
                            @error('name')
                            <strong class="text-danger">
                                {{ $message }}
                            </strong><br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="E-mail">
                            @error('email')
                            <strong class="text-danger">
                                {{ $message }}
                            </strong><br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Выберите Роль</label>
                            <select name="role_id" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <strong class="text-danger">
                                {{ $message }}
                            </strong><br>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
