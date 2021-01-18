@extends('main')


@section('title', $department->name())

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
                                {!! $department->excerpt() !!}
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
                                            <em><a href="/medici/{{ $director->id }}"
                                                   style="color: white;">{{ $director->shortName() }}@if($director->shortName() == '') {!! trans('app.notAvailable') !!} @endif</a></em>
                                        </li>
                                        <li>
                                            <span>Email :</span>
                                            <em>{{ $department->email }}@if($department->email == '') {!! trans('app.notAvailable') !!} @endif</em>
                                        </li>
                                        <li>
                                            <span>{{ trans('app.phone') }} :</span>
                                            <em>{{ $department->phone }}@if($department->phone == '') {!! trans('app.notAvailable') !!} @endif</em>
                                        </li>
                                        <li>
                                            <span>{{ trans('app.OpeningTime') }} :</span>
                                            <em>{{ $department->orario }}@if($department->orario == '') {!! trans('app.notAvailable') !!} @endif</em>
                                        </li>
                                        <li>
                                            <span>{{ trans('app.position') }} :</span>
                                            <em>{{ $department->posizione }}@if($department->posizione == '') {!! trans('app.notAvailable') !!} @endif</em>
                                        </li>
                                        <li><p></p></li>
                                    </ul>
                                </figcaption>
                            </figure>
                            <div class="row">
                                <div class="col-sm-3 col-xs-12">
                                    <figure class="th-doctor">
                                        <img src="{{ asset("storage/".$director->photo) }}" alt="image description">
                                        <figcaption>
                                            <h6 style="color: white;">{{ trans('app.director') }}</h6>
                                            <h4><a href="/medici/{{$director->id}}/{{str_slug($director->fullname, "-")}}"
                                                   style="color: white;">{{ $director->fullName() }}</a></h4>
                                        </figcaption>
                                    </figure>
                                    @if($services->count() > 0)
                                    <div class="th-widget th-widgetcategories th-widgetcount th-leficon">
                                        <div class="th-widgettitle">
										<span class="th-widgeticon">
											<i class="{{ $department->icon }}"></i>
										</span>
                                            <h3>{{ trans('app.services') }}</h3>
                                        </div>
                                        <ul>
                                            @foreach($services as $service)
                                                <li>
                                                    <a href="/attivita/{{ $department->slug }}/{{ $service->slug }}">
                                                        <span>{{ $service->name() }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-sm-9 col-xs-12">
                                    <div class="tab-pane">
                                        {!! $department->body() !!}
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
            Services Start
    *************************************-->
        <section class="th-sectionspace th-bgpattrensection th-haslayout">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="th-textwidgetbox">
                            <div class="th-sectionhead th-alignleft th-nopattren">
                                <div class="th-sectiontitle">
                                    <h2>{!! trans('app.depServices') !!}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="th-departments">
                                @foreach( $services as $service)
                                    <div class="col-sm-3">
                                        <div class="th-department">
                                            <figure>
                                                <img src="@if($service->image == '')/images/department/img-01.jpg @else {{ asset("storage/".$service->image)}}@endif"
                                                     alt="image description">
                                            </figure>
                                            <div class="th-departmentname">
                                                <h3><a href="/attivita/{{ $department->slug }}/{{ $service->slug }}">{{ $service->name() }}</a></h3>
                                            </div>
                                            <span class="th-departmenticlon"><i class="@if($service->icon == '') {{ $department->icon }} @else {{ $service->icon }}@endif"></i></span>
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
                Services End
        *************************************-->
        <!--************************************
            Doctor Team Start
    *************************************-->
        <section class="th-sectionspace th-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="th-sectionhead  th-nopattren">
                            <div class="th-sectiontitle">
                                <h2>{!! trans('app.equipe') !!}</h2>
                            </div>
                            <div class="th-description">

                            </div>
                        </div>
                    </div>
                    <div class="th-docmembers th-docmemberstwo">
                        @foreach( $services as $service)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="th-docmember">
                                    <figure>
                                        <img src="@if($service->head->photo == '')/images/gallery/img-78.jpg @else {{ asset("storage/".$service->head->photo)}}@endif"
                                             alt="image description">
                                        <figcaption>
                                            <div class="th-doctitle">
                                                <h3>
                                                    <a href="/medici/{{$service->head->id}}/{{str_slug($service->head->fullname, "-")}}">{{ $service->head->shortName() }}</a>
                                                </h3>
                                            </div>
                                            <span class="th-docpost">{{ $service->head->activity() }}</span>
                                            <ul class="th-socialicons">
                                                @foreach( $service->head->departments as $department_doc)
                                                    <li><a href="/attivita/{{  $department_doc->slug }}"><i class="{{ $department_doc->icon}}"></i></a></li>
                                                @endforeach
                                            </ul>
                                            <div class="th-description">
                                                <p>{{ trans('app.head') }} {{ $service->name() }}</p>
                                            </div>
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