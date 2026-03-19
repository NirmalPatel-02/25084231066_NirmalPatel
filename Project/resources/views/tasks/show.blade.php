@extends('layouts.app')

@section('content')
    <div class="hero">
        <div>
            <h2>Task Details</h2>
            <p>View complete information for the selected task.</p>
        </div>
        <div>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">← Back to Dashboard</a>
        </div>
    </div>

    <div class="details-card">
        <p><strong>ID:</strong> #{{ $task->id }}</p>
        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p>
            <strong>Status:</strong>
            @if($task->status == 'Pending')
                <span class="badge badge-pending">{{ $task->status }}</span>
            @else
                <span class="badge badge-completed">{{ $task->status }}</span>
            @endif
        </p>
        <p><strong>Created At:</strong> {{ $task->created_at->format('d M Y h:i A') }}</p>
        <p><strong>Last Updated:</strong> {{ $task->updated_at->format('d M Y h:i A') }}</p>
    </div>
@endsection