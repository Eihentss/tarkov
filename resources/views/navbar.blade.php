

    <link rel="stylesheet" href="/app.css">
    <div class="navbar">
        <a href="/">
            <img src="{{ asset('images/tarkov-dev-logo.png') }}" alt="Logo">
        </a>
        <div>
            <a href="/tarkov/ammo">Ammo</a>
            <a href="/tarkov/task">Tasks</a>
            <a href="/items">Items</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
