@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: #6600ff">Edit a Task</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-info" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                        </div>
                    @endif

                    <form action="{{ route('todos.edit', $todo->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div class="mb-3">
                          <label class="form-label">Task</label>
                          <input type="text" name="title" value="{{ $todo->title }}" class="form-control" >
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Details</label>
                          <textarea type="text" name="description" cols="5" rows="5" class="form-control" >{{ $todo->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="is_completed" id="" class="form-control">
                                <option value="" disabled selected>Select option</option>
                                <option value="1">Finished</option>
                                <option value="0">Not Done</option>
                            </select>
                          </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

