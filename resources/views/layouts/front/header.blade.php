<!-- header-area -->
<header xmlns:livewire="">
    <div class="header__top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-sm-6 order-2 order-lg-0">
                    <div class="header__top-search">
                        <form action="#">
                            <input type="text" placeholder="Статьи, авторы, теги...">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 order-0 order-lg-2 d-none d-md-block">
                    <div class="header__top-logo logo text-lg-center">
                        <a href="{{route('main')}}" class="logo-dark"><img src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>
                        <a href="{{route('main')}}" class="logo-light"><img src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 order-3 d-none d-sm-block">
                    <div class="header__top-right">
                        <ul class="list-wrap">
                            <li class="news-btn">
                                @if (Route::has('login'))
                                    @auth
                                    <div class="dropdown lang">
                                            <a class="dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="btn-text"><i class="fa fa-user"></i> {{ Auth::user()->name }}</span>
                                            </a>
                                                <ul class="dropdown-menu p-3" aria-labelledby="navbarDarkDropdownMenuLink">
                                                    <li>
                                                        <a class="item dropdown-item " href="{{route('main')}}">
                                                            {{ __('Главная') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="item dropdown-item item" href="{{route('profile.show')}}">
                                                            {{ __('Профиль') }}
                                                        </a>
                                                    </li>
                                                    @hasrole('super_admin')
{{--                                                    <li>--}}
{{--                                                        <a class="item dropdown-item" href="{{route('admin')}}">--}}
{{--                                                            {{ __('Админ') }}--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
                                                    @endhasrole
                                                    <li>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf

                                                            <a class="item dropdown-item" href="{{route('logout')}}"
                                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                                {{ __('Выход') }}
                                                            </a>
                                                        </form>
                                                    </li>
                                                </ul>
                                    </div>
                                        @else
                                            <a href="{{ route('login') }}" class="btn"><span class="btn-text">Войти</span></a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="btn"><span class="btn-text">Регистрация</span></a>
                                            @endif
                                        @endif
                                @endif
{{--                                <a href="#" class="btn"><span class="btn-text">Войти</span></a>--}}
                            </li>
                            <li class="lang">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        RU
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">ENG</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="header-fixed-height"></div>
    <!-- Sticky-navigation-area -->
    <livewire:navigation/>
    <!-- Sticky-navigation-area-end -->
    <!-- offCanvas-area -->
   <livewire:off-canvas/>
    <div class="offCanvas__overlay"></div>
    <!-- offCanvas-area-end -->

</header>
<!-- header-area-end -->
