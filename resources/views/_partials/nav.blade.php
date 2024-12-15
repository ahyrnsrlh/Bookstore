<nav>
<div class="container">
    <div class="brand">
        <a href="{{ route('home') }}">
            <img src="{{ image(site('logo'), 'setting') }}" alt="{{ site('name') }}">
        </a>
        <i class="icon ion-md-menu drawer"></i>
    </div>
    <div class="menu">
        <ul class="list">
            <li class="{{ active('/') }}"><a href="{{ route('home') }}">Discover</a></li>
            <li class="{{ active('category', 'active', 'group') }}"><a href="{{ route('category.index') }}">Category</a></li>
        </ul>
        <ul class="user">
            @auth
                <li><a href="{{ route('cart.index') }}"><i class="icon ion-md-cart"></i></a></li>
                <li><img src="{{ image(auth()->user()->detail->photo ?? 'default.jpg', 'user') }}"></li>
                <li class="dropdown">
                    <span class="toggle" target="#user">Hi, <strong>{{ auth()->user()->name }}</strong></span>
                    <div class="menu" id="user">
                        <div class="items">
                            <span class="heading">{{ auth()->user()->name }}</span>
                            <a class="item" href="{{ route('user.profile') }}">Profile</a>
                            <a class="item" href="{{ route('transaction.index') }}">Transaction</a>
                            <form class="item" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="w-full" style="text-align: left;" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endauth
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </div>
</div>
</nav>