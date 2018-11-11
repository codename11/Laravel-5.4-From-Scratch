@extends("layouts.app1")
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
            Our Posts
          </h3>
          
          @if(count($posts) > 0)
          
            <ul class="list-group">
              @foreach($posts as $post)
              
              <li style="list-style-type: none;">

                <div class="blog-post">
                    <h2 class="blog-post-title"><a style="text-decoration: none;" href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="#">{{$post->id}}</a></p>
                    <p>{!!$post->body!!}</p>
                </div>

              </li>
              @endforeach
            </ul>
            
          @endif
          
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
      <div class="container">
        {{$posts->links()}}<!--Ovo je za paginaciju.-->
      </div>
    </main><!-- /.container -->
    
    @include("layouts.inc.footer")
  
@endsection