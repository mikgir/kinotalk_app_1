
    <form method="post" action="{{route('profile.update', $profile->id)}}">
        @csrf
        @method('PATCH')

        <div class="row gx-3 mb-3">
            <!-- Form Group (first name)-->
            <div class="col-md-6 mb-3 ">
                <label class="small mb-1" for="inputFirstName">Имя</label>
                <input name="first_name" class="form-control card-header__inp3 @error('first_name') border-red-500 @enderror"
                       id="inputFirstName" type="text" value="{{$profile->first_name}}">
                @error('first_name')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (last name)-->
            <div class="col-md-6 mb-3">
                <label class="small mb-1" for="inputLastName">Фамилия</label>
                <input name="last_name" class="form-control @error('last_name') border-red-500 @enderror" id="inputLastName" type="text" value="{{$profile->last_name}}">
                @error('last_name')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>
        <!-- Form Row        -->
        <div class="row gx-3 mb-3">
            <!-- Form Group (organization name)-->
            <div class="col-md-6 mb-3">
                <label class="small mb-1" for="occupation">Род занятий</label>
                <input name="occupation" class="form-control @error('occupation') border-red-500 @enderror" id="occupation" type="text" value="{{$profile->occupation}}">
                @error('occupation')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (company)-->
            <div class="col-md-6 mb-3">
                <label class="small mb-1" for="company">Организация</label>
                <input name="company" class="form-control @error('company') border-red-500 @enderror" id="company" type="text" value="{{$profile->company}}">
                @error('company')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (location)-->
            <div class="col-md-6 mb-3">
                <label class="small mb-1" for="city">Город</label>
                <input name="city" class="form-control @error('city') border-red-500 @enderror" id="city" type="text" value="{{$profile->city}}">
                @error('city')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (email address)-->
            <div class="col-md-6 mb-3">
                <label class="small mb-1" for="country">Страна</label>
                <input name="country" class="form-control @error('country') border-red-500 @enderror" id="country" type="text" value="{{$profile->country}}">
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
{{--                <input name="website" class="form-control @error('website') border-red-500 @enderror" id="website" type="text" value="{{$profile->website}}">--}}
{{--                @error('website')--}}
{{--                <p class="text-red-500">{{$message}}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            <!-- Form Group (birthday)-->--}}
{{--            <div class="col-md-6 mb-3">--}}
{{--                <label class="small mb-1" for="inputBirthday">Дата рождения</label>--}}
{{--                <input class="form-control @error('birthday') border-red-500 @enderror" id="inputBirthday" type="date" name="birthday" value="{{$profile->birthday}}">--}}
{{--                @error('birthday')--}}
{{--                <p class="text-red-500">{{$message}}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}
            <!-- Form Group (about_me)-->
            <div class="col-md-6 mb-3">
                <label class="small mb-1" for="about_me">Обо мне</label>
                <textarea class="form-control @error('about_me') border-red-500 @enderror" id="about_me" type="text" name="about_me">{{$profile->about_me}}</textarea>
                @error('about_me')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <!-- Form Group (bio)-->
            <div class="col-md-6 mb-3">
                <label class="small mb-1" for="bio">Биография</label>
                <textarea class="form-control @error('bio') border-red-500 @enderror" id="bio" type="text" name="bio">{{$profile->bio}}</textarea>
                @error('bio')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
        </div>
        <!-- Save changes button-->
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </form>

