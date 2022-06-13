@extends('admin.layouts.main')

@section('title', 'Создание категории')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление Категории</h1>
                    <a href="{{ route('admin.category.index') }}"><button class="btn btn-warning mt-3">Назад</button></a>
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
                    <form action="{{ route('admin.category.store') }}" method="post" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Название Категории">
                            @error('title')
                            <strong class="text-danger">
                                {{ $message }}
                            </strong><br>
                            @enderror
                            <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
