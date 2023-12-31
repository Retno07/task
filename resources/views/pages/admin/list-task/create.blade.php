@extends('layouts.admin')

@section('content')
    {{--  <!-- Begin Page Content -->  --}}
<div class="container-fluid">

    {{--  <!-- Page Heading -->  --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Task</h1>
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
            <form action="{{ route('list-task.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form group">
                    <label for="task_name">Nama Task</label>
                    <input type="text" class="form-control" name="task_name" placeholder="" value="{{ old('task_name') }}">
                </div>
                <div class="form group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="" value="{{ old('deskripsi') }}">
                </div>
                <div class="form-group">
                    <label for="gambar_task">Gambar Task</label>
                    <input type="file" class="form-control" name="gambar_task" placeholder="gambar_task" >
                </div>
                <div class="form-group">
                    <label for="title">User ID</label>
                    <select name="user_id" id="user_id" required class="form-control">
                        <option value="">Pilih User ID</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id}}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

