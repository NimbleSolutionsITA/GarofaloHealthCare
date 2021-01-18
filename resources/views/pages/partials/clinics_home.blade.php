<!--************************************
                Departments Start
        *************************************-->
<section class="th-sectionspace th-bgpattrensection th-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="th-textwidgetbox">
                    <div class="th-sectionhead th-alignleft th-nopattren">
                        <div class="th-sectiontitle">
                            <h2 style="text-align: center;">{!! $contents->where('key', 'home-strutture')->first()->title !!}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="th-textwidgetbox">
                    <div class="th-description">
                        {!! $contents->where('key', 'home-strutture')->first()->body !!}
                    </div>
                </div>
                <div style="display: inline-block; margin-top: 25px; float: right;">
                    <div class="col-sm-12 col-md-12" style="float: right;">
                        <div class="th-btns">
                            <a class="th-btn" style="float: right; margin-right: 0;vag" href="/strutture">{{ trans('app.readMore') }}
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="th-departments">
                        @foreach($clinics as $clinic)
                        <div class="col-sm-6">
                            <div class="th-department">
                                <figure>
                                    <img src="@if($clinic->thumb == '')/images/department/img-01.jpg @else {{ asset("storage/".$clinic->thumb) }}@endif" alt="{{ $clinic->name }} thumb">
                                </figure>
                                <div class="th-departmentname">
                                    <h3><a href="/strutture/{{ $clinic->slug }}">{{ $clinic->name}}</a></h3>
                                </div>
                                <span class="th-departmenticlon"><img src="@if($clinic->icon == '')/images/department/img-01.jpg @else {{ asset("storage/".$clinic->icon) }}@endif" alt="{{ $clinic->name }} icon"></span>
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
        Departments End
*************************************-->
