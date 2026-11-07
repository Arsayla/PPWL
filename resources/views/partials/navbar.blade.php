<nav class="navbar">
    <div class="container nav-container">
        <a href="{{ route('home') }}" class="logo">MyPortfolio</a>

        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('education') }}">Education</a>
            <a href="{{ route('projects') }}">Projects</a>
            <a href="{{ route('newpost') }}">Posts</a>

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="nav-button">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Admin</a>
            @endauth
        </div>
    </div>
</nav>
