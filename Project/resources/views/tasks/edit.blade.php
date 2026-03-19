@extends('layouts.app')

@section('content')
    <div class="hero">
        <div>
            <h2>Edit Task</h2>
            <p>Update the task details and save the latest changes.</p>
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

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Task Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}">

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5">{{ old('description', $task->description) }}</textarea>

            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <button type="submit" class="btn btn-success">Update Task</button>
        </form>
    </div>
@endsection