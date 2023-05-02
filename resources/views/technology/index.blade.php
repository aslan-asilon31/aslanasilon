@extends('adminlte::page')

@section('title', 'Technology')

@section('content_header')
    <h1>Technology</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Technology List</h3>
      <a href="{{ route('technologies.create') }}" class="btn btn-md btn-success mb-3">Add Technology</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Project ID</th>
          <th>Image</th>
          <th>Title</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
            <tr>
                <td class="text-center">
                    {{ $technology->project_id }}
                </td>
                <td class="text-center">
                    <img src="{{ Storage::url('public/technologies/').$technology->image }}" class="rounded" style="width: 150px">
                </td>
                <td class="text-center">
                    {{ $technology->title }}
                </td>
                <td class="text-center">
                    {{ $technology->description }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('technologies.destroy', $technology->id) }}" method="POST">
                        <a href="{{ route('technologies.edit', $technology->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>
@stop