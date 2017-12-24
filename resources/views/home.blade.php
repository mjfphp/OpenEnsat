@extends('layouts.app4')

@section('nav-child')
<li>
  <a href="#">hey</a>
</li>
@endsection

@section('main-left')
<main class="col-md-9">
    @foreach( $cours as $cour)

        <div class="row">
          <div class="col-md-4 col-xs-6 work">
              <img class="img-responsive" src="/storage/app/public/{{$cour->image}}" alt="{{$cour->title}}" />
              <div class="overlay"></div>
              <div class="work-content">
                  <span><h3>{{ $cour->title }}</h3></span>
                  <div class="work-link">
                      <a href="#"><i class="fa fa-external-link"></i></a>
                      <a class="lightbox" href='{{ $cour->image }}'><i class="fa fa-search"></i></a>
                  </div>
              </div>
          </div>
        </div>

    @endforeach
    </main>
@endsection


@section('tags')

 <a href="#">Web Tag</a>

@endsection
