@extends('layouts.app')
@section('title', 'Add Departments')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-9 col-sm-12 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('departments.store') }}">
            @csrf
            <div class="form-group">
                <label for="nameWorker">Add departments</label>
                <input type="text" class="form-control" id="nameWorker" placeholder="Administrations">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection