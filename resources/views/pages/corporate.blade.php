@extends('main')

@section('title', $title)

@section('content')

    @include('pages.partials.breadcrumb')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout th-bgpattrensection">

        <!--************************************
					Tab Start
			*************************************-->
        <section class="th-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="th-featuresarea">
                            <div style="float: left; margin: 0 30px 0 0; min-width: 33%; max-width: 370px;">
                                <ul class="th-featuresnav">
                                    @foreach($sidemenu as $slug => $title)
                                        <li @if($section == $slug)class="active" @endif>
                                            <a href="/{{ $page }}/{{ $slug }}">
                                                <span> {{ $title }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-content th-featurestabcontent"role="tabpanel" class="tab-pane active" id="{{ $content->key }}">
                                    <h2>{!! trans('app.'.$content->key.'Span') !!}</h2>
                                    {!! $content->body !!}

                                    <br>

                                    <div id="th-accordion" class="th-accordion">

                                        @switch($section)

                                            @case('internal-dealing')
                                            @if($subsection == 'id-procedura')
                                                @foreach($years as $year => $documents)
                                                    <table class="file-list">
                                                        @foreach($documents as $document)

                                                            <tr>
                                                                <td width="100px">
                                                                    <div class="file-pdf"><i class="fa fa-file-pdf-o fa-th-large"></i></div>
                                                                </td>
                                                                <td class="file-info"><span>{{ $document->getTranslatedAttribute('name') == '' ? $document->getTranslatedAttribute('name', 'it') : $document->getTranslatedAttribute('name') }}</span><br>
                                                                    {{ trans('app.'.$document->doc_type) }} - {{ \Carbon\Carbon::parse($document->date)->formatLocalized('%d/%m/%Y') }}</td>
                                                                <td width="150px">
                                                                    <a href="/storage/@if(App::getLocale() == 'en' and isset($document->file_en)){{ json_decode($document->file_en)[0]->download_link}}@else{{ json_decode($document->file_it)[0]->download_link}}@endif" target="_blank">
                                                                        <i class="fa fa-arrow-down"></i><br>
                                                                        {{ trans('app.downloadDoc') }}
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                    </table>
                                                @endforeach

                                            @else
                                                @foreach($months as $month => $documents)
                                                    <div class="th-panel">
                                                        <h4>{{ $month }}</h4>
                                                        <div class="th-panelcontent">
                                                            <div class="th-description">

                                                                <table class="file-list">
                                                                    @foreach($documents as $document)
                                                                        <tr>
                                                                            <td width="100px">
                                                                                <div class="file-pdf"><i class="fa fa-file-pdf-o fa-th-large"></i></div>
                                                                            </td>
                                                                            <td class="file-info"><span>{{ $document->getTranslatedAttribute('name') == '' ? $document->getTranslatedAttribute('name', 'it') : $document->getTranslatedAttribute('name') }}</span><br>
                                                                                {{ trans('app.'.$document->doc_type) }} - {{ \Carbon\Carbon::parse($document->date)->formatLocalized('%d/%m/%Y') }}</td>
                                                                            <td width="150px">
                                                                                <a href="/storage/@if(App::getLocale() == 'en' and isset($document->file_en)){{ json_decode($document->file_en)[0]->download_link}}@else{{ json_decode($document->file_it)[0]->download_link}}@endif" target="_blank">
                                                                                    <i class="fa fa-arrow-down"></i><br>
                                                                                    {{ trans('app.downloadDoc') }}
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @break

                                            @case('bilanci-relazioni')
                                            @case('comunicati-price-sensitive')
                                            @foreach($years as $year => $documents)
                                                <div class="th-panel">
                                                    <h4>{{ $year }}</h4>
                                                    <div class="th-panelcontent">
                                                        <div class="th-description">
                                                            <table class="file-list">
                                                                @foreach($documents as $document)
                                                                    <tr>
                                                                        <td width="100px">
                                                                            <div class="file-pdf"><i class="fa fa-file-pdf-o fa-th-large"></i></div>
                                                                        </td>
                                                                        <td class="file-info"><span>{{ $document->getTranslatedAttribute('name') == '' ? $document->getTranslatedAttribute('name', 'it') : $document->getTranslatedAttribute('name') }}</span><br>
                                                                            {{ trans('app.'.$document->doc_type) }} - {{ \Carbon\Carbon::parse($document->date)->formatLocalized('%d/%m/%Y') }}</td>
                                                                        <td width="150px">
                                                                            <a href="/storage/@if(App::getLocale() == 'en' and isset($document->file_en)){{ json_decode($document->file_en)[0]->download_link}}@else{{ json_decode($document->file_it)[0]->download_link}}@endif" target="_blank">
                                                                                <i class="fa fa-arrow-down"></i><br>
                                                                                {{ trans('app.downloadDoc') }}
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @break

                                            @default
                                            @foreach($years as $year => $documents)
                                                <table class="file-list">
                                                    @foreach($documents as $document)

                                                        <tr>
                                                            <td width="100px">
                                                                <div class="file-pdf"><i class="fa fa-file-pdf-o fa-th-large"></i></div>
                                                            </td>
                                                            <td class="file-info"><span>{{ $document->getTranslatedAttribute('name') == '' ? $document->getTranslatedAttribute('name', 'it') : $document->getTranslatedAttribute('name') }}</span><br>
                                                                {{ trans('app.'.$document->doc_type) }} - {{ \Carbon\Carbon::parse($document->date)->formatLocalized('%d/%m/%Y') }}</td>
                                                            <td width="150px">
                                                                <a href="/storage/@if(App::getLocale() == 'en' and isset($document->file_en)){{ json_decode($document->file_en)[0]->download_link}}@else{{ json_decode($document->file_it)[0]->download_link}}@endif" target="_blank">
                                                                    <i class="fa fa-arrow-down"></i><br>
                                                                    {{ trans('app.downloadDoc') }}
                                                                </a>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                </table>
                                            @endforeach

                                        @endswitch

                                    </div>

                                    @if ($events->count() > 0)

                                        <h3>{{ trans('app.nextEvent') }}</h3>

                                        <table style="margin-top: 20px;">
                                            <tr>
                                                <td style="border: none; vertical-align: middle;"><i class="fa fa-calendar" style="font-size: 60px; padding: 15px; color: #1d4b8f;"></i></td>
                                                <td style="border: none; text-align: left; padding: 0;"><h5 style="background-color: #1d4b8f; color: white; padding: 10px; text-transform: capitalize;">{{ \Carbon\Carbon::parse($events->first()->date)->formatLocalized('%A %d %B %Y') }}</h5>
                                                    <h6 style="padding: 0 10px; font-weight: bold;">{{ App::getLocale() == 'it' ? $events->first()->title_it : $events->first()->title_eng }}</h6>
                                                </td>
                                            </tr>
                                        </table>

                                        <hr>

                                        <h3>{{ trans('app.nextEvents') }}</h3>
                                        <br>

                                        <table class="file-list">
                                            @foreach($events as $event)
                                                @if ($loop->first)
                                                @else
                                                    <tr>
                                                        <td width="100px">
                                                            <div class="file-pdf" style="padding: 6px 0 4px;">
                                                                <span><b>{{ \Carbon\Carbon::parse($event->date)->formatLocalized('%d') }}</b><br>{{ \Carbon\Carbon::parse($event->date)->formatLocalized('%b') }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="file-info">{{ \Carbon\Carbon::parse($event->date)->formatLocalized('%d %B %Y') }}<br>
                                                            <b style="font-size: 16px;">{{ App::getLocale() == 'it' ? $event->title_it : $event->title_eng }}</b></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>

                                        {!! $events->links() !!}

                                        @if($section == 'eventi-finanziari')
                                            <div style="margin-top: 25px;"><p><i>{{ trans('app.eventi-finanziari-disc') }}</i></p></div>
                                        @endif

                                    @endif

                                    @if(isset($posts))

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

                                    @endif

                                    @if(isset($notizia))

                                        <article class="th-post th-postdetail">
                                            <figure class="th-postimg">
                                                <a href="#"><img src="{{ isset($notizia->image) ?  asset("storage/".$notizia->image) : "/images/post/img-09.jpg" }}" alt="image description"></a>
                                                <figcaption>
                                                    <ul class="th-postmate">
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-calendar"></i>
                                                                <span>{{ $notizia->updated_at->diffForHumans() }}</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-asterisk"></i>
                                                                <span>{{ $notizia->category->name }}</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-share"></i>
                                                                <span>Share </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-google-plus"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-linkedin"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                            <div class="th-postcontent">
                                                <div class="th-posttitel">
                                                    <h2>{{ $notizia->title }}</h2>
                                                </div>
                                                <div class="th-description">
                                                    {!! $notizia->body !!}
                                                </div>
                                            </div>
                                        </article>



                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($page == 'investor-relations')
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <hr>
                            {!! $investor->body !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!--************************************
                Tab End
        *************************************-->

    </main>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            {!! $disclaimer->body !!}
            <div class="row">
                <div class="button-container">
                    <button class="close btn" data-dismiss="modal">{{ trans('app.accept') }}</button>
                    <button class="btn" type="button" onclick="javascript:history.back()">{{ trans('app.decline') }}</button>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('styles')
    <style>
        .th-featuresnav span{
            text-transform:none;
        }
        .file-list {
            width: 100%;
            background: none;
            overflow: scroll;
        }
        .file-list tr {
            display: table;
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 1px solid lightgray;
            padding-bottom: 10px;
        }
        .file-list tr:hover {
            background-color: rgba(255, 255, 255, .5);
        }
        .file-list td {
            border: none;
            padding-bottom: 5px;
            line-height: 1.5;
        }
        .file-list .file-pdf {
            width: 72px;
            border-left: 10px #1a4a92 solid;
            margin-left: 10px;
        }
        .file-list .file-pdf span {
            font-size: 20px;
            line-height: 22px;
        }
        .file-list .file-pdf i {
            font-size: 40px;
            margin: 10px;
            color: #1a4a92;
        }
        .file-list .file-info {
            text-align: left;
        }
        .file-list .file-info span {
            font-weight: bold;
            font-size: 1.2em;
        }
        .file-list i.fa.fa-arrow-down {
            color: #1a4a92;
            border: 1px solid;
            border-radius: 20px;
            padding: 6px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 9999; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            max-width: 800px;
        }

        .modal-content h4 {
            text-align: center;
            text-decoration: underline;
            margin-bottom: 25px;
        }

        .modal-content p {
            text-align: justify;
        }

        .button-container {
            margin: 0 auto;
            display: table;
        }

        .modal-content button {
            -webkit-appearance: none;
            padding: 0;
            cursor: pointer;
            background: 0 0;
            border: 0;
            float: none;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: .2;
            margin-right: 20px;
        }
        .th-featuresnav li {
            line-height: 50px;
        }
        table.tabella2 {
            clear: both;
        }
        table.tabella2 tr td {
            padding: 5px 5px 5px 10px;
            height: 35px;
            line-height: 25px;
        }
        table.tabella2 td {
            vertical-align: top;
            text-align: left;
        }
        table.tabella2 tr th {
            width: 230px;
            padding: 5px 5px 5px 10px;
            height: 35px;
            line-height: 25px;
            color: #ffffff;
            background: #194992;
            font-weight: normal;
            text-align: left;
        }
        table.tabella2 tr th.mail{
            width: 55px;
        }
        table.tabella2 tr td span {
            font-size: 20px;
            padding-left: 7px;
        }
        table.tabella2 tr:nth-child(odd) {
            background-color: #e6e6e6 !important;
        }
        table.tabella2 tr:nth-child(even) {
            background-color: #ffffff !important;
        }
    </style>
@endsection

@section('scripts')

    <script>
        var pageURL = window.location.href;

        var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);

        $( document ).ready(function() {
            if (lastURLSegment === 'documentazione-ipo') {
                $('#myModal').modal('show');
            }
        });


    </script>

    @if ($section == 'titolo-borsa')
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.MediumWidget(
                {
                    "container_id": "tv-medium-widget",
                    "symbols": [
                        [
                            "Garofalo Health Care",
                            "MIL:GHC|1m"
                        ]
                    ],
                    "greyText": "Quotazioni da",
                    "gridLineColor": "#174c8f",
                    "fontColor": "#434d55",
                    "underLineColor": "rgba(23, 76, 143, 0.1)",
                    "trendLineColor": "#174c8f",
                    "width": "100%",
                    "height": "500px",
                    "locale": "{{ App::getLocale() }}"
                }
            );
        </script>
    @endif

@endsection
