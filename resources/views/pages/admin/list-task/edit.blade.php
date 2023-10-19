@extends('layouts.admin')

@section('content')
    {{--  <!-- Begin Page Content -->  --}}
<div class="container-fluid">

    {{--  <!-- Page Heading -->  --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Task {{ $item->name }}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('list-task.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form group">
                    <label for="task_name">Nama Task</label>
                    <input type="text" class="form-control" name="task_name" placeholder="Nama Task" value="{{ $item->task_name }}">
                </div>
                <div class="form group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" value="{{ $item->deskripsi }}">
                </div>
                <div class="form-group">
                    <label for="title">Nama User</label>
                    <select name="user_id" required class="form-control" id="user_id">
                        <option value="">Pilih User</option>
                        @foreach($user as $usr)
                            <option value="{{ $usr->id }}" {{ $usr->id == $item->user_id ? 'selected' : '' }}>{{ $usr->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar_task">Gambar Task</label>
                    <input type="file" class="form-control" name="gambar_task" placeholder="gambar_task" value="{{ $item->gambar_task }}">
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

