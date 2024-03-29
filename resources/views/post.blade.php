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
                          <h4 class="media-heading">{{$comment->user()->name}}
                            <span class="time">{{\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans()}}</span>
                          @if(Auth::user()->id == $comment->user()->id)
                                  <form class='formCom' method="POST">
                                      {{ csrf_field()}}
                                      <input type="hidden" name="_method" value="DELETE" class="method">
                                      <input type='hidden' name="text" id='text'>
                                      <a href="#" class="reply edit" data-id="{{ $comment->id }}" data-info="/post/{{$post->id}}/"><i class="fa fa-pencil fa-lg"></i></a>
                                      <a href="#" class="reply delete" data-id="{{ $comment->id }}" data-info="/post/{{$post->id}}/"><i class="fa fa-trash fa-lg"></i></a>
                                  </form>
                              @endif
                          </h4>
                          <p>{{$comment->comment}}</p>
                          <div class="editComment">
                            <textarea class="commentText"></textarea>
                            <button type="button" id="submitEdit" class="main-btn">Submit</button>
                            <button type="button" id="annulerEdit" class="main-btn grey">Annuler</button>
                          </div>
                      </div>
                  </div>
                @endforeach
                <!-- /comment -->


            </div>
            <!-- /blog comments -->

            <!-- reply form -->
            <div class="reply-form">
                <h3 class="title">Leave a reply</h3>
                <form  id="form" method="POST" data-id="{{ $post->id }}" data-info="/post/">
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
      <script src="{{asset('js/comment.js')}}"></script>
    @endsection
