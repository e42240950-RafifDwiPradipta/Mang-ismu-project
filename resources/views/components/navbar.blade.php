<nav class="navbar">
    <div class="container">
        
        <a href="{{ route('home') }}" class="navbar-logo-link">
            <img src="{{ asset('assets/images/Logo menu.svg') }}" alt="Logo Mang Ismu" class="navbar-logo">
        </a>

        <ul class="navbar-nav">
            <li><a href="{{ Request::is('/') ? '#beranda' : route('home') . '#beranda' }}">Beranda</a></li>
            <li><a href="{{ Request::is('/') ? '#tentang-kami' : route('home') . '#tentang-kami' }}">Tentang Kami</a></li>
            <li><a href="{{ route('menu') }}">Menu</a></li> 
            <li><a href="{{ Request::is('/') ? '#kontak' : route('home') . '#kontak' }}">Kontak</a></li>
        </ul>

        <div class="navbar-social">
            <a href="https://www.instagram.com/mang.ismu" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('assets/icons/instagram.svg') }}" alt="Instagram">
            </a>
            
            
        </div>

    </div>
</nav>