<div id="sticky-header" class="tg-header__area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tgmenu__wrap">
                    <nav class="tgmenu__nav">
                        <div class="logo d-block d-md-none">
                            <a href="{{route('main')}}" class="logo-dark"><img
                                    src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>
                            <a href="{{route('main')}}" class="logo-light"><img
                                    src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>
                        </div>
                        <div class="offcanvas-toggle">
                            <a href="#"><i class="flaticon-menu-bar"></i></a>
                        </div>
                        <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                            <ul class="navigation">
                                <li class="@if (request()->routeIs('main')) active @endif"><a href="{{route('main')}}">Главная</a>
                                </li>
                                <li class="menu-item-has-children @if (request()->routeIs('articles') || request()->routeIs('articles.*')) active @endif">
                                    <a href="{{route('articles')}}">Статьи</a>
                                    <ul class="sub-menu">
                                        @foreach($categories as $key=>$category)
                                            <li class="item {{ $category->name === $category->id ? 'active' : '' }}">
                                                <a href="{{route('articles.category') . '?page=' . $category->id}}">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="@if (request()->routeIs('news') || request()->routeIs('news.*')) active @endif">
                                    <a
                                        href="{{route('news')}}">Новости</a></li>
                                <li class="@if (request()->routeIs('authors') || request()->routeIs('authors.*')) active @endif">
                                    <a
                                        href="{{route('authors')}}">Авторы</a></li>
                                {{--                                <li class="menu-item-has-children"><a href="#">Популярное</a>--}}
                                {{--                                    <ul class="sub-menu">--}}
                                {{--                                        <li><a href="#">Статьи</a></li>--}}
                                {{--                                        <li><a href="#">Авторы</a></li>--}}
                                {{--                                        <li><a href="#">Теги</a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </li>--}}
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
                            <a href="{{route('main')}}" class="logo-dark"><img
                                    src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>
                            <a href="{{route('main')}}" class="logo-light"><img
                                    src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>
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
