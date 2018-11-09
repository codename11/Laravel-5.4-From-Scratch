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
            Create a Post
          </h3>

          <form method="POST" action="/posts">
            {{ csrf_field() }} 
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
              </div>

              <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control" placeholder="Enter body" required></textarea>
              </div>

              <button type="submit" class="btn btn-default">Publish</button>
            </form>
          
            <!--Provera za greske.-->
            @if(count($errors)>0)
              <div class="alert alert-danger" style="margin-top: 10px;">

                <ul class="list-group">
                  @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                  @endforeach
                </ul>

              </div>
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

    </main><!-- /.container -->

    @include("layouts.inc.footer")
  
@endsection