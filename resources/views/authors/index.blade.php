<x-guest-layout>
    <main>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Авторы</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- minimal-post-area -->
        <section class="minimal__post-area pt-80 pb-80">
            <div class="container">
                <div class="minimal__post-wrapper">
                    @foreach($users as $key=>$user)
                    <div class="minimal__post-item grid-item">
                        <div class="minimal__post-thumb minImage__hover">
                            <a href="{{route('authors.show', $user->id)}}">
                                {{ $user->getFirstMedia('avatars') }}
{{--                                <img src="{{asset('build/assets/src/assets/img/user/People1.png')}}" alt="img">--}}
                            </a>
                        </div>
                        <div class="minimal__post-content">
                            <ul class="tgbanner__content-meta list-wrap">
                                <li><span class="by">Автор:</span> <a href="{{route('authors.show', $user->id)}}">{{$user->name}}</a></li>
                                <li>{{$user->created_at}}</li>
                            </ul>
                            <h4 class="title tgcommon__hover"><a href="article-details.html">После просмотра 1 сезона "The Last of Us"...</a></h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination__wrap">
                    <ul class="list-wrap">
                        <li class="active"><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                    </ul>
                </div>

            </div>
        </section>
        <!-- minimal-post-area-end -->
    </main>
</x-guest-layout>
