<x-app-layout>

    <main class="mb-5">
        <h3 class="text-center m-5">Профиль пользователя</h3>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-3">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Аккаунт</div>
                        <div class="w-100">
                            {{ Auth::user()->getFirstMedia('avatars') }}
                            <div class="col">
                                <div class="">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Личная информация</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Group (username)-->
{{--                                <div class="mb-3">--}}
{{--                                    <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>--}}
{{--                                    <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username">--}}
{{--                                </div>--}}
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="inputFirstName">Имя</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="inputLastName">Фамилия</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="occupation">Род занятий</label>
                                        <input class="form-control" id="occupation" type="text" placeholder="Enter your occupation" value="">
                                    </div>
                                    <!-- Form Group (company)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="company">Организация</label>
                                        <input class="form-control" id="company" type="text" placeholder="Enter your organization name" value="">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="city">Город</label>
                                        <input class="form-control" id="city" type="text" placeholder="Enter your city" value="">
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="country">Страна</label>
                                        <input class="form-control" id="country" type="text" placeholder="Enter your country" value="">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="website">Phone number</label>
                                        <input class="form-control" id="website" type="text" placeholder="Enter your website" value="">
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="inputBirthday">Дата рождения</label>
                                        <input class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                    </div>
                                    <!-- Form Group (about_me)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="about_me">Обо мне</label>
                                        <textarea class="form-control" id="about_me" type="text" name="about_me" placeholder="Enter information about you"></textarea>
                                    </div>
                                    <!-- Form Group (bio)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="bio">Биография</label>
                                        <textarea class="form-control" id="bio" type="text" name="bio" placeholder="Enter biography"></textarea>
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="button">Сохранить</button>
                            </form>
                        </div>
                    </div>
                    @hasrole('author')
                    <div class="card mb-4">
                        <div class="card-header flex-nowrap">
                            <span>Статьи</span>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">Написать статью</a>
                            <hr>
                            <span>Список статей</span>
                            <div class="table-responsive-md table-hover">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Категория</th>
                                        <th scope="col">Наименование</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col">Активность</th>
                                        <th scope="col">Дата написания</th>
                                        <th scope="col">Дата изменения</th>
                                        <th scope="col">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Auth::user()->articles as $key=>$article)
                                    <tr>
                                        <th scope="row">{{$article->id}}</th>
                                        <td>{{$article->category->name}}</td>
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->status}}</td>
                                        <td>{{$article->active}}</td>
                                        <td>{{$article->created_at}}</td>
                                        <td>{{$article->updated_at}}</td>
                                        <td>
                                            <a href="#" class="btn-outline-primary">Редактировать</a>
                                            <a href="#" class="btn-outline-success">Опубликовать</a>
                                            <a href="#" class="btn-outline-danger">Удалить</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="card mb-4">
                            <div class="card-header flex-nowrap">
                                <span>Стать автором</span>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary">Подать заявку</a>

                            </div>
                        </div>
                    @endhasrole

                </div>
            </div>
        </div>

    </main>
</x-app-layout>
