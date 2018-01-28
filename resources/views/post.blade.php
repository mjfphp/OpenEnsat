@extends('layouts.app4')

@section('main-left')
    <div id="blog" class="section md-padding">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Main -->
                <main id="main" class="col-md-9">
                    <div class="blog">
                        <div class="blog-img">
                            <img src="/storage/app/public/{{$post->image}}"/> <br>

                        </div>
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i>{{$postOwner->name}}</li>
                                <li><i class="fa fa-clock-o"></i>{{date("d M",strtotime($post->created_at))}}</li>
                                <li><i class="fa fa-comments"></i>{{$commentsNumber}}</li>
                            </ul>
                            <h3>{{$post->excerpt}}</h3>
                            <p>{{$post->body}}</p>
                        </div>

                        <!-- blog tags -->
                        <div class="blog-tags">
                            <h5>Tags :</h5>
                            @foreach(explode(",",$post->meta_keywords) as $meta_keyword)
                            <a href="#"><i class="fa fa-tag"></i>{{$meta_keyword}}</a>
                            @endforeach
                        </div>
                        <!-- blog tags -->

                        <!-- blog author -->
                        <div class="blog-author">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="./img/author.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h3>Joe Doe</h3>
                                        <div class="author-social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /blog author -->

                        <!-- blog comments -->
                        <div class="blog-comments">
                            <h3 class="title">{{"(".$commentsNumber.")"}} Comments</h3>

                            <!-- comment -->
                            @foreach( $comments as $comment)
                              <div class="media">
                                  <div class="media-left">
                                      <img class="media-object" src="./img/perso2.jpg" alt="">
                                  </div>
                                  <div class="media-body">
                                      <h4 class="media-heading">{{$comment->user()->name}}<span class="time">{{\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans()}}
                                    <!--  </span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4> -->
                                      <p>{{$comment->comment}}</p>
                                  </div>
                              </div>
                            @endforeach
                            <!-- /comment -->


                        </div>
                        <!-- /blog comments -->

                        <!-- reply form -->
                        <div class="reply-form">
                            <h3 class="title">Leave a reply</h3>
                            <form class='formCom' id="form" method="POST" data-id="{{ $post->id }}" data-info="/post/">
                                {{ csrf_field()}}
                                <input class="input" type="hidden" name="user_id" value="{{$postOwner->id}}">
                                <input class="input" type="hidden" name="user_id" value="{{$postOwner->id}}">
                                <textarea placeholder="Add Your Commment" name="text" ></textarea>
                                <button type="submit" class="main-btn submitBtn">Submit</button>
                            </form>
                        </div>
                        <!-- /reply form -->
                    </div>
                </main>
                <!-- /Main -->


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
                          <a href="/category/{{($categorie->id)}}">{{$categorie->name}}<span>({{$categorie->courses()->count()}})</span></a>
                          @endforeach
                        </div>
                    </div>
                    <!-- /Category -->

                    <!-- Posts sidebar -->
                    <div class="widget">
                        <h3 class="title">Populare Posts</h3>

                        <!-- single post -->
                        <div class="widget-post">
                            <a href="#">
                                <img src="./img/post1.jpg" alt=""> Blog title goes here
                            </a>
                            <ul class="blog-meta">
                                <li>Oct 18, 2017</li>
                            </ul>
                        </div>
                        <!-- /single post -->

                        <!-- single post -->
                        <div class="widget-post">
                            <a href="#">
                                <img src="./img/post2.jpg" alt=""> Blog title goes here
                            </a>
                            <ul class="blog-meta">
                                <li>Oct 18, 2017</li>
                            </ul>
                        </div>

                        <div class="widget-post">
                            <a href="#">
                                <img src="./img/post2.jpg" alt=""> Blog title goes here
                            </a>
                            <ul class="blog-meta">
                                <li>Oct 18, 2017</li>
                            </ul>
                        </div>


                        <div class="widget-post">
                            <a href="#">
                                <img src="./img/post2.jpg" alt=""> Blog title goes here
                            </a>
                            <ul class="blog-meta">
                                <li>Oct 18, 2017</li>
                            </ul>
                        </div>
                        <!-- /single post -->


                        <!-- single post -->
                        <div class="widget-post">
                            <a href="#">
                                <img src="./img/post3.jpg" alt=""> Blog title goes here
                            </a>
                            <ul class="blog-meta">
                                <li>Oct 18, 2017</li>
                            </ul>
                        </div>
                        <!-- /single post -->

                    </div>
                    <!-- /Posts sidebar -->

                    <!-- Tags -->
                    <div class="widget">
                        <h3 class="title">Tags</h3>
                        <div class="widget-tags">
                            <a href="#">Web</a>
                            <a href="#">Design</a>
                            <a href="#">Graphic</a>
                            <a href="#">Marketing</a>
                            <a href="#">Development</a>
                            <a href="#">Branding</a>
                            <a href="#">Photography</a>
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

    @section('js')
      $(document).ready(function(){
              $('.submitBtn').on('click',function(){
                var post_id = $('#form').attr("data-id");
                var action = $('#form').attr("data-info");
                $('#form').attr('action',action+post_id);
              })
      })
    @endsection
