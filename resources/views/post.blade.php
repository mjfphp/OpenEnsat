@extends('layouts.app4')

    @section('main-left')
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
                <p>{!! $post->body !!}</p>
            </div>

            <!-- blog tags -->
            <div class="blog-tags">
                <h5>Tags :</h5>
                @foreach(explode(",",$post->meta_keywords) as $meta_keyword)
                <a href="#"><i class="fa fa-tag"></i>{{$meta_keyword}}</a>
                @endforeach
            </div>
            <!-- blog tags -->


            <!-- blog comments -->
            <div class="blog-comments">
                <h3 class="title">{{"(".$commentsNumber.")"}} Comments</h3>

                <!-- comment -->
                @foreach( $comments as $comment)
                  <div class="media">
                      <div class="media-left">

                          <img class="media-object"  style="max-width: 40px;max-height: 40px"
                               src="/storage/app/public/{{$comment->user()->avatar}}" >
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
                    <input class="input" type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <textarea placeholder="Add Your Commment" name="text" ></textarea>
                    <button type="submit" class="main-btn submitBtn">Submit</button>
                </form>
            </div>
            <!-- /reply form -->
        </div>
    </main>
    <!-- /Main -->
    @endsection

    @section('js')
      <script>
      $(document).ready(function(){
              $('.submitBtn').on('click',function(){
                var post_id = $('#form').attr("data-id");
                var action = $('#form').attr("data-info");
                $('#form').attr('action',action+post_id);
              })
      })
      </script>
    @endsection
