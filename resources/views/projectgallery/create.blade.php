@extends('adminlte::page')

@section('title', 'Project Gallery Add')

@section('content_header')
    <h1>Project Gallery Add</h1>
@stop

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('projectgalleries.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Project ID</label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0">
                              <option style="display:none;">Select Project</option>
                              @foreach ($projects as $project)
                              <option name="project_id" value="{{ $project->id }}">{{ $project->title }}</option>
                              {{ dd($project->id) }}
                              @endforeach
                            </select>
                        </div>
                        
                        {{-- <div class="form-group">
                            <label for="exampleSelectRounded0">Gallery ID</label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0">
                              <option style="display:none;">Select Gallery</option>
                              @foreach ($galleries as $g)
                              <option name="gallery_id" value="{{ $g->id }}">{{ $g->title }}</option>
                              @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Technology ID</label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0">
                              <option style="display:none;">Select Technology</option>
                              @foreach ($technologies as $t)
                              <option name="technology_id" value="{{ $t->id }}">{{ $t->title }}</option>
                              @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Url ID</label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0">
                              <option style="display:none;">Select Url</option>
                              @foreach ($urls as $u)
                              <option name="url_id" value="{{ $u->id }}">{{ $u->title }}</option>
                              @endforeach
                            </select>
                        </div> --}}


                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
<script>
    selectImage.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';
        const [file] = selectImage.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
@stop