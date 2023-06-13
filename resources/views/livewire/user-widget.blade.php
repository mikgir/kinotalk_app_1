<div class="widget sidebar-widget">
    <div class="tgAbout-me">
        <div class="tgAbout-thumb">
            {{ $user->getFirstMedia('avatars') }}
        </div>
        <div class="tgAbout-info">
            <span class="designation">{{$user->name}}</span>
        </div>
        <div class="tgAbout-info">
            @if($user->profile)
                <span class="designation text-black">{{$user->profile->about_me}}</span>
            @endif
        </div>
        <div class="tgAbout-social">
            @foreach($user->socialLinks as $key=>$socialLink)
                <a href="{{$socialLink->link}}" target="_blank"><i class="fab fa-{{$socialLink->socialType->icon_name}}"></i></a>
            @endforeach
        </div>
    </div>
</div>
