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
                                </a>
                            </div>
                            <div class="minimal__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li><span class="by">Автор:</span> <a href="{{route('authors.show', $user->id)}}">{{$user->name}}</a></li>
                                    <li>{{$user->created_at->diffForHumans()}}</li>
                                </ul>
                                <div class="tgAbout-social">
                                    @foreach($user->socialLinks as $key=>$socialLink)
                                        <a href="{{$socialLink->link}}" target="_blank"><i class="fab fa-{{$socialLink->socialType->icon_name}}"></i></a>
                                    @endforeach
                                </div>
                                @if ($user->articles->isNotEmpty())
                                    <h4 class="title tgcommon__hover"><a href="{{route('articles.show', $user->articles->first()->id)}}">{{$user->articles->first()->title}}</a></h4>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $users->links('vendor.pagination.bootstrap-5') }}
            </div>
        </section>
        <!-- minimal-post-area-end -->
    </main>
</x-guest-layout>
