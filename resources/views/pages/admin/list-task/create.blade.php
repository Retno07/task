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
                    <label for="name">Nama Task</label>
                    <input type="text" class="form-control" name="name" placeholder="" value="{{ old('name') }}">
                </div>
                <div class="form group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="" value="{{ old('deskripsi') }}">
                </div>
                <div class="form group">
                    <label for="status">Status</label> 
                    <input type="text" class="form-control" name="status" placeholder="" value="{{ old('status') }}">
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

