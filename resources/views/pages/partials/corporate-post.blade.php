<div id="th-content" class="th-content">
    <div  class="th-posts th-poststwo th-postslist">
        @foreach($posts as $post)
            <article class="th-post">
                <figure class="th-postimg">
                    <a href="/{{$page}}/{{ $section }}/{{ $post->slug }}"><img src="@if(isset($post->image)) {{ asset("storage/".preg_replace('/(\.gif|\.jpg|\.png)/', '-news$1', $post->image)) }} @else images/post/img-16.jpg @endif" alt="image description"></a>
                </figure>
                <div class="th-postcontent">
                    <ul class="th-postmate">
                        <li>
                            <a href="/{{$page}}/{{ $section }}/{{ $post->slug }}">
                                <i class="fa fa-calendar"></i>
                                <span>{{ $post->updated_at->diffForHumans() }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="/{{$page}}/{{ $section }}">
                                <i class="fa fa-asterisk"></i>
                                <span>{{ $post->category->name }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="th-posttitel">
                        <h3><a href="/{{$page}}/{{ $section }}/{{ $post->slug }}">{{ $post->title }}</a></h3>
                    </div>
                    <div class="th-description">
                        <p>{{ $post->excerpt }}</p>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</div>
{!! $posts->links() !!}