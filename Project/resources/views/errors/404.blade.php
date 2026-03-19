@extends('layouts.app')

@section('content')
    <div class="hero">
        <div>
            <h2>404 - Page Not Found</h2>
            <p>The page you are trying to access does not exist or may have been moved.</p>
        </div>
        <div>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Go to Dashboard</a>
        </div>
    </div>

    <div class="empty-state">
        <h3>Oops! Nothing here.</h3>
        <p>Please check the URL or return to the main dashboard.</p>
    </div>
@endsection