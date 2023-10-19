@extends('layouts.admin')

@section('content')
    {{--  <!-- Begin Page Content -->  --}}
<div class="container-fluid">

    {{--  <!-- Page Heading -->  --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Task</h1>
        <a href="{{ route('list-task.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Task
        </a>
    </div>

    <div class="row">
        <div class="card-body">
        <div class="row g-3 align-items-center mt-2">
                <div class="col-auto">
                  <form action="list-task" method="GET" class="form-inline">
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" id="search" name="search" Placeholder="name">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mx-sm-3">Cari</button>
                  </form> 
                </div>
              </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Task</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Nama User</th>
                            <th>Gambar Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td>{{ $item->task_name }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->gambar_task) }}" alt="" style="width: 200px" class="img-thumbnail">
                                </td>
                               <th width="120px">
                                    <a href="{{ route('list-task.edit', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                        <span class="text">Edit</span>
                                    </a>
                                    <form action="{{ route('list-task.destroy', $item->user_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                            <span class="text">hapus</span>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">
                                    Data Kosong
                                </td> 
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="form-group float-right">
                  {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

