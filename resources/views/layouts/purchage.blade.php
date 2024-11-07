@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 p-2">
                <div class="bg-dark text-white vh-100" style="
                margin-left: -83px;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h2 class="navbar-brand" href="#" style="
                            font-size: 20px;
                            margin: 17px;">BHG Management</h2>
                            <a class="nav-link text-white" href="{{ route('purchage.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('users.index') }}">
                                <i class="fas fa-users"></i> Manage Users
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-cogs"></i> Purchage Menu
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-cogs"></i> Purchage Data
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Purchage Panel</a>
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
