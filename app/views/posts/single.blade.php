<article>
    <header>
        <h1>
            {{$post->title}}
        </h1>
        <div class="clearfix">
            <span class="left date">{{explode(' ',$post->created_at)[0]}}</span>
            <span class="right label">{{HTML::link('#reply','Reply',['style'=>'color:inherit'])}} </span>
        </div>
    </header>
    <div>
        <p>{{ $post->content }}</p>
    </div>
    <footer>
        <hr>
    </footer>
</article>
<section>
    @if(!$comments->isEmpty())
        <h2>Comments on {{$post->title}}</h2>
        <ul id="addComment">
            @foreach($comments as $comment)
                <li>
                    <article>
                        <header>
                            <div class="clearfix">
                                <span class="right date">{{explode(' ',$comment->created_at)[0]}}</span>
                                <span class="left">{{$comment->commenter}}</span>
                            </div>
                        </header>
                        <div>
                            <p>{{{$comment->comment}}}</p>
                        </div>
                        <footer>
                            <hr>
                        </footer>
                    </article>
                </li>
            @endforeach
        </ul>
    @else
        <h2>No Comments on {{$post->title}}</h2>
    @endif
    <!--comment form -->
    @include('comments.form')
</section>
