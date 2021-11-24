@extends('layouts.app')
@section('title', 'Edit Worker')
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

        <form method="POST" action="{{ route('workers.update', $worker) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nameWorker">Edit worker</label>
                <input name="name" type="text" class="form-control" id="nameWorker"  value="{{ $worker->name }}"><!--placeholder="Dr. Jason Graham"-->
            </div>
            
            <div class="form-group">
                <label for="salaryWorker">Edit salary</label>
                <input name="salary" type="number" class="form-control" id="salaryWorker" placeholder="22000" value="{{ $worker->salary }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection