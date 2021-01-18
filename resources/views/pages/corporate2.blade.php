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

                            @include('pages.partials.corporate-sidebar')

                            <div class="tab-content th-featurestabcontent"role="tabpanel" class="tab-pane active">

                                @switch($section)
                                    @case('documenti-societari')
                                    @case('struttura-governo')
                                    @case('procedure-regolamenti')
                                    @include('pages.partials.corporate-multi')
                                    @break

                                    @default
                                    @include('pages.partials.corporate-single')

                                @endswitch

                                @if ($events->count() > 0)
                                     @include('pages.partials.corporate-event')
                                @endif

                                @if(isset($posts))
                                    @include('pages.partials.corporate-post')
                                @endif

                                @if(isset($notizia))
                                    @include('pages.partials.corporate-notizia')
                                @endif

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

    @if ($section == 'documentazione-ipo')
        <script>
            $( document ).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
    @endif

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
