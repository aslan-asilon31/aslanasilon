@extends('adminlte::page')

@section('title', 'About me')

@section('content_header')
    <h1>About Me</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">About Me List</h3>
      <a href="{{ route('abouts.create') }}" class="btn btn-md btn-success mb-3">Add About</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Image</th>
          <th>Bio</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Language</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($abouts as $about)
            <tr>
                <td class="text-center">
                    <img src="{{ Storage::url('public/abouts/').$about->image }}" class="rounded" style="width: 150px">
                </td>
                <td class="text-center">
                    {{ $about->bio }}
                </td>
                <td class="text-center">
                    {{ $about->email }}
                </td>
                <td class="text-center">
                    {{ $about->phone }}
                </td>
                <td class="text-center">
                    {{ $about->address }}
                </td>
                <td class="text-center">
                    -
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('abouts.destroy', $about->id) }}" method="POST">
                        <a href="{{ route('abouts.edit', $about->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
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