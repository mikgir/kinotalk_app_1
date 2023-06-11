<div class="widget sidebar-widget">
    <div class="tgAbout-me">
        <div class="tgAbout-thumb">
            {{ $user->getFirstMedia('avatars') }}
        </div>
        <div class="tgAbout-info">
            <span class="designation">{{$user->name}}</span>
        </div>
        <div class="tgAbout-social">
            <a href="#"><i class="fab flaticon-instagram"></i></a>
            <a href="#"><i class="fab fa-telegram-plane"></i></a>
            <a href="#"><i class="fab fa-vk"></i></a>
        </div>
    </div>
</div>
