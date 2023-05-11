<!-- header-area -->
<header>
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
                        <a href="#" class="logo-dark"><img src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>
                        <a href="#" class="logo-light"><img src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 order-3 d-none d-sm-block">
                    <div class="header__top-right">
                        <ul class="list-wrap">
                            <li class="news-btn">
                                @if (Route::has('login'))
                                    <div class="dropdown">
                                        @auth
                                            <a class="dropdown-toggle btn" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="btn-text"><i class="fa fa-user"></i> {{ Auth::user()->name }}</span>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                                    <li>
                                                        <x-dropdown-link :href="route('main')">
                                                            {{ __('Главная') }}
                                                        </x-dropdown-link>
                                                    </li>
                                                    <li>
                                                        <x-dropdown-link :href="route('profile.show')">
                                                            {{ __('Профиль') }}
                                                        </x-dropdown-link>
                                                    </li>
{{--                                                    <li>--}}
{{--                                                        <x-dropdown-link :href="route('/admin')">--}}
{{--                                                            {{ __('Админ') }}--}}
{{--                                                        </x-dropdown-link>--}}
{{--                                                    </li>--}}
                                                    <li>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf

                                                            <x-dropdown-link :href="route('logout')"
                                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                                {{ __('Выход') }}
                                                            </x-dropdown-link>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn"><span class="btn-text">Войти</span></a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="btn"><span class="btn-text">Регистрация</span></a>
                                            @endif
                                        @endif
                                    </div>
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

    <div id="sticky-header" class="tg-header__area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo d-block d-md-none">
                                <a href="index.html" class="logo-dark"><img src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>
                                <a href="index.html" class="logo-light"><img src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>
                            </div>
                            <div class="offcanvas-toggle">
                                <a href="#"><i class="flaticon-menu-bar"></i></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="active menu-item-has-children"><a href="{{route('main')}}">Главная</a>
                                        <ul class="sub-menu">
                                            <li class="active"><a href="{{route('main')}}">На главную</a></li>
                                            <li><a href="index-2.html">Новинки кино</a></li>
                                            <li><a href="index-3.html">В фокусе</a></li>
                                            <li><a href="index-4.html">Скоро в кино</a></li>
                                            <li><a href="index-5.html">Цифровые релизы</a></li>
                                            <li><a href="index-5.html">Кассовые сборы за месяц</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('articles')}}">Статьи</a></li>
                                    <li><a href="{{route('news')}}">Новости</a></li>
                                    <li><a href="{{route('authors')}}">Авторы</a></li>
                                    <li class="menu-item-has-children"><a href="#">Популярное</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Статьи</a></li>
                                            <li><a href="#">Авторы</a></li>
                                            <li><a href="#">Теги</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Подборки фильмов</a></li>
                                </ul>
                            </div>
                            <div class="tgmenu__action">
                                <ul class="list-wrap">
                                    <li class="mode-switcher">
                                        <nav class="switcher__tab">
                                            <span class="switcher__btn light-mode"><i class="flaticon-sun"></i></span>
                                            <span class="switcher__mode"></span>
                                            <span class="switcher__btn dark-mode"><i class="flaticon-moon"></i></span>
                                        </nav>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html" class="logo-dark"><img src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>
                                <a href="index.html" class="logo-light"><img src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>
                            </div>
                            <div class="tgmobile__search">
                                <form action="#">
                                    <input type="text" placeholder="Статьи, авторы, теги...">
                                    <button><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <div class="tgmobile__menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="list-wrap">
                                    <li><a href="#"><i class="fab flaticon-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
    <!-- Sticky-navigation-area-end -->
    <!-- offCanvas-area -->
    <div class="offCanvas__wrap">
        <div class="offCanvas__body">
            <div class="offCanvas__toggle"><i class="flaticon-addition"></i></div>
            <div class="offCanvas__content">
                <div class="offCanvas__logo logo">
                    <a href="#" class="logo-dark"><img src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>
                    <a href="#" class="logo-light"><img src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>
                </div>
                <p>KinoTalk&nbsp;&mdash; это разговоры о&nbsp;кино,
                    где в&nbsp;уютной обстановке любители кино при помощи
                    статей обмениваются мнениями о&nbsp;современном кинематографе.</p>
                <p class="offCanvas__title">Популярные авторы KINOTALK</p>
                <ul class="offCanvas__instagram list-wrap">
                    <li><a href="{{asset('build/assets/src/assets/img/blog/blog01.jpg')}}" class="popup-image"><img src="{{asset('build/assets/src/assets/img/blog/People1.png')}}" alt="img"></a></li>
                    <li><a href="{{asset('build/assets/src/assets/img/blog/blog02.jpg')}}" class="popup-image"><img src="{{asset('build/assets/src/assets/img/blog/People3.png')}}" alt="img"></a></li>
                    <li><a href="{{asset('build/assets/src/assets/img/blog/blog03.jpg')}}" class="popup-image"><img src="{{asset('build/assets/src/assets/img/blog/People4.png')}}" alt="img"></a></li>
                    <li><a href="{{asset('build/assets/src/assets/img/blog/blog04.jpg')}}" class="popup-image"><img src="{{asset('build/assets/src/assets/img/blog/People2.png')}}" alt="img"></a></li>
                    <li><a href="{{asset('build/assets/src/assets/img/blog/blog05.jpg')}}" class="popup-image"><img src="{{asset('build/assets/src/assets/img/blog/People6.png')}}" alt="img"></a></li>
                    <li><a href="{{asset('build/assets/src/assets/img/blog/blog06.jpg')}}" class="popup-image"><img src="{{asset('build/assets/src/assets/img/blog/People5.png')}}" alt="img"></a></li>
                </ul>
            </div>
            <div class="offCanvas__contact">
                <h4 class="title">Связаться с нами</h4>
                <ul class="offCanvas__contact-list list-wrap">
                    <li><i class="fas fa-envelope-open"></i><a href="mailto:info@webmail.com">info@webmail.com</a></li>
                    <li><i class="fas fa-phone"></i><a href="tel:88899988877">888 999 888 77</a></li>
                    <li><i class="fas fa-map-marker-alt"></i>Адрес</li>
                </ul>
                <ul class="offCanvas__social list-wrap">
                    <li><a href="#"><i class="fab flaticon-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                    <li><a href="#"><i class="fab fa-vk"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="offCanvas__overlay"></div>
    <!-- offCanvas-area-end -->

</header>
<!-- header-area-end -->
