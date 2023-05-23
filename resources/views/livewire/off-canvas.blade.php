<div class="offCanvas__wrap">
    <div class="offCanvas__body">
        <div class="offCanvas__toggle"><i class="flaticon-addition"></i></div>
        <div class="offCanvas__content">
            <div class="offCanvas__logo logo">
                <a href="{{route('main')}}" class="logo-dark"><img src="{{asset('build/assets/src/assets/img/logo/b_kinotalk.png')}}" alt="Logo"></a>
                <a href="{{route('main')}}" class="logo-light"><img src="{{asset('build/assets/src/assets/img/logo/w_kinotalk.png')}}" alt="Logo"></a>
            </div>
            <p>KinoTalk&nbsp;&mdash; это разговоры о&nbsp;кино,
                где в&nbsp;уютной обстановке любители кино при помощи
                статей обмениваются мнениями о&nbsp;современном кинематографе.</p>
            <p class="offCanvas__title">Популярные авторы KINOTALK</p>
            <ul class="offCanvas__instagram list-wrap">
                @foreach($authors as $key=>$author)
                <li>
                    <a href="{{route('authors.show', $author->id)}}">
                        {{$author->getFirstMedia('avatars')}}
                    </a>
                </li>
                @endforeach
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
