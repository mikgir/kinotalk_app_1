<x-guest-layout>
    <div class="container">
        <div class="row">
            <div class="error-heading text-center mt-5 mb-5">
                <h2 class="headline font-info">Раздел в разработке</h2>
            </div>
            <img class="img-100" src="{{asset('build/assets/src/assets/img/others/2_login_bg.jpg')}}" alt="">
            <div class="col-md-8 offset-md-2 mt-5">
                <p class="sub-content">Страница, которую вы пытаетесь открыть, в настоящее время недоступна. Это связано с тем, данный раздел находится в разработке.</p>
            </div>
            <div class="mb-5 mt-5">
                <a class="btn btn-info-gradien btn-lg" href="{{ route('main')}}">НА ГЛАВНУЮ</a>
            </div>
        </div>
    </div>
</x-guest-layout>
