@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >
                    Task Details
                    <div class="float-end">
                        <a class="btn btn-danger" href="{{ route('todos.index') }}">Back</a>

                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b>Task Title: </b>{{ $todo->title }} <br>
                    <b class="mt-2">Task description: </b> {{ $todo->description }} <br>
                    <b class="mt-2">Task status: </b> {{ $todo->is_completed }}
                   
                    {{-- <b>Task details: </b>{{ $todo->description }} --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
