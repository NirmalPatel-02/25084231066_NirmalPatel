@extends('layouts.app')

@section('content')
    <div class="hero">
        <div>
            <h2>Create New Task</h2>
            <p>Add a new task with title, description, and current status.</p>
        </div>
        <div>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">← Back to Dashboard</a>
        </div>
    </div>

    <div class="form-card">
        @if($errors->any())
            <div class="alert-danger">
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label for="title">Task Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter task title">

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" placeholder="Enter task description">{{ old('description') }}</textarea>

            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <button type="submit" class="btn btn-primary">Save Task</button>
        </form>
    </div>
@endsection