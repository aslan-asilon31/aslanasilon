@extends('adminlte::page')

@section('title', 'Experience Add')

@section('content_header')
    <h1>Experience Add</h1>
@stop

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="selectImage">
                        
                            <!-- error message untuk title -->
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group rounded mx-auto d-block img-fluid" >
                            <img id="preview" src="#" alt="your image" style="width:500px; height:250px;" class="mt-3 " style="display:none;"/>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Company Name</label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" placeholder="Insert company name">
                        
                            <!-- error message untuk title -->
                            @error('company_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Company Web</label>
                            <input type="text" class="form-control @error('company_web') is-invalid @enderror" name="company_web" value="{{ old('company_web') }}" placeholder="Insert company web">
                        
                            <!-- error message untuk title -->
                            @error('company_web')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Company address</label>
                            <input type="text" class="form-control @error('company_address') is-invalid @enderror" name="company_address" value="{{ old('company_address') }}" placeholder="Insert company address">
                        
                            <!-- error message untuk title -->
                            @error('company_address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"> Work Start</label>
                            <input type="text" class="form-control @error('work_start') is-invalid @enderror" name="work_start" value="{{ old('work_start') }}" placeholder="Insert work start">
                        
                            <!-- error message untuk title -->
                            @error('work_start')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"> Work end</label>
                            <input type="text" class="form-control @error('work_end') is-invalid @enderror" name="work_end" value="{{ old('work_end') }}" placeholder="Insert work end">
                        
                            <!-- error message untuk title -->
                            @error('work_end')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"> Work position</label>
                            <input type="text" class="form-control @error('work_position') is-invalid @enderror" name="work_position" value="{{ old('work_position') }}" placeholder="Insert work position">
                        
                            <!-- error message untuk title -->
                            @error('work_position')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold"> Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" placeholder="Insert status">
                        
                            <!-- error message untuk title -->
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


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