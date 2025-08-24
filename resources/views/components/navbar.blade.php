<nav>
    <div class="nav-left">
        <a href="{{ route('index') }}">Home</a>
        <a href="{{ route('faq.public') }}">FAQ</a>
        <a href="{{ route('contact.create') }}">Contact</a>
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.userIndex') }}">Gebruikersbeheer</a>
                <a href="{{ route('news.newsIndex') }}">Nieuwsbeheer</a>
                <a href="{{ route('faq.adminIndex') }}">FAQ-Beheer</a>
                <a href="{{ route('admin.contact.index') }}">Contactberichten</a>
            @endif
        @endauth
    </div>
    <div class="nav-right">
        @auth
            <a href="{{ route('profile.myProfile') }}">{{ Auth::user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}">Inloggen</a>
            <a href="{{ route('register') }}">Registreren</a>
        @endauth
    </div>
</nav>