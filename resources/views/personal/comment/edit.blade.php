@extends('personal.layouts.main')

@section('title')
    Админка |
{{ auth()->user()->name ?? 'Guest' }}
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
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
                <form action="{{ route('personal.comment.edit', $comment) }}" method="post" class="w-25">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <textarea name="message" class="form-control">{{ $comment->message }}</textarea>
                        @error('message')
                        <strong class="text-danger">
                            {{ $message }}
                        </strong><br>
                        @enderror
                        <input type="submit" class="btn btn-warning mt-3" value="Сохранить">
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
