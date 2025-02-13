@extends('login.base')

@section('title', 'CMI | Login')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form action="{{ route('login') }}" method="POST" class="login100-form validate-form">
            @csrf

            <span class="login100-form-title p-b-37">
                <img src="{{ URL::to('/public/admin') }}/assets/images/logo-cmi-kecil.png"alt="">
            </span>

            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                <input class="input100" type="text" name="email" placeholder="Email">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Sign In
                </button>
            </div>
            <div class="mt-3"></div>
            <div class="text-center">
                <!--<a href="{{ route('forget-password.getEmail') }}" class="txt2 hov1">-->
                <!--    Lupa Password?-->
                <!--</a></br>-->
                <!--<a href="{{ route('forget-password.getEmail') }}" class="txt2 hov1">-->
                <!--    Pertama kali login?-->
                <!--</a></br>-->
                <a href="{{ route('articles.index') }}" class="txt2 hov1">
                    Lihat Artikel
                </a>
            </div>
        </form>
    </div>
@endsection
