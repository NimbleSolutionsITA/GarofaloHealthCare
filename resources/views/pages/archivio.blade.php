@extends('main')

@section('title', $content->title)

@section('content')

    @include('pages.partials.breadcrumb')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout th-bgpattrensection">

        <!--************************************
					Tab Startr
			*************************************-->
        <section class="th-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="th-featuresarea">
                            <div id="th-accordion" class="th-accordion">
                                @foreach($docs as $year => $documenti)
                                    <div class="th-panel">
                                        <h4>{{ $year }}</h4>
                                        <div class="th-panelcontent">
                                            <div class="th-description">
                                                <table class="file-list">
                                                    @foreach($documenti as $document)
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Tab End
        *************************************-->

    </main>

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
