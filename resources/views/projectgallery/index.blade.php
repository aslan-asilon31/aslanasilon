@extends('adminlte::page')

@section('title', 'Project Gallery')

@section('content_header')
    <h1>Project Gallery</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Project Gallery List</h3>
      <a href="{{ route('projectgalleries.create') }}" class="btn btn-md btn-success mb-3">Add Gallery</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Project ID</th>
          <th>Gallery ID</th>
          <th>Technology ID</th>
          <th>Url ID</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($projectgalleries as $gallery)
            <tr>
                <td class="text-center">
                    {{ $gallery->project_id }}
                </td>
                <td class="text-center">
                    {{ $gallery->gallery_id }}
                </td>
                <td class="text-center">
                    {{ $gallery->technology_id }}
                </td>
                <td class="text-center">
                    {{ $gallery->url_id }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('projectgalleries.destroy', $gallery->id) }}" method="POST">
                        <a href="{{ route('projectgalleries.edit', $gallery->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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