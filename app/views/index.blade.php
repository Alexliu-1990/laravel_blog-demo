@if(empty($notFound))
@foreach($posts as $post)
<article>
<h3>{{link_to_route('post.show', $post->title, $post->id)}}</h3>
<h6>Written by <a href="{{URL::to('/')}}">Alex Liu</a> on {{explode(' ', $post->created_at)[0]}}</h6>
<div class="row">
<p>{{$post->read_more . ' ...'}}</p>
</div>
<div class="clearfix">
<span class="right label">{{$post->comment_count}} comments</span>
</div>
</article>
<hr/>
@endforeach
<div class="pagination">
{{$posts->links()}}
</div>
@else
<p>Nothing match!</p>
@endif
