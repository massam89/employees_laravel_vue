@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
    </div>
    <div class="row">
        <div class="card mx-auto">
            @if (session()->has('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
            @endif

            @if (session()->has('errmessage'))
                <div class="alert alert-danger">
                  {{ session('errmessage') }}
                </div>
            @endif

            <form method="GET" action="{{ route('cities.index') }}" class="mx-auto mt-3 row gy-2 gx-3 align-items-center">
              <div class="col-auto">
                <input type="search" name="search" class="form-control" id="autoSizingInput" placeholder="Search for something...">
              </div>
          
              <div class="col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
              <a href="{{ route('cities.create') }}" class="btn bg-info text-white">Create</a>
            </form>

            <div class="card-body">
                <table class="table table-responsive text-center">
                    <thead>
                      <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">State name</th>
                        <th scope="col">Name</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cities as $city)
                        <tr>
                            <th scope="row">{{ $city->id }}</th>
                            <td>{{ $city->state->name }}</td>
                            <td>{{ $city->name }}</td>
                            <td>
                              <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div> 
    </div>


@endsection