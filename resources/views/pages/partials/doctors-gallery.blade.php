<!--************************************
                Gallery Start
        *************************************-->
<section class="th-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="th-sectionhead">
                    <div class="th-sectiontitle">
                        <h2>{!! trans('app.staff') !!}</h2>
                    </div>
                    <div class="th-description">

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <ul id="th-navfilterbale" class="th-navfilterbale option-set">
                    <li><a class="th-active" data-filter=".heads" href="javascript:void(0);">{{ trans('app.headsDirectors') }}</a></li>
                    @foreach($departments as $department)
                        @if($department->slug != 'visite-ambulatoriali')
                            <li><a data-filter=".{{ $department->slug }}" href="javascript:void(0);">{{ $department->name() }}</a></li>
                        @endif
                    @endforeach
                    <li><a data-filter=".ginecologi" href="javascript:void(0);">Ginecologi</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="filter-masonry" class="th-projects th-filter-masonry">
        @foreach($doctors as $doctor)
            @if($doctor->departments_director->count() > 0 || $doctor->services_head->count() > 0)
                <div class="th-project heads
                    @foreach($doctor->departments as $department) {{ $department->slug }} @endforeach
                    @if( $doctor->activity_it == 'Ginecologo' ) ginecologi @endif">
                    <figure>
                        <img src="@if($doctor->photo == '')/images/gallery/img-13.jpg @else {{ asset("storage/".$doctor->photo)}}@endif" alt="image description">
                        <figcaption>
                            <div class="row">
                                @foreach($doctor->departments as $department1)
                                    <a class="th-projecticon" style="display: inline-block" href="/attivita/{{ $department1->slug }}"><i class="{{ $department1->icon }}"></i></a>
                                @endforeach
                            </div>
                            <h3><a href="/medici/{{$doctor->id}}/{{str_slug($doctor->fullname, "-")}}">{{ $doctor->fullName() }}</a></h3>
                            <p>
                                @foreach($doctor->services as $service)
                                    {{ $service->name() }}
                                @endforeach
                            </p>
                        </figcaption>
                        <div class="figcaption">
                            <h6><a href="/medici/{{$doctor->id}}/{{str_slug($doctor->fullname, "-")}}" style="color: white;">{{ $doctor->fullName() }}</a></h6>
                        </div>
                    </figure>
                </div>
            @endif
        @endforeach
        @foreach($doctors as $doctor)
            @if($doctor->departments_director->count() == 0 && $doctor->services_head->count() == 0 && $doctor->role != 'nurse')
                <div class="th-project
                    @foreach($doctor->departments as $department) {{ $department->slug }} @endforeach
                    @if( $doctor->activity_it == 'Ginecologo' ) ginecologi @endif">
                    <figure>
                        <img src="@if($doctor->photo == '')/images/gallery/img-13.jpg @else {{ asset("storage/".$doctor->photo)}}@endif" alt="image description">
                        <figcaption>
                            <div class="row">
                                @foreach($doctor->departments as $department1)
                                    <a class="th-projecticon" style="display: inline-block" href="/attivita/{{ $department1->slug }}"><i class="{{ $department1->icon }}"></i></a>
                                @endforeach
                            </div>
                            <h3><a href="/medici/{{$doctor->id}}/{{str_slug($doctor->fullname, "-")}}">{{ $doctor->fullName() }}</a></h3>
                            <p>
                                @foreach($doctor->services as $service)
                                    {{ $service->name() }}
                                @endforeach
                            </p>
                        </figcaption>
                        <div class="figcaption">
                            <h6><a href="/medici/{{$doctor->id}}/{{str_slug($doctor->fullname, "-")}}" style="color: white;">{{ $doctor->fullName() }}</a></h6>
                        </div>
                    </figure>
                </div>
            @endif
        @endforeach
            @foreach($doctors as $doctor)
                @if($doctor->role == 'nurse')
                    <div class="th-project @foreach($doctor->departments as $department) {{ $department->slug }} @endforeach ">
                        <figure>
                            <img src="@if($doctor->photo == '')/images/gallery/img-13.jpg @else {{ asset("storage/".$doctor->photo)}}@endif" alt="image description">
                            <figcaption>
                                <div class="row">
                                    @foreach($doctor->departments as $department1)
                                        <a class="th-projecticon" style="display: inline-block" href="/attivita/{{ $department1->slug }}"><i class="{{ $department1->icon }}"></i></a>
                                    @endforeach
                                </div>
                                <h3><a href="/medici/{{$doctor->id}}/{{str_slug($doctor->fullname, "-")}}">{{ $doctor->fullName() }}</a></h3>
                                <p>
                                    @foreach($doctor->services as $service)
                                        {{ $service->name() }}
                                    @endforeach
                                </p>
                            </figcaption>
                            <div class="figcaption">
                                <h6><a href="/medici/{{$doctor->id}}/{{str_slug($doctor->fullname, "-")}}" style="color: white;">{{ $doctor->fullName() }}</a></h6>
                            </div>
                        </figure>
                    </div>
                @endif
            @endforeach
    </div>
</section>
<!--************************************
        Gallery Start
*************************************-->
