@extends('layouts.app')
@section('styles')
@endsection
<style>
#outer 
{
    width: 100%;
    text-align: center;
    display: inline-block;
    margin-bottom: auto;
}
.inner 
{
 display: inline-block;
}
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: #091aff">
                   All Tasks
                   <div class="float-end">
                        <a class="btn btn-info" href="{{ route('todos.create') }}">Create Task</a>
                       
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                        </div>
                    @endif

                    @if (count($todos) < 1)
                      <h4 style="color: red">No task to do</h4>
                      <p><b>Please  </b> <a href="{{ route('todos.create') }}"> add</a> a task</p>
                    @else
                    

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Task</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td scope="row">{{ $todo->id }}</td>
                                    <td>{{ $todo->title }}</td>
                                    <td>
                            @if ($todo->is_completed == 1)
                                <a href="" class="btn btn-success btn-sm" >Completed</a>
                            @else
                                <a href="" class="btn btn-warning btn-sm" >Not completed</a>
                            @endif

                            </td>
                            <td id="outer">
                                <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-success btn-sm"> view</a>

                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary btn-sm"> Update</a>

                            <form action="{{ route('todos.delete', $todo->id) }}" method="POST" class="inner">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="todo_id" value="{{ $todo->id }}">

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm" >Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {!! $todos->links() !!}
                  {{-- {!! $todos->appends(\Request::except('page'))->render() !!} --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
    <script>
            Swal("Congrats", { !!Session::get('success')!! }, "success",
            {
                button: "OK"
            }
                )
    </script>
@endif

