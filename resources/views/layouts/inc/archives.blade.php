<div class="p-3">
    <h4 class="font-italic">Archives</h4>
    @if(isset($archives) && count($archives)>0)
        <ol class="list-unstyled mb-0">
            @foreach($archives as $prop)
                <li>
                    <a href="/?month={{$prop['month']}}&year={{$prop['year']}}">{{$prop["month"]." ".$prop["year"]}}</a>
                </li>
            @endforeach  
        </ol>
    @endif
    <br>
    <h4 class="font-italic">Tags</h4>
    @if(isset($tags) && count($tags)>0)
        <ol class="list-unstyled mb-0">
            @foreach($tags as $tag)
                <li>
                <a href="/posts/tags/{{$tag}}">{{$tag}}</a>
                </li>
            @endforeach  
        </ol>
    @endif
</div>