@extends('adminlte::page')

@section('title', 'Url')

@section('content_header')
    <h1>Url</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Url List</h3>
      <a href="{{ route('urls.create') }}" class="btn btn-md btn-success mb-3">Add url</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($urls as $url)
            <tr>
                <td class="text-center">
                    <img src="{{ Storage::url('public/urls/').$url->image }}" class="rounded" style="width: 150px">
                </td>
                <td class="text-center">
                    {{ $url->title }}
                </td>
                <td class="text-center">
                    {{ $url->description }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('urls.destroy', $url->id) }}" method="POST">
                        <a href="{{ route('urls.edit', $url->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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