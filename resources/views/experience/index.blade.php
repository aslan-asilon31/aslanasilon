@extends('adminlte::page')

@section('title', 'Experience')

@section('content_header')
    <h1>Experience</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Experience List</h3>
      <a href="{{ route('experiences.create') }}" class="btn btn-md btn-success mb-3">Add Experience</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Image</th>
          <th>Company Name</th>
          <th>Company Web</th>
          <th>Company Address</th>
          <th>Work Start</th>
          <th>Work End</th>
          <th>Work Position</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
            <tr>
                <td class="text-center">
                    <img src="{{ Storage::url('public/experiences/').$experience->image }}" class="rounded" style="width: 150px">
                </td>
                <td class="text-center">
                    {{ $experience->company_name }}
                </td>
                <td class="text-center">
                    {{ $experience->company_web }}
                </td>
                <td class="text-center">
                    {{ $experience->company_address }}
                </td>
                <td class="text-center">
                    {{ $experience->work_start }}
                </td>
                <td class="text-center">
                    {{ $experience->work_end }}
                </td>
                <td class="text-center">
                    {{ $experience->work_position }}
                </td>
                <td class="text-center">
                    {{ $experience->status }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('experiences.destroy', $experience->id) }}" method="POST">
                        <a href="{{ route('experiences.edit', $experience->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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