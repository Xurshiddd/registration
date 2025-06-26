<header class="bg-gray-800 bg-opacity-100 backdrop-blur text-white sticky top-0 z-50" style="opacity: 0.8;">
    <nav class="container mx-auto flex justify-between items-center p-4 ">
        <div class="flex items-center">
            <a href="https://ttysi.uz" class="flex items-center space-x-2">
                <img src="{{ asset('uzb.png') }}" alt="Logo" class="h-15 w-60">
            </a>
        </div>
        <div class="flex align-items-center justify-around">
            <!-- Login Button -->
            @if (auth()->check())
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button 
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200"
                >
                Logout
            </button>
        </form>
        @else
        <button 
        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200"
        onclick="document.getElementById('loginModal').classList.remove('hidden')"
        >
        Login
    </button>
    @endif
    
    
    <!-- Login Modal -->
    
    <ul class="navbar-nav ml-5">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ app()->getLocale() }}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                <li><a class="dropdown-item" href="{{ route('lang.switch', 'uz') }}">UZ</a></li>
                <li><a class="dropdown-item" href="{{ route('lang.switch', 'ru') }}">RU</a></li>
                <li><a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">EN</a></li>
            </ul>
        </li>
    </ul>
</div>
</nav>   

</header>