@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Departments</h1>
    </div>

    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Edit department') }}
                            <a href="{{ route('departments.index') }}" class="float-right btn">Back</a>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('departments.update', $department->id) }}">
                                @csrf
                                @method('PUT')
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $department->name) }}" required autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>  
                    </div>
                    <form class="m-2 p-2" action="{{ route('departments.destroy', $department->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete {{ $department->name }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endsection