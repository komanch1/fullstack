@extends('layouts.app')
@section('title', 'Add Worker')
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

        <form method="POST" action="{{ route('workers.store') }}">
            @csrf
            <div class="form-group">
                <label for="nameWorker">Add worker</label>
                <input name="name" type="text" class="form-control" id="nameWorker" placeholder="Dr. Jason Graham" value="{{ old('name') }}">
            </div>
            
            <div class="form-group">
                <label for="salaryWorker">Add salary</label>
                <input name="salary" type="number" class="form-control" id="salaryWorker" placeholder="22000" value="{{ old('salary') }}">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection