@extends('layouts.app')

@section('content')

<!-- Inline CSS -->
<style>
    /* Sidebar Styling */
    .sidebar {
        background-color: #343a40 !important; /* New dark grayish-blue color */
        color: #ffffff;
        height: 100vh;
    }

    .nav-link {
        color: #ffffff;
        font-weight: 500;
        padding: 10px 20px;
    }

    .nav-link:hover,
    .nav-link.active {
        background-color: #007bff;
        color: #ffffff;
        border-radius: 5px;
    }

    .dropdown-menu {
        min-width: 200px;
    }

    .dropdown-item {
        padding: 8px 15px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-flex flex-column flex-shrink-0 p-3 sidebar" style="margin-left: -5rem; width: 17rem;">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
                <span class="fs-4">BHG Management</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active" aria-current="page">
                        <i class="bi bi-house-door-fill"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="nav-link link-light">
                        <i class="bi bi-people-fill"></i> Manage Users
                    </a>
                </li>
                <li>
                    <a href="" class="nav-link link-light">
                        <i class="bi bi-gear-fill"></i> Settings
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-2"></i>
                    <strong>{{ auth()->user()->name }}</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </ul>
                </div>
            </nav>

            <!-- Content Section -->
            <div class="container mt-4">
                @yield('dashboard_content')
            </div>
        </div>
    </div>
</div>

@endsection
