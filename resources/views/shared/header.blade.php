<header class="container">

    <nav class="navbar navbar-expand-md navbar-light bg-white">

        @if (session('Data.DataType') == 'Admin')
            <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                <img src="{{ asset('images/Logo-2.png') }}" width="70" height="57" class="d-inline-block align-top"
                    alt="UNi Logo">
            </a>
        @elseif (session('Data.DataType') == 'User')
            <a class="navbar-brand" href="{{ url('//user/books') }}">
                <img src="{{ asset('images/Logo-2.png') }}" width="70" height="57" class="d-inline-block align-top"
                    alt="UNi Logo">
            </a>
        @else
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/Logo-2.png') }}" width="70" height="57" class="d-inline-block align-top"
                    alt="UNi Logo">
            </a>
        @endif


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-caret-down fa-lg" style="color: #224172;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                @if (session('Data.DataType') == 'Admin')
                    <li class="nav-item mx-1 {{ Request::is('admin/dashboard') ? 'active' : null }}">
                        <a class="nav-link" href="{{ URL::to('admin/dashboard') }}">
                            <span style="color: #224172;">Dashboard</span></a>
                    </li>
                    <li class="nav-item mx-1 {{ Request::is('racks') ? 'active' : null }}">
                        <a class="nav-link" href="{{ URL::to('racks') }}">
                            <span style="color: #224172;">Racks</span></a>
                    </li>
                    <li class="nav-item mx-1 {{ Request::is('books') ? 'active' : null }}">
                        <a class="nav-link" href="{{ URL::to('books') }}">
                            <span style="color: #224172;">Books</span></a>
                    </li>
                @elseif (session('Data.DataType') == 'User')
                @else
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="#"><span style="color: #224172;">About Us</span></a>
                    </li>
                @endif

            </ul>

            @if (session()->has('Data'))
                <a href="/logout" class="btn btn-UNi" style="color: white;"><i class="fas fa-power-off"></i></a>
            @endif
        </div>
    </nav>
</header>
