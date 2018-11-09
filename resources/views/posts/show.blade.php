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
                    <div class="blog-post">
                        <h2 class="blog-post-title"><a style="text-decoration: none;" href="#">{{$post->title}}</a></h2>
                        <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="posts/{{$post->id}}">{{$post->id}}</a></p>
                        <p>{!!$post->body!!}</p>
                    </div>
                @endif
            </div>
            <a href="/" class="btn btn-success">Back</a>

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