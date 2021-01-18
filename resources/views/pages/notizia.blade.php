
@extends('main')

@section('title', 'Flash News')

@section('content')

    @include('pages.partials.breadcrumb')

    <!--************************************
				Main Start
		*************************************-->
    <main id="th-main" class="th-main th-haslayout">
        <div class="container">
            <div class="row">
                <div id="th-twocolumns" class="th-twocolumns">
                    <div class="col-md-7 col-xs-12">
                        <div id="th-content" class="th-content">
                            <article class="th-post th-postdetail">
                                <div class="th-postcontent">
                                    <div class="th-posttitel">
                                        <h1>{{ $post->title }}</h1>
                                    </div>
                                    <div class="th-description">
                                        {!! $post->body !!}
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <aside id="th-sidebar" class="th-sidebar">
                            <div class="th-widget th-widgetcategories th-widgetcount th-leficon">
                                <div class="th-widgettitle">
                                    <span class="th-widgeticon">
                                        <i><img src="/images/icon/img-26.png" alt="image description"></i>
                                    </span>
                                    <h3>Flash News</h3>
                                </div>
                                <ul>
                                    @foreach($posts as $news)
                                        <li>
                                            <a href="/flash-news/{{ $news->slug }}">
                                                <span>{{ $news->title }}</span>
                                            </a>
                                        </li>
                                    @endforeach
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