@extends('layouts.app')
@section('title', 'All Departments')
@section('content')

<div class="container">
  <div class="row d-flex justify-content-between align-items-center">
    <a href="{{route('departments.create')}}" class="btn btn-success mb-3">Create</a>

    <form action="{{ route('departments.index') }}" method="GET" >
      @csrf
      <select size=""  name="sort" class="d-block mb-1">
        <option value="id" selected>by Id</option>
        <option value="desc_id"> by desc Id</option>
        <option value="name">by Name</option>
        <option value="desc_name"> by desc Name</option>
        {{-- <option value="worker">by Worker</option>
        <option value="desc_worker">by desc Worker</option> --}}
      </select>
    <button type="submit" class="btn btn-primary btn-sm float-right" style="align-content: end">Sort</button>
  </form>
  </div>
</div>


@if (session()->get('success'))
    <div class="alert alert-success mt-3">
      {{ session()->get('success') }}
    </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Workers</th>
      </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
        {{ $department->getWorker() }}
      <tr>
        <th scope="row">{{ $department->id }}</th>
        <td>{{ $department->name }}</td>
        <td>{{ $department->worker_id }}</td>
        {{-- <td>{{ $department->salary }}</td> --}}
        <td class="table-buttons">
            <a href="{{ route('departments.show', $department) }}" class="btn btn-success">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
            <a href="{{ route('departments.edit', $department) }}" class="btn btn-primary">
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