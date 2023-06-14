<x-guest-layout>
    <!-- main-area -->
    <main>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Новости</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="container mb-5 container__news">
                <div class="row">
                    @foreach($news as $key=>$item)
                    <div class="col-3 mb-4">
                        <div class="trending__post-thumb tgImage__hover">
                            <a href="{{route('news.show', $item->id)}}" class="image">
                                <img src="{{asset($item->image)}}" alt="img">
                            </a>
                        </div>
                        <div class="trending__post-content">
                            <h4 class=" tgcommon__hover news_text__w3"><a href="{{route('news.show', $item->id)}}">{{$item->title}}</a></h4>
                        </div>
                    </div>
                    @endforeach
                        {{ $news->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
    </main>
</x-guest-layout>
