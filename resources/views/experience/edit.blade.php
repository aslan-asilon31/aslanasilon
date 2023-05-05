@extends('adminlte::page')

@section('title', 'Experience Edit')

@section('content_header')
    <h1>Experience Edit</h1>
@stop

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('experiences.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Company Name</label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', $experience->company_name) }}" placeholder="Insert company name">
                        
                            <!-- error message untuk title -->
                            @error('company_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Company web</label>
                            <input type="text" class="form-control @error('company_web') is-invalid @enderror" name="company_web" value="{{ old('company_web', $experience->company_web) }}" placeholder="Insert company beb">
                        
                            <!-- error message untuk title -->
                            @error('company_web')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Company address</label>
                            <input type="text" class="form-control @error('company_address') is-invalid @enderror" name="company_address" value="{{ old('company_address', $experience->company_address) }}" placeholder="Insert company address">
                        
                            <!-- error message untuk title -->
                            @error('company_address')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Work Start</label>
                            <input type="text" class="form-control @error('work_start') is-invalid @enderror" name="work_start" value="{{ old('work_start', $experience->work_start) }}" placeholder="Insert work start">
                        
                            <!-- error message untuk title -->
                            @error('work_start')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Work end</label>
                            <input type="text" class="form-control @error('work_end') is-invalid @enderror" name="work_end" value="{{ old('work_end', $experience->work_end) }}" placeholder="Insert work end">
                        
                            <!-- error message untuk title -->
                            @error('work_end')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Work position</label>
                            <input type="text" class="form-control @error('work_position') is-invalid @enderror" name="work_position" value="{{ old('work_position', $experience->work_position) }}" placeholder="Insert work position">
                        
                            <!-- error message untuk title -->
                            @error('work_position')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status', $experience->status) }}" placeholder="Insert status">
                        
                            <!-- error message untuk title -->
                            @error('status')
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