<div class="widget sidebar-widget widget_categories">
    <h4 class="widget-title">Популярная категория</h4>
    <ul class="list-wrap glass-m-p">
        @foreach($categories as $key=>$category)
        <li>
            <div class="thumb">
                <a href="">
                    {{$category->getFirstMedia('thumb')}}

                </a>
            </div>
            <a href="{{route('articles.category') . '?page=' . $category->id}}">
                {{$category->name}}
            </a>
            <span class="float-right">{{$category->articles->count()}}</span>
        </li>
        @endforeach
    </ul>
</div>
