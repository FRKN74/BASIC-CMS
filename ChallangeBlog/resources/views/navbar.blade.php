<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('create') }}">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('articles') }}">Sayfaya git</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('create') }}">Detaylar</a>
            </li>
    </ul>
    </div>
    <div class="logout-inline">
        <a href="{{ route('logout') }}">Çıkış yap</a>
    </div>
</nav>