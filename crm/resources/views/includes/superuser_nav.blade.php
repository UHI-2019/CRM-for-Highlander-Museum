<?php
use Illuminate\Support\Facades\Auth;
?>

<nav class="navbar navbar-light bg-light justify-content-between">
    <div class="container">
        <a href="#" class="navbar-brand">Highlander CRM</a>

        <!-- left nav -->
        <ul class="navbar-nav mr-auto">
        </ul>

        <!-- right nav -->
        <ul class="navbar-nav">
            <!-- if user is logged in -->
            <li class="nav-item">
                <a href="/admin/create" class="nav-link">Create Admin</a>
            </li>
        </ul>

        @if(Auth::check())
            <form class="mb-0 ml-3" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="form-control btn btn-outline-primary" type="submit">Logout</button>
            </form>
        @endif

    </div>
</nav>