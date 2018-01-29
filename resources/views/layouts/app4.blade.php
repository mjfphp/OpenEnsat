@extends('layouts.app3')

@section('nav')
	<li><a href="/forums">Froums</a></li>
	<li><a href="/welcome">Welcome</a></li>
	<li class="has-dropdown">
        <a>{{Auth::user()->name}}</a>
        <ul class="dropdown">
          <li>
            <a
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
            >Déconnexion</a>
          </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
@endsection

@section('content')
<div id="blog" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				@yield('main-left')


				<!-- Aside -->
				<aside id="aside" class="col-md-3">

					<!-- Search -->
					<div class="widget">
						<div class="widget-search">
							<input class="search-input" type="text" placeholder="search">
							<button class="search-btn" type="button"><i class="fa fa-search"></i></button>
						</div>
					</div>
					<!-- /Search -->

					<!-- Category -->
					<div class="widget">
						<h3 class="title">Category</h3>
						<div class="widget-category">
              @foreach( $categories as $categorie)
              <a href="/category/{{$categorie->id}}">{{$categorie->name}}<span>({{$categorie->courses()->count()}})</span></a>
              @endforeach
						</div>
					</div>
					<!-- /Category -->

					<!-- Posts sidebar -->
					<div class="widget">
						<h3 class="title">Cours Populaires</h3>
            <div class="widget-category">
              @foreach($coursp as $cour)
              <a href="/course/{{($cour->id)}}">{{$cour->title}}</a>
              @endforeach
						</div>
					</div>
					<!-- /Posts sidebar -->


				</aside>
				<!-- /Aside -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
@endsection
