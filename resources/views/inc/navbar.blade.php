<header class="main-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h2>Stand Blog<em>.</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                    <li class="nav-item active">
                        <div class="right-menu">
                            <button class="menu-button"><a class="nav-link" href="/posts">Categories</a></button>
                            <div class="dropdown-menu">
                                @foreach(App\Models\Category::all() as $category)
                                <a class="nav-link" href="/category/{{$category->category}}">{{$category->category}}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">
                            Contact us
                        </a>
                    </li>



                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <div class="right-menu">
                            <button class="menu-button" href="#">
                                <a class="nav-link">{{ Auth::user()->name }}</a>
                            </button>
                            <div class="dropdown-menu">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/posts/create">Create Post</a>
                    </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
