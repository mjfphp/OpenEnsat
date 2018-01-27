@extends('layouts.app4')

@section('main-left')
    <main class="col-md-9">
        <div class="section-header text-center">
            <h2 class="title">{{$cour->title}}</h2>
        </div>

        <div class="row">

            <!-- Section header -->

            <!-- /Section header -->

            <!-- blog -->
            @if($cour->posts())
                @foreach($cour->posts() as $p)
            <div class="col-md-4">
                <div class="blog">
                    <div class="blog-img">
                        <img class="img-responsive" src="/storage/app/public/{{$p->image}}\" alt="{{$p->title}}">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user"></i>Jamai Mohamed</li>
                            <li><i class="fa fa-clock-o"></i>{{$p->created_at}}</li>
                        </ul>
                        <h3>{{$p->title}}</h3>
                        <p>{{$p->excerpt}}</p>
                        <a href="/post/{{$p->id}}">Read more</a>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
            <!-- /blog -->





        </div>
    </main>
    @endsection