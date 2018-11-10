<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex">
        <a class="p-2 text-muted" href="/">Home</a>
        @if(!Auth::guest())
            <a class="p-2 text-muted" href="/posts/create">Create Posts</a>
        @endif
    </nav>
</div>

    