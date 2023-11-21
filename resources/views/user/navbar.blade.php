
    <nav class="navbar navbar-expand-lg  ">
        <a class="navbar-brand" href="#">BLOSSOM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="#">HOME</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#features">SHOPPING</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#footer">CONTACT</a>
                </li>


                <li class="nav-item">

                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('showcart') }}">CART</a>
                    </li>

                        <form id="logout-form" action="{{ url('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button class="btnlg" type="submit">LOGOUT</button>

                        </form>
                    @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">
                        LOGIN
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">
                        REGISTER
                    </a>
                </li>
                @endif


                </li>

            </ul>
        </div>
    </nav>


