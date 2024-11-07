<!-- resources/views/admin/dashboard.blade.php -->
{{-- @extends('layouts.app')

@section('content')

{{-- <pre>{{ print_r(Route::getRoutes()->getRoutes()) }}</pre> --}}

    {{-- <h1>Admin Dashboard</h1>
    <p>Welcome to the Admin dashboard!</p>
    <h3>User Management</h3>

        <a href="{{ route('users.index') }}" class="btn btn-primary">Manage Users</a> --}}


{{-- @endsection --}} 

@extends('layouts.admin')

@section('dashboard_content')
    <h1>Welcome to the Admin Dashboard</h1>
    <p>This is where you can manage the entire site.</p>
@endsection

