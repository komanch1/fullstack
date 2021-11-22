@extends('layouts.app')
@section('title', 'All Workers')
@section('content')

<a href="{{route('workers.create')}}" class="btn btn-success mb-3">Create</a>

@if (session()->get(success))
    <div class="alert alert-success mt-3">
      {{ session()->get('success') }}
    </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Salary</th>
        {{-- <th scope="col">Departments</th> --}}
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($workers as $worker)
      <tr>
        <th scope="row">{{ $worker->id }}</th>
        <td>{{ $worker->name }}</td>
        <td>{{ $worker->salary }}</td>
        {{-- <td>{{ $worker->salary }}</td> --}}
        <td class="table-buttons">
            <a href="{{ route('workers.show', $worker) }}" class="btn btn-success">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
            <a href="{{ route('workers.edit', $worker) }}" class="btn btn-primary">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
            <form action="" class="" method="POST">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </form>
            
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection