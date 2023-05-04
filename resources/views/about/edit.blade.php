@extends('adminlte::page')

@section('title', 'About Edit')

@section('content_header')
    <h1>About Edit</h1>
@stop

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                            <input class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio', $about->bio) }}" placeholder="Insert bio" >
                        
                            <!-- error message untuk title -->
                            @error('bio')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $about->email) }}" placeholder="Insert email">
                        
                            <!-- error message untuk title -->
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $about->phone) }}" placeholder="Insert phone">
                        
                            <!-- error message untuk title -->
                            @error('phone')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">address</label>
                            <input class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $about->address) }}" placeholder="Insert bio" >
                        
                            <!-- error message untuk title -->
                            @error('address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
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
@stop