<div class="header__top-search">
    <div class="input-group rounded">
        <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </span>
        <input wire:model.debounce.250ms="search" type="search" class="form-control rounded"
               placeholder="Статьи, новости..." aria-label="Search" aria-describedby="search-addon"/>
    </div>
    <div class="list-group position-absolute z-50">
        @if(mb_strlen($search) > 2)
            @forelse($searchResults as $result)
                <a href="{{route($result->type.'.show', $result->id)}}"
                   class="list-group-item list-group-item-action"
                   target="_blank" style="z-index: 2;">{{ $result->name }}: {{ $result->title }}</a>
            @empty
                <p>Ничего не найдено для "{{ $search }}"</p>
            @endforelse
        @endif
    </div>
</div>
