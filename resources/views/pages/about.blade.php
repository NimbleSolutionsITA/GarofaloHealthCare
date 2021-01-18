@extends('main')

@section('title', trans('app.aboutUs').'  | Garofalo Health Care')

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
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <ul class="th-featuresnav" role="tablist">
                                        @foreach($contents as $content)
                                            <li role="presentation" @if($anchor == $content->key)class="active" @endif>
                                                <a href="#{{ $content->key }}" role="tab" data-toggle="tab">
                                                    <i class="{{ $content->icon }}"></i>
                                                    <span> {{ $content->title }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <div class="tab-content th-featurestabcontent">
                                        @foreach($contents as $content)
                                            <div role="tabpanel" class="tab-pane @if($anchor == $content->key)active @endif "
                                                 id="{{ $content->key }}">
                                                <h2>{!! trans('app.'.$content->key.'Span') !!}</h2>
                                                {!! $content->body !!}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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