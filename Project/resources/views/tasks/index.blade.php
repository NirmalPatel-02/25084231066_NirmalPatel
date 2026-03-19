@extends('layouts.app')

@section('content')
    <div class="hero">
        <div>
            <h2>Laravel Task Manager</h2>
            <p>
                A clean practical project demonstrating middleware, validation,
                session management, URL generation, Blade templates, error handling, and security features.
            </p>
        </div>
        <div>
            <a href="{{ route('tasks.create') }}" class="btn btn-success">+ Create New Task</a>
        </div>
    </div>

    <h2 class="section-title">All Tasks</h2>
    <p class="sub-text">
        Manage your tasks in a simple and beautiful interface built with Laravel Blade templates.
    </p>

    @if($tasks->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th width="260">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>#{{ $task->id }}</td>
                        <td><strong>{{ $task->title }}</strong></td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if($task->status == 'Pending')
                                <span class="badge badge-pending">{{ $task->status }}</span>
                            @else
                                <span class="badge badge-completed">{{ $task->status }}</span>
                            @endif
                        </td>
                        <td>{{ $task->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <h3>No Tasks Yet</h3>
            <p>Create your first task to start managing work efficiently.</p>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create First Task</a>
        </div>
    @endif
@endsection