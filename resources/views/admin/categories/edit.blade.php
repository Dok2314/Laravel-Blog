@extends('admin.layouts.main')

@section('title', 'Редактирование категории')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование Категории <strong>{{ $category->title }}</strong></h1>
                        <a href="{{ route('admin.category.index') }}"><button class="btn btn-warning mt-3">Назад</button></a>
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
                        <form action="{{ route('admin.category.edit', $category) }}" method="post" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $category->title }}" name="title" placeholder="Название Категории">
                                @error('title')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong><br>
                                @enderror
                                <input type="submit" class="btn btn-warning mt-3" value="Сохранить">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
