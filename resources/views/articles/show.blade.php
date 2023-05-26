<x-guest-layout>
    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('articles')}}">Статьи</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        <!-- main-area -->

        <!-- blog-details-area -->
        <section class="blog-details-area pt-80 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details-wrap">
                            <ul class="tgbanner__content-meta list-wrap">
                                <li class="category">{{$article->category->name}}</li>
                                <li><span class="by">Автор:</span><a href="blog.html">{{$article->user->name}}</a></li>
                                <li>05.05.2023</li>
                            </ul>
                            <h2 class="title">{{$article->title}}</h2>
                            <div class="blog-details-thumb">
                                {{$article->getFirstMedia('sm_image')}}
                            </div>
                            <div class="blog-details-content">
                                <p>
                                    {!! $article->body !!}
                                </p>
{{--                                <p>Движение по спирали и фактически возвращение к исходной точке, в ту самую квартиру, публику скорее расстроило:--}}
{{--                                    это уже происходило с миссис Мейзел. Но, несмотря на слепое обожание, шоураннерка Эми Шерман-Палладино довольно--}}
{{--                                    вдумчиво и последовательно относится к судьбам своих героинь. В четвертом сезоне тихо, без фанфар и каруселей--}}
{{--                                    (не считая сцены-аттракциона на Конни-Айленде) завершилась основная арка Мидж: героиня наконец повзрослела.--}}
{{--                                    Именно инфантилизм и неприспособленность к самостоятельности стали отправной точкой сюжета в пилоте.--}}
{{--                                    «Муж-опекун» ушел, мир рухнул, домохозяйке и матери двоих детей пришлось в одночасье взрослеть за все предыдущие 26 лет.--}}
{{--                                    И что же поджидает по ту сторону Небыляндии? Налоги, долги и скандалы с молочником за лишнюю бутылку.--}}
{{--                                    Приключения не такие интересные, как гастроли с главным любимцем Америки. Где-то здесь, между детских горшков и неоплаченных счетов,--}}
{{--                                    и притаилась крамольная мысль: эмансипация — это не всегда весело, даже если ты стендап-комикесса.</p>--}}
{{--                                <p>Что еще парадоксальнее, удивительной миссис никак не могут простить то, что она больше не идеальна.--}}
{{--                                    Большинство героинь фемориентированных проектов канонизируют в поп-культуре за изъяны, будь то «Дрянь» Фиби Уоллер-Бридж или Вилланель из «Убивая Еву».--}}
{{--                                    Мейзел терпит злые упреки и обвинения в тщеславии, эгоизме и пренебрежении материнством. Женственность в образе Мириам к четвертому сезону выровнялась с желанием обладать мужскими--}}
{{--                                    «привилегиями»: позволять себе браниться на сцене, грязно шутить, заниматься сексом без обязательств, искренне желать мести (а потом, конечно, прощать и просить прощения) и--}}
{{--                                    даже доводить до слез будущую первую леди. Именно противоречивые моменты в поведении и становятся важной вехой развития — пусть зритель еще нет,--}}
{{--                                    но Мидж уже позволила себе быть неидеальной, ходить с растрепанной прической и не готовить грудинку каждые выходные. И это крохотный, но подвиг.--}}
{{--                                </p>--}}

{{--                                <div class="blog-details-inner">--}}
{{--                                    <div class="blog-details-images">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-4 col-sm-6">--}}
{{--                                                <div class="details-inner-image">--}}
{{--                                                    <img src="{{asset('build/assets/src/assets/img/article/MrsMaisel_1.png')}}" alt="img">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-4 col-sm-6">--}}
{{--                                                <div class="details-inner-image">--}}
{{--                                                    <img src="{{asset('build/assets/src/assets/img/article/MrsMaisel_2.png')}}" alt="img">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-4 col-sm-6">--}}
{{--                                                <div class="details-inner-image">--}}
{{--                                                    <img src="{{asset('build/assets/src/assets/img/article/MrsMaisel_3.png')}}" alt="img">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p>«Удивительная миссис Мейзел» закончится на пятом сезоне, о чем сообщил Amazon, и четвертый последовательно говорит о том, что бессмертия не существует.--}}
{{--                                        Шутки обрели горькое звучание, юмора стало меньше, а эпизодов, где невозможно смеяться даже через ком в горле, — больше.--}}
{{--                                        Так, одна из серий посвящена распорядителю «Газлайта» Джеки — авторы оставили трогательный трибьют артисту Брайану Тарантино, которого не стало в 2019 году.--}}
{{--                                        Его похороны красноречиво подчеркивают, что все не будет так, как раньше, а мир за пределами «Газлайта» устроен куда сложнее.</p>--}}
{{--                                </div>--}}
                                <blockquote>
                                    <p>“ Как-то я смешала текилу, абсент и красное вино. Вышло розовеньким. Никогда меня так не тошнило от любимого цвета ”</p>
                                    <div class="blockquote-cite">
                                        <div class="image">
                                            <img src="{{asset('build/assets/src/assets/img/article/MrsMaisel_6.png')}}" alt="img">
                                        </div>
                                        <div class="info">
                                            <h5>Мириам "Мидж" Мейзел</h5>
                                        </div>
                                    </div>
                                </blockquote>
                                <p>Эми Шерман-Палладино бескомпромиссно обозначила магистральное направление движения героини: Мидж несется вперед не к старомодному «долго и счастливо», а как можно дальше, в поисках собственной точки хотя бы временного спокойствия. Сложно загадывать, куда эта заснеженная дорога приведет, в рукаве у создателей еще много сюрпризов. Допустим, муж Рэйчел Броснахэн Джейсон Ральф, который сыграл продюсера «Шоу Гордона Форда» и, вероятно, станет одним из центральных персонажей пятого сезона.
                                    Но если Эми Шерман-Палладино не оступится из-за уговоров публики, то четвёртый сезон запомнится как шаткий мост к драматичному, болезненному и неоднозначному финалу одиссеи удивительной миссис Мейзел..</p>
                            </div>
                            <div class="blog-details-bottom">
                                <div class="row align-items-baseline">
                                    <div class="col-xl-6 col-md-7">
                                        <div class="blog-details-tags">
                                            <ul class="list-wrap mb-0">
                                                <li><a href="#">Сериалы</a></li>
                                                <li><a href="{{route('authors')}}">Авторы</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($article->comments as $key=>$comment)
                                <div class="blog-avatar-wrap p-3 bg-transparent border justify-content-between">
                                    <div class="blog-avatar-img">
                                        {{$comment->user->getFirstMedia('avatars')}}
                                        <span class="name m-lg-2">{{$comment->user->name}}</span>
                                    </div>
                                    <div class="blog-avatar-content">
                                        <p>{{ $comment->text }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @can('create-own comments')
                            <div class="row bg-transparent mt-3">
                                <div class="blog-avatar-img">
                                    {{Auth::user()->getFirstMedia('avatars')}}
                                </div>
                                <div class="blog-avatar-content w-100">
                                    <form method="POST" action="{{route('comment.create', $article->id)}}" class="form-control bg-transparent w-100">
                                       @csrf
                                       <div class="form-group">
                                           <label class="small mb-1" for="text"> Оставьте комментарий </label>
                                           <textarea class="form-control @error('text') border-red-500 @enderror" type="text" name="text"></textarea>
                                           @error('text')
                                           <p class="text-red-500">{{$message}}</p>
                                           @enderror
                                       </div>
                                       <button class="btn btn-primary mt-3 mb-3" type="submit">Коментировать</button>
                                    </form>
                                </div>
                            </div>
                            @endcan
                            <div class="blog-prev-next-posts">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item">
                                            <div class="thumb">
                                                <a href="article-details.html"><img src="{{asset('build/assets/src/assets/img/lifestyle/TheLastofUs.png')}}" alt="img"></a>
                                            </div>
                                            <div class="content">
                                                <span>Предыдущая статья</span>
                                                <h5 class="title tgcommon__hover"><a href="article-details.html">После просмотра 1 сезона "The Last of Us"...</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item next-post">
                                            <div class="thumb">
                                                <a href="article-details.html"><img src="{{asset('build/assets/src/assets/img/lifestyle/LordOfTheRings.png')}}" alt="img"></a>
                                            </div>
                                            <div class="content">
                                                <span>Следующая статья</span>
                                                <h5 class="title tgcommon__hover"><a href="article-details.html">Сказания о Средиземье — это хроника Великой...</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <aside class="blog-sidebar">
                            <div class="widget sidebar-widget">
                                <div class="tgAbout-me">
                                    <div class="tgAbout-thumb">
                                        {{ $article->user->getFirstMedia('avatars') }}
                                    </div>
                                    <div class="tgAbout-info">
                                        <span class="designation">{{$article->user->name}}</span>
                                    </div>
                                    <div class="tgAbout-social">
                                        <a href="#"><i class="fab flaticon-instagram"></i></a>
                                        <a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        <a href="#"><i class="fab fa-vk"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget sidebar-widget widget_categories">
                                <h4 class="widget-title">Популярная категория</h4>
                                <ul class="list-wrap">
                                    <li>
                                        <div class="thumb"><a href="news.html"><img src="{{asset('build/assets/src/assets/img/category/Mira.png')}}" alt="img"></a></div>
                                        <a href="news.html">Кино</a>
                                        <span class="float-right">12</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img src="{{asset('build/assets/src/assets/img/category/Sansara.png')}}" alt="img"></a></div>
                                        <a href="news.html">Сериалы</a>
                                        <span class="float-right">10</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img src="{{asset('build/assets/src/assets/img/category/GuardiansOfTheGalaxy.png')}}" alt="img"></a></div>
                                        <a href="news.html">Комиксы</a>
                                        <span class="float-right">08</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img src="{{asset('build/assets/src/assets/img/category/HarryPotter.png')}}" alt="img"></a></div>
                                        <a href="news.html">Франшизы</a>
                                        <span class="float-right">06</span>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->
    </main>
</x-guest-layout>
