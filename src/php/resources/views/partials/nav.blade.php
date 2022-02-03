<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
    <a class="navbar-brand ms-3" href="{{ route('inicio') }}">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.index') }}"><button
                        class="btn btn-secondary">Listado</button></a>
            </li>
        </ul>
        @if (!auth()->check())
            <ul class="nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><button
                            class="btn btn-primary">Login</button></a>
                </li>
            </ul>

        @endif
        @if (auth()->check())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}"><button
                            class="btn btn-secondary">Creacion</button></a>
                </li>
            </ul>
            <ul class="nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><button
                            class="btn btn-danger">Logout</button></a>
                </li>
            </ul>

        @endif
        </ul>
    </div>
</nav>
