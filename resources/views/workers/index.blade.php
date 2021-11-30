@extends('layouts.app')
@section('title', 'All Workers')
@section('content')

<div class="container">
  <div class="row d-flex justify-content-between align-items-center">
      <a href="{{ route('workers.create') }}" class="btn btn-success mb-3">Create</a>

      <form action="{{ route('workers.index') }}" method="GET" >
          <select size=""  name="sort" class="d-block mb-1">
            <option value="id" selected>by Id</option>
            <option value="desc_id"> by desc Id</option>
            <option value="name">by Name</option>
            <option value="desc_name"> by desc Name</option>
            <option value="salary">by Salary</option>
            <option value="desc_salary">by desc Salary</option>
            <option value="department">by Department</option>
            <option value="desc_department">by desc Department</option>
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

{{-- table --}}
<table class="table mx-auto">

    <thead>
      <tr>
        <th scope="col">#
          {{-- <a href="#" class="text-dark">
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </a> --}}
        </th>
        <th scope="col">Name
          {{-- <a href="#" class="text-dark">
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </a> --}}
        </th>
        <th scope="col">Salary
          {{-- <a href="#" class="text-dark">
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </a> --}}
        </th>
        <th scope="col">Department
          {{-- <a href="#" class="text-dark">
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </a> --}}
        </th>
        <th scope="col"></th>
      
      </tr>
    </thead>
    <tbody>
      @foreach($workers as $worker)
        <tr>
          <th scope="row">{{ $worker->id }}</th>
          <td>{{ $worker->name }}</td>
          <td>{{ $worker->salary }} $</td>
          <td>{{ $worker->department['name'] }}</td>
          <td class="table-buttons">
              <a href="{{ route('workers.show', $worker) }}" class="btn btn-success">
                  <i class="fa fa-eye" aria-hidden="true"></i>
              </a>
              <a href="{{ route('workers.edit', $worker) }}" class="btn btn-primary">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
              </a>
              <form action="{{ route('workers.destroy', $worker->id) }}" class="" method="POST">
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-danger">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
              </form>
              
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{-- paginate --}}
  <div class="container">
    <div class="row">
      <div class="mx-auto">
        {{ $workers->links() }}
      </div>
    </div>
  </div>
  
@endsection