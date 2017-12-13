@extends('layouts.app2')

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
                        <h1 class="white-text">We Are Creative Agency</h1>
                        <p class="white-text">Morbi mattis felis at nunc. Duis viverra diam non justo. In nisl. Nullam sit amet magna in magna gravida vehicula. Mauris tincidunt sem sed arcu. Nunc posuere.
                        </p>
                        <button class="white-btn">Get Started!</button>
                        <button class="main-btn">Learn more</button>
                    </div>
                </div>
                <!-- /home content -->

            </div>
        </div>
    </div>
@endsection

