
    <form method="POST" action="{{route('profile.store', auth()->id())}}">
        @csrf

        <div class="row gx-3 mb-3">
            <!-- Form Group (first name)-->
            <div class="col-md-6 mb-3 card-header__wp6">
                <label class="small mb-1 small__lab2" for="inputFirstName">Имя</label>
                <input name="first_name" class="form-select__inp2  card-header__inp3 form-control @error('first_name') border-red-500 @enderror"
                       id="inputFirstName" type="text"  placeholder="Введите свое имя" value="">
                @error('first_name')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (last name)-->
            <div class="col-md-6 mb-3 card-header__wp6">
                <label class="small mb-1" for="inputLastName">Фамилия</label>
                <input name="last_name" class="card-header__inp3 form-select__inp2 form-control @error('last_name') border-red-500 @enderror" id="inputLastName"
                       type="text" placeholder="Введите вашу фамилию" value="">
                @error('last_name')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>
        <!-- Form Row        -->
        <div class="row gx-3 mb-3">
            <!-- Form Group (organization name)-->
            <div class="col-md-6 mb-3 card-header__wp6">
                <label class="small mb-1" for="occupation">Род занятий</label>
                <input name="occupation" class="card-header__inp3 form-select__inp2 form-control @error('occupation') border-red-500 @enderror" id="occupation" type="text"
                       placeholder="Введите ваш род занятий" value="">
                @error('occupation')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (company)-->
            <div class="col-md-6 mb-3 card-header__wp6">
                <label class="small mb-1" for="company">Организация</label>
                <input name="company" class="card-header__inp3 form-select__inp2 form-control @error('company') border-red-500 @enderror" id="company" type="text"
                       placeholder="Введите название вашей организации" value="">
                @error('company')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (location)-->
            <div class="col-md-6 mb-3 card-header__wp6">
                <label class="small mb-1" for="city">Город</label>
                <input name="city" class="card-header__inp3 form-select__inp2 form-control @error('city') border-red-500 @enderror" id="city" type="text"
                       placeholder="Введите свой город" value="">
                @error('city')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (email address)-->
            <div class="col-md-6 mb-3 card-header__wp6">
                <label class="small mb-1" for="country">Страна</label>
                <input name="country" class="card-header__inp3 form-select__inp2 form-control @error('country') border-red-500 @enderror" id="country" type="text"
                       placeholder="Введите свою страну" value="">
                @error('country')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>
        <!-- Form Row-->
        <div class="row gx-3 mb-3">
            <!-- Form Group (phone number)-->
{{--            <div class="col-md-6 mb-3">--}}
{{--                <label class="small mb-1" for="website">Phone number</label>--}}
{{--                <input name="website" class="form-control @error('website') border-red-500 @enderror" id="website" type="text" placeholder="Enter your website" value="">--}}
{{--                @error('website')--}}
{{--                <p class="text-red-500">{{$message}}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            <!-- Form Group (birthday)-->--}}
{{--            <div class="col-md-6 mb-3">--}}
{{--                <label class="small mb-1" for="inputBirthday">Дата рождения</label>--}}
{{--                <input class="form-control @error('birthday') border-red-500 @enderror" id="inputBirthday" type="date" name="birthday" placeholder="Enter your birthday" value="06/10/1988">--}}
{{--                @error('birthday')--}}
{{--                <p class="text-red-500">{{$message}}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}
            <!-- Form Group (about_me)-->
            <div class="col-md-6 mb-3 card-header__wp6">
                <label class="small mb-1" for="about_me">Обо мне</label>
                <textarea class="card-header__inp3 form-select__inp2 form-control @error('about_me') border-red-500 @enderror" id="about_me" type="text" name="about_me"
                          placeholder="Напишите информацию о себе "></textarea>
                @error('about_me')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (bio)-->
            <div class="col-md-6 mb-3 card-header__wp6">
                <label class="small mb-1" for="bio">Биография</label>
                <textarea class="card-header__inp3 form-select__inp2 form-control @error('bio') border-red-500 @enderror" id="bio" type="text" name="bio"
                          placeholder="Напишите свою биографию"></textarea>
                @error('bio')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>
        <!-- Save changes button-->
        <div class="block-btn__pr">
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </div>

    </form>



