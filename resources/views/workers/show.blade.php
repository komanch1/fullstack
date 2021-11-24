@extends('layouts.app')
@section('title', 'Show Worker')
@section('content')

<a href="{{route('workers.index')}}" class="btn btn-success mb-3"><-Back</a>

<div class="card col-md-4 mx-auto" >
    <img src="{{ asset('img/worker.png') }}" class="card-img-top" alt="Worker">
    <div class="card-body">
        <h3>{{ $worker->name }}</h3>
      <p class="card-text">Salary: {{ $worker->salary }} $</p>
      @if ($worker->departments)
        <p class="card-text">Departments: {{ $worker->departments }}</p>
      @endif
    </div>
  </div>
  
@endsection