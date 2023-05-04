@extends('adminlte::page')

@section('title', 'About Add')

@section('content_header')
    <h1>About Add</h1>
@stop

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
                    
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
                            <label class="font-weight-bold">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') }}" placeholder="Insert bio" ></textarea>
                        
                            <!-- error message untuk title -->
                            @error('bio')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Insert email">
                        
                            <!-- error message untuk title -->
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phome') }}" placeholder="Insert phone">
                        
                            <!-- error message untuk title -->
                            @error('phone')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Insert bio" ></textarea>
                        
                            <!-- error message untuk title -->
                            @error('address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label class="font-weight-bold">language</label>
                            <input type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}" placeholder="Insert language">
                        
                            <!-- error message untuk title -->
                            @error('language')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
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