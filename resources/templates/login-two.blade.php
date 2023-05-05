@extends('layouts.authentication.master')
@section('title', 'Login-two')

@section('content')
<div class="container-fluid">
    <x-auth-session-status class="mb-4" :status="session('status')" />
   <div class="row">
      <div class="col-xl-5"><img class="bg-img bg-center" src="{{asset('assets/admin/images/login/login-bg-2.jpg')}}" alt="looginpage"></div>
      <div class="col-xl-7 p-0">
         <div class="login-card">
            <div>
               <div>
                   <a class="logo" href="{{route('main')}}">
                       <img class="img-fluid for-light w-50" src="{{asset('assets/front/img/logo/b_kinotalk.png')}}"
                            alt="looginpage">
                       <img class="img-fluid for-dark w-50" src="{{asset('assets/front/img/logo/w_kinotalk.png')}}"
                            alt="looginpage">
                   </a>
               </div>
               <div class="login-main">
                   <form class="theme-form" method="POST" action="{{ route('login') }}">
                       @csrf
                       <h4>Войти в аккаунт</h4>
                       <p>Введите адрес электронной почты и пароль для входа</p>
                       <div class="form-group">
                           <x-input-label for="email" :value="__('Email')" />
                           <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                           <x-input-error :messages="$errors->get('email')" class="mt-2" />
                       </div>
                       <div class="form-group">
                           <x-input-label for="password" :value="__('Пароль')" />

                           <x-text-input id="password" class="form-control"
                                         type="password"
                                         name="password"
                                         required autocomplete="current-password" />

                           <x-input-error :messages="$errors->get('password')" class="mt-2" />
                           <div class="show-hide"><span class="show"></span></div>
                       </div>
                       <div class="form-group mb-0">
                           <div class="checkbox p-0">
                               <input id="checkbox1" type="checkbox">
                               <label class="text-muted" for="checkbox1">Запомнить пароль</label>
                           </div>
                           <a class="link" href="{{ route('forget-password') }}">Забыли пароль?</a>
                           <button class="btn btn-primary btn-block" type="submit">Войти</button>
                       </div>
                       <h6 class="text-muted mt-4 or">Или через</h6>
                       <div class="social mt-4">
                           <div class="btn-showcase">
                               <a class="btn btn-light" href="#" target="_blank">
                                   <i class="fa fa-google" data-feather="google"></i>
                               </a>
                               <a class="btn btn-light" href="#" target="_blank">
                                   <i class="fa fa-vk" data-feather="vk"></i>
                               </a>
                               <a class="btn btn-light" href="#" target="_blank">
                                   <i class="fa fa-telegram" data-feather="telegram"></i>
                               </a>
                           </div>
                       </div>
                       <div class="mt-4 mb-0">
                           <p class="mt-4 mb-0">Ещё не зарегистрированы?<a class="ms-2" href="{{ route('register') }}">Зарегистрировать</a></p>
                       </div>
                   </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection
