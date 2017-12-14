@extends('layouts.app2')

    @section('title')
        Welcome-OpenEnsat
    @endsection

    @section('header')
        <div class="bg-img" style="background-image: url('img/background1.jpg');">
            <div class="overlay"></div>
        </div>
    @endsection



@section('w')
    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <!-- home content -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <img class="logo logo-middle" src="img/logo.png" alt="logo">
                        <h1 class="white-text title">OpenEnsat</h1>
                        <p class="white-text">Nous vous présentons tous les cours dont vous aurez besoin pour devenir compétent dans tous domaine.</br>Notre site vous permettra de maitriser les sujets proposés que vous avez suivis.</p>
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @if (Auth::check())
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <button class="white-btn"><a href="{{ url('/login') }}" class="a-login">Login</a></button>
                                    <button class="main-btn"><a href="{{ url('/register') }}" class="a-register">Register</a></button>
                                @endif
                            </div>
                        @endif
                        <!--<button class="white-btn">Get Started!</button>
                        <button class="main-btn">Learn more</button>-->
                    </div>
                </div>
                <!-- /home content -->

            </div>
        </div>
    </div>
@endsection