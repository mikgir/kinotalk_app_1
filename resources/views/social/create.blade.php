<form method="post" action="{{route('social_link.store')}}" class="row g-3 justify-content-between">
@csrf
<!-- Form Group (Social type)-->
    <div class="col-auto">
        <label for="social_type" class="card-header__font3">Категория соц-сети</label>
        <select name="social_type" id="social_type" class="card-header__inp3 form-select__sel3 form-select form-select-sm mb-3 @error('social_type') border-red-500 @enderror"
                aria-label=".form-select-sm example">
            <option selected>Выберете категорию</option>
            @foreach($socialTypes as $key=>$type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
        @error('social_type')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <!-- Form Group (Social link)-->
    <div class="col-auto">
        <label class="small mb-1" for="card-header__font3">Ссылка на страницу</label>
        <input name="social_link" class="card-header__inp3 form-select__sel3 form-select__inp2 form-select-sm form-control  @error('social_link') border-red-500 @enderror"
               id="social_link" type="text" placeholder="Добавьте ссылку на страницу" value="">
        @error('social_link')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <!-- Save changes button-->
    <div class="block-btn__pr">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>

</form>
