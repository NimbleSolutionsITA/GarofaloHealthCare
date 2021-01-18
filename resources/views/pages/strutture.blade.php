
@extends('main')

@section('title', trans('app.services').'  | Garofalo Health Care')

@section('content')

    @include('pages.partials.clinics-map')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout th-pattrenone th-pattrenone-repeat">

        <!--************************************
					Services Start
			*************************************-->
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12 pull-left">
                    <div class="th-sectionhead th-alignleft th-nopattren">
                        <div class="th-sectiontitle">
                            <h2>{!! trans('app.ourClinics') !!}</h2>
                        </div>
                        <div class="th-description">

                        </div>
                    </div>
                </div>
                <div class="th-services th-serviceslist th-servicestwo ">
                @foreach( $clinics as $clinic)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="th-service">
								<span class="th-serciceicon">
									<i><img src="@if($clinic->icon == '')/images/department/img-01.jpg @else {{ asset("storage/".$clinic->icon) }}@endif" alt="{{ $clinic->name }} icon"></i>
								</span>
                            <div class="th-servicetitle">
                                <h3><a href="/attivita/{{ $clinic->slug }}">
                                        {{ $clinic->name }}
                                    </a></h3>
                            </div>
                            <div class="th-description">
                                <p>
                                    {{ str_limit($clinic->excerpt(), 150) }}
                                </p>
                            </div>
                            <div class="th-servicehover">
                                <a class="th-btn th-btn-lg" href="/strutture/{{ $clinic->slug }}" >{{ trans('app.moreInfo') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <br>
        <!--************************************
                Services End
        *************************************-->

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
