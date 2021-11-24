@extends('layouts.app')
@section('title', 'Show departments')
@section('content')

<a href="{{route('departments.index')}}" class="btn btn-success mb-3"><-Back</a>

<div class="card col-md-4 mx-auto" >
    <img src="{{ asset('img/departments.jpg') }}" class="card-img-top" alt="departments">
    <div class="card-body">
        <h3>Department: {{ $department->name }}</h3>
    </div>
  </div>
  
@endsection