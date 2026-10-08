<nav>
    <div class="brand">
        📚 Perpustakaan Digital Kampus
    </div>

    @auth
        <ul>
            <li>
                <a href="{{ route('books.index') }}"
                   class="{{ request()->routeIs('books.*') ? 'active' : '' }}">
                    Buku
                </a>
            </li>

            @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('categories.index') }}"
                       class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        Kategori
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('members.index') }}"
                   class="{{ request()->routeIs('members.*') ? 'active' : '' }}">
                    Anggota
                </a>
            </li>

            <li>
                <a href="{{ route('loans.index') }}"
                   class="{{ request()->routeIs('loans.*') ? 'active' : '' }}">
                    Peminjaman
                </a>
            </li>

            <li>
                <a href="{{ route('profil') }}"
                   class="{{ request()->routeIs('profil') ? 'active' : '' }}">
                    Profil
                </a>
            </li>

            <li>
                <span class="navbar-user">
                    {{ auth()->user()->name }}
                    ({{ ucfirst(auth()->user()->role) }})
                </span>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    @else
        <ul>
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
        </ul>
    @endauth
</nav>