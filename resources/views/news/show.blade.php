<x-guest-layout xmlns:livewire="http://www.w3.org/1999/html">
    <livewire:styles/>
    <livewire:scripts/>
    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content glass-m">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('news')}}">Новости</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
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
                                <li>{{$news->created_at}}</li>
                            </ul>
                            <h2 class="title">{{$news->title}}</h2>
                            <div class="blog-details-thumb">
                                <img src="{{asset($news->image)}}" alt="img">
                            </div>
                            <div class="blog-details-content">
                                <p>{!! $news->body !!}</p>
                            </div>

                            <livewire:reactions :model="$news"/>

                            <div class="blog-details-bottom">
                                <div class="row align-items-baseline">
                                    <div class="col-xl-6 col-md-7">
                                        <div class="blog-details-tags">
                                            <ul class="list-wrap mb-0">
                                                <li><a href="{{route('news')}}">Новости</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <livewire:comments :model="$news"/>
                                <script>
                                    window.addEventListener('closeModal', event => {
                                        $('[id*="modalForm"]').modal('hide');
                                    })
                                </script>

                            <div class="blog-prev-next-posts">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item">
                                            <div class="thumb">
                                                <a href="{{route('news.show', $previousNews->id)}}">
                                                    <img
                                                        src="{{$previousNews->image}}"
                                                        alt="img">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <span>Предыдущая новость</span>
                                                <h5 class="title tgcommon__hover news_text__w3">
                                                    <a href="{{route('news.show', $previousNews->id)}}">{{Str::limit($previousNews->title, $limit = 40, ' ...')}}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item next-post">
                                            <div class="thumb">
                                                <a href="{{route('news.show', $nextNews->id)}}">
                                                    <img
                                                        src="{{$nextNews->image}}"
                                                        alt="img">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <span>Следующая новость</span>
                                                <h5 class="title tgcommon__hover news_text__w3">
                                                    <a href="{{route('news.show', $nextNews->id)}}">{{Str::limit($nextNews->title, $limit = 40, ' ...')}}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <aside class="blog-sidebar">
                            <livewire:category-widget/>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->
    </main>
</x-guest-layout>
