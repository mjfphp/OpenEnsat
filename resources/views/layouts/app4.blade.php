@extends('layouts.app3')

@section('nav')
      @yield('nav-child')
      <li class="has-dropdown">
        <a>Déconnexion</a>
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
              <a href="#">{{$categorie->name}}<span>({{$categorie->courses()->count()}})</span></a>
              @endforeach
						</div>
					</div>
					<!-- /Category -->

					<!-- Posts sidebar -->
					<div class="widget">
						<h3 class="title">Cours Populaires</h3>
            @yield('populare-cours')

					</div>
					<!-- /Posts sidebar -->

					<!-- Tags -->
					<div class="widget">
						<h3 class="title">Tags</h3>
						<div class="widget-tags">
							@yield('tags')
						</div>
					</div>
					<!-- /Tags -->

				</aside>
				<!-- /Aside -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
@endsection
