@extends("layouts.app1")
<!--http://blog.test/posts/1-->

    @section("content")

    <div class="container">
        @include("layouts.inc.header")

        @include("layouts.inc.navbar")

      <?php //   @include("layouts.inc.jumbo") ?>

        <?php //   @include("layouts.inc.cards") ?>
      
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            {!!$post->body!!}
          </h3>

          <div class="text-center alert alert-info">
                @if($post)
                  <!--Post-->
                    <div class="blog-post">
                        <h2 class="blog-post-title"><a style="text-decoration: none;" href="#">{{$post->title}}</a></h2>
                        <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="#">{{$post->id}}</a></p>
                        <p>{!!$post->body!!}</p>
                    </div>

                @endif
            </div>
            <hr>
            <!--Komentari na post.-->
            @if(count($post->comments)>0)
            <ul class="list-group">
              @foreach($post->comments as $comment)
                <li class="list-group-item">
                  <strong>{{$comment->created_at->diffForHumans()}}: </strong>
                  {{$comment->body}}
                </li>
              @endforeach
            </ul>
            <hr>
            @endif

            <!--Provera za greske pri unosenju komentara(dole).-->
            @if(count($errors)>0)
            <div class="alert alert-danger" style="margin-top: 10px;">

                <ul class="list-group">
                  @foreach($errors->all() as $error)
                    <li style="list-style-type: none;">
                        {{$error}}
                    </li>
                  @endforeach
                </ul>

              </div>
            @endif

            <!--Forma za dodavanje komentara-->
            @if(!Auth::guest())
              <form method="POST" action="/posts/{{$post->id}}/comments" style="margin-bottom: 10px;">
                  {{ csrf_field() }} 
                  <div class="form-group">
                    <label for="comment">Your comment:</label>
                    <textarea type="text" class="form-control" name="body" id="body" placeholder="Enter a comment" required></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                  </div>
              </form>
              @endif
              
            <a href="/" class="btn btn-success" style="margin:10px;">Back</a>

          <?php // @include("layouts.inc.blogpost3") ?>

          <?php // @include("layouts.inc.blogpost2") ?>

          <?php // @include("layouts.inc.blogpost1") ?>

          <?php // @include("layouts.inc.pag") ?>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          
            @include("layouts.inc.aboutinc")

            @include("layouts.inc.archives")

            @include("layouts.inc.social")
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

    @include("layouts.inc.footer")
  
@endsection