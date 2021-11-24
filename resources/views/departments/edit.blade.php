@extends('layouts.app')
@section('title', 'Edit Department')
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

        <form method="POST" action="{{ route('departments.update', $department) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nameDepartment">Edit department</label>
                <input name="name" type="text" class="form-control" id="nameDepartment"  value="{{ $department->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection