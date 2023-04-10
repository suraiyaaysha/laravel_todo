@extends('layouts.app')

@section('content')

    <div class="text-center mt-5">
        <h2>Edit Todo</h2>
    </div>

    <form action="{{ route('todos.update', ['todo'=>$todo->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $todo->title }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_completed" class="form-control">
                        <option value="1" @if($todo->is_completed==1) selected @endif >Completed</option>
                        <option value="0"  @if($todo->is_completed==0) selected @endif>Not Completed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

    </form>

@endsection
