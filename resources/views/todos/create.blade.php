@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: #ff9100">
                    Create a Task
                    <div class="float-end">
                        <a class="btn btn-info" href="{{ route('todos.index') }}">View Tasks</a>
                       
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('todos.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Task</label>
                          <input type="text" name="title" class="form-control" >
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Details</label>
                          <textarea type="text" name="description" cols="5" rows="5" class="form-control" ></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

