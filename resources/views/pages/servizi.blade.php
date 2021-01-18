@extends('main')

@section('title', $service->name())

@section('content')

    @include('pages.partials.breadcrumb')

    <!--************************************
				Main Start
		*************************************-->
    <main id="th-main" class="th-main th-haslayout th-pattrenone th-pattrenone-repeat">
        <!--************************************
                Department Start
        *************************************-->
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="th-sectionhead th-nopattren">
                        <div class="th-sectiontitle">
                            <h2>{!! trans('app.infoSpan') !!}</h2>
                        </div>
                        <div class="th-description">
                            <p>
                                {!! $service->excerpt() !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div id="th-content" class="th-content">
                        <div class="th-detailpage th-gallerydetail">
                            <figure>
                                <img src="{{ asset("storage/".$department->image) }}" alt="image description">
                                <figcaption>
                                    <ul class="th-passionnant">
                                        <li>
                                            <span>{{ trans('app.department') }} :</span>
                                            <em>{{ $department->name() }}</em>
                                        </li>
                                        <li>
                                            <span>{{ trans('app.director') }} :</span>
                                            <em><a href="/medici/{{ $department->director->id }}/{{str_slug($department->director->fullname, "-")}}"
                                                   style="color: white;">{{ $department->director->shortName() }}@if($department->director->shortName() == '') {!! trans('app.notAvailable') !!} @endif</a></em>
                                        </li>
                                        <li>
                                            <span>{{ trans('app.service') }} :</span>
                                            <em>{{ $service->name() }}</em>
                                        </li>
                                        <li>
                                            <span>{{ trans('app.head') }} :</span>
                                            <em><a href="/medici/{{ $service->head->id }}/{{str_slug($service->head->fullname, "-")}}"
                                                   style="color: white;">{{ $service->head->shortName() }}@if($service->head->shortName() == '') {!! trans('app.notAvailable') !!} @endif</a></em>
                                        </li>
                                        <li>
                                            <span>{{ trans('app.headNurse') }} :</span>
                                            <em><a href="/medici/{{ $service->nurse->id }}/{{str_slug($service->nurse->fullname, "-")}}"
                                                   style="color: white;">{{ $service->nurse->shortName() }}@if($service->nurse->shortName() == '') {!! trans('app.notAvailable') !!} @endif</a></em>
                                        </li>
                                        <li><p></p></li>
                                        <li><p></p></li>
                                    </ul>
                                </figcaption>
                            </figure>
                            <div class="row">
                                <div class="col-sm-3 col-xs-12">
                                    <figure class="th-doctor">
                                        <img src="{{ asset("storage/".$head->photo) }}" alt="image description">
                                        <figcaption>
                                            <h6 style="color: white;">{{ trans('app.head') }}</h6>
                                            <h4><a href="/medici/{{ $head->id }}/{{str_slug($head->fullname, "-")}}"
                                                   style="color: white;">{{ $head->fullName() }}</a></h4>
                                        </figcaption>
                                    </figure>
                                    <div class="th-widget th-widgetcategories th-widgetcount th-leficon">
                                        <div class="th-widgettitle">
										<span class="th-widgeticon">
											<i class="{{ $department->icon }}"></i>
										</span>
                                            <h3>{{ trans('app.otherServices') }}</h3>
                                        </div>
                                        <ul>
                                            @foreach($department->services as $depService)
                                            <li>
                                                <a href="/attivita/{{ $department->slug }}/{{ $depService->slug }}">
                                                    <span>{{ $depService->name() }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-xs-12">
                                    <div class="tab-pane">
                                        {!! $service->body() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Department End
        *************************************-->

        <!--************************************
                Doctor Team Start
        *************************************-->
        <section class="th-sectionspace th-haslayout th-paddingtopzero">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="th-sectionhead th-alignleft">
                            <div class="th-sectiontitle">
                                <h2>{!! trans('app.doctorTeam') !!}</h2>
                            </div>
                        </div>
                    </div>
                    <div id="th-docteamslider" class="th-docteamslider th-docmembers">
                        @foreach($team as $staff)
                        <div class="item">
                            <div class="th-docmember">
                                <figure>
                                    <img src="@if($staff->photo == '')/images/docteam/img-01.jpg @else {{ asset("storage/".$staff->photo)}}@endif" alt="image description">
                                    <figcaption>
                                        <div class="th-doctitle">
                                            <h3><a href="/medici/{{$staff->id}}/{{str_slug($staff->fullname, "-")}}">{{ $staff->shortName() }}</a></h3>
                                        </div>
                                        <span class="th-docpost">{{ $staff->activity() }}</span>
                                        <ul class="th-socialicons">
                                            @foreach( $service->head->departments as $department_doc)
                                                <li><a href="/attivita/{{  $department_doc->slug }}"><i class="{{ $department_doc->icon}}"></i></a></li>
                                            @endforeach
                                        </ul>
                                        <div class="th-description">
                                            <p>{{ $department->name() }} - {{ $service->name() }}</p>
                                        </div>
                                        <a class="th-docemail" href="mailto:{{ $staff->email }}"><i class="fa fa-envelope-o"></i></a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Doctor Team End
        *************************************-->



    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection


@section('scripts')

    <script>
        $(document).ready(function(){

            $('ul.tabs li').click(function(){
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
            })

        })
    </script>

    <style>
        ul.tabs{
            margin: 0px;
            padding: 0px;
            list-style: none;
        }
        ul.tabs li{
            background: none;
            color: #222;
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;
        }

        ul.tabs li.current{
            background: #ededed;
            color: #222;
        }

        .tab-content{
            display: none;
            background: #ededed;
            padding: 15px;
        }

        .tab-content.current{
            display: inherit;
        }
    </style>

@stop