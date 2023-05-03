@extends('adminlte::page')

@section('title', 'Project')

@section('content_header')
    <h1>Project</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Project List</h3>
      <a href="{{ route('projects.create') }}" class="btn btn-md btn-success mb-3">Add Project</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Gallery</th>
          <th>Technology</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td class="text-center">
                    <img src="{{ Storage::url('public/projects/').$project->image }}" class="rounded" style="width: 150px">
                </td>
                <td class="text-center">
                    {{ $project->title }}
                </td>
                <td class="text-center">
                    @foreach ($project->projectgalleries as $ppg)

                    {{ $ppg->project_id }},
                        {{-- @foreach ($ppg->gallery()->get() as $pg)
                            {{ $pg->title }},
                        @endforeach --}}
                        
                    @endforeach
                </td>
                <td class="text-center">
                    @foreach ($project->projectgalleries()->get() as $ppg)
                        {{-- @foreach ($ppg->technology as $ppgt) --}}
                        {{ $ppg->project_id }}
                        {{-- @endforeach --}}
                    @endforeach
                </td>
                <td class="text-center">
                    {{ $project->description }}
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('projects.destroy', $project->id) }}" method="POST">
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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