@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-6">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach

            @endif

        </div>
    </div>

    <div class="text-center mt-5">

        <h1>Add Todo</h1>
        <form method="POST" action="{{ route('todos.store') }}" class="row g-3 justify-content-center">
            @csrf

            <div class="col-6">
                <input type="text" class="form-control" name="title" placeholder="Type TItle">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>

        </form>
    </div>

    <div class="text-center mt-3">
        <h2>All Todos</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $counter =1 @endphp
                        @foreach ($todos as $todo)
                            <tr>
                                <th>{{ $counter }}</th>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->created_at }}</td>
                                <td>
                                    @if ($todo->is_completed)
                                        <div class="badge bg-success">Completed</div>
                                    @else
                                    <div class="badge bg-warning">Not ompleted</div>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('todos.destroy', ['todo'=>$todo->id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @php $counter++ @endphp

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
