<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">GuestBook</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item @if($pages == 'event') active @endif">
                <a class="nav-link" href="{{ route('event.index') }}">Event List</a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                <li class="nav-item @if($pages == 'user') active @endif">
                    <a class="nav-link" href="{{ route('user.index') }}">User List</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
