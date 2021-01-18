
@extends('main')

@section('title', trans('app.news'))

@section('content')

    @include('pages.partials.breadcrumb')

    <!--************************************
				Main Start
		*************************************-->
    <main id="th-main" class="th-main th-haslayout">
        <div class="container">
            <div class="row">
                <div id="th-twocolumns" class="th-twocolumns">
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div id="th-content" class="th-content">
                            <div  class="th-posts th-poststwo th-postslist">
                                @foreach($posts as $post)
                                <article class="th-post">
                                    <figure class="th-postimg">
                                        <a href="/news/{{ $post->category->slug }}/{{ $post->slug }}"><img src="@if(isset($post->image)) {{ asset("storage/".preg_replace('/(\.gif|\.jpg|\.png)/', '-news$1', $post->image)) }} @else images/post/img-16.jpg @endif" alt="image description"></a>
                                    </figure>
                                    <div class="th-postcontent">
                                        <ul class="th-postmate">
                                            <li>
                                                <a href="/news/{{ $post->category->slug }}/{{ $post->slug }}">
                                                    <i class="fa fa-calendar"></i>
                                                    <span>{{ $post->updated_at->diffForHumans() }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/news/{{ $post->category->slug }}">
                                                    <i class="fa fa-asterisk"></i>
                                                    <span>{{ $post->category->name }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="th-posttitel">
                                            <h3><a href="/news/{{ $post->category->slug }}/{{ $post->slug }}">{{ $post->title }}</a></h3>
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
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <aside id="th-sidebar" class="th-sidebar">
                            @include('pages.partials.category-sidebar')
                            <div class="th-widget th-widgetcontcatus">
                                <figure>
                                    <img src="/images/bgimg/img-02.jpg" alt="image description">
                                    <figcaption>
                                        <h3>Any
                                            <span>Emergency?</span>
                                        </h3>
                                        <a class="th-btn" href="#">Contact Us</a>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="th-widget th-widgetinstagram">
                                <div class="th-widgettitle">
										<span class="th-widgeticon">
											<i><img src="/images/icon/img-27.png" alt="image description"></i>
										</span>
                                    <h3>Instagram</h3>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-07.jpg" alt="image description">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-08.jpg" alt="image description">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-09.jpg" alt="image description">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-10.jpg" alt="image description">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-11.jpg" alt="image description">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-12.jpg" alt="image description">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-13.jpg" alt="image description">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-14.jpg" alt="image description">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/images/instagram/img-15.jpg" alt="image description">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection