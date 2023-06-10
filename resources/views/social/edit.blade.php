
<form method="post" action="{{route('social_link.update', $link->id)}}" class="row g-3">
@csrf
<!-- Form Group (Social type)-->
    <div class="row gx-3 mb-3">

    <div class="col-auto col-md-6 mb-3 ">
        <label for="small mb-1" class="small mb-1 card-header__font3">Категория соц-сети</label>
        <select name="social_type" id="social_type" class="form-select__inp2  card-header__inp3 form-control  @error('social_type') border-red-500 @enderror"
                aria-label=".form-select-sm example">
            <option selected>{{$link->socialType->name}}</option>
            @foreach($socialTypes as $key=>$type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
        @error('social_type')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <!-- Form Group (Social link)-->
    <div class="col-auto col-md-6 mb-3 ">
        <label class="small mb-1" for="small mb-1 card-header__font3">Ссылка на страницу</label>
        <input name="social_link" class="form-select__inp2  card-header__inp3 form-control @error('social_link') border-red-500 @enderror" id="social_link"
               type="text" value="{{$link->link}}">
        @error('social_link')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <!-- Save changes button-->
    <div class="block-btn_pr__w3">
        <button class="btn btn-primary btn btn__b3" type="submit">Обновить</button>
    </div>
    </div>
</form>

