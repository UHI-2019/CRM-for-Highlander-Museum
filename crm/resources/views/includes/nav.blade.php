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
            @if(Auth::check())
                <form style="margin:0" method="POST" action="{{ route('logout') }}" class="form-inline">
                    @csrf
                    <button class="form-control btn btn-outline-primary" type="submit">Logout</button>
                </form>
            @endif
        </ul>
        
    </div>
</nav>