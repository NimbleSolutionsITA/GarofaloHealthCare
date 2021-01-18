
@extends('main')

@section('title', $doctor->fullName())

@section('content')

    @include('pages.partials.breadcrumb')

    <!--************************************
				Main Start
		*************************************-->
    <main id="th-main" class="th-main th-haslayout">
        <!--************************************
                    Doctor Team Start
            *************************************-->
        <div class="container">
            <div class="row">
                <div id="th-content" class="th-content">
                    <div class="col-sm-12 col-xs-12">
                        <div class="th-docterdetail">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 pull-right">
                                    <figure>
                                        <img src="@if($doctor->photo == '')/images/docteam/img-09.jpg @else {{ asset("storage/".$doctor->photo)}}@endif" alt="image description">
                                    </figure>
                                </div>
                                <div class="col-sm-8 col-xs-12 pull-left">
                                    <div class="th-sectionhead th-alignleft th-nopattren">
                                        <div class="th-sectiontitle">
                                            <h2>{!! $title !!}</h2>
                                            <ul>
                                                <li>{{ $doctor->activity() }}</li>
                                                <li>
                                                @foreach($doctor->departments as $department)
                                                    <a style="color: #859cc9;" href="/attivita/{{ $department->slug }}"> <i class="{{ $department->icon }}"></i></a>
                                                @endforeach
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="th-description">
                                        @foreach($doctor->departments_director as $department1)
                                            @if($loop->first)<p>DIRETTORE DEI DIPARTIMENTI: @endif
                                            @if($loop->last)<a href="/attivita/{{ $department1->slug }}">{{ $department1->name() }}</a></p>@break @endif
                                            <a href="/attivita/{{ $department1->slug }}">{{ $department1->name() }}</a> -
                                        @endforeach
                                        @foreach($doctor->services_head as $service)
                                            @if($loop->first)<p>RESPONSABILE DEI SERVIZI: @endif
                                            @if($loop->last)<a href="/attivita/{{ $service->slug }}">{{ $service->name() }}</a></p>@break @endif
                                            <a href="/attivita/{{ $service->slug }}">{{ $service->name() }}</a> -
                                        @endforeach
                                        @foreach($doctor->departments as $department1)
                                            @if($loop->first)<p>OPERA NEI DIPARTIMENTI: @endif
                                            @if($loop->last)<a href="/attivita/{{ $department1->slug }}">{{ $department1->name() }}</a></p>@break @endif
                                            <a href="/attivita/{{ $department1->slug }}">{{ $department1->name() }}</a> -
                                        @endforeach
                                        @foreach($doctor->services as $service)
                                            @if($loop->first)<p>OPERA NEI SERVIZI: @endif
                                            @if($loop->last)<a href="/attivita/{{ $service->slug }}">{{ $service->name() }}</a></p>@break @endif
                                            <a href="/attivita/{{ $service->slug }}">{{ $service->name() }}</a> -
                                        @endforeach
                                    </div>
                                    <ul class="th-info">
                                        <li>
                                            <a href="mailto:{{ $doctor->email }}"><i class="fa fa-envelope"></i></a><br>
                                            <a href="mailto:{{ $doctor->email }}">@if($doctor->email == '')Non disponibile @endif{{ $doctor->email }}</a>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-phone"></i></span><br>
                                            <span>@if($doctor->phone == '')Non disponibile @endif{{ $doctor->phone }}</span>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-file-pdf-o"></i> CV</span><br>
                                            <a href="/images/medici/CV/{{ $doctor->cv }}">@if($doctor->cv == '')Non disponibile @else Scarica il CV @endif</a>
                                        </li>
                                    </ul>
                                    <div class="th-formtitel">
                                        <h3>Ask Your Queries</h3>
                                    </div>
                                    <div class="row">
                                        <form class="th-formgetintouch" action="{{ url('docContact') }}" method="POST">
                                            {{ csrf_field() }}
                                            {!! honeypot('honeypot_name', 'honeypot_time') !!}
                                            <fieldset>
                                                <input type="hidden" name="toEmail" value="@if(isset($doctor->email)) {{ $doctor->email }} @else {{ $doctor->departments->first()->email }} @endif">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <input type="text" name="YourName" class="form-control" placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="Your E-mail">
                                                    </div>
                                                    <input type="text" name="Subject" class="form-control" placeholder="Subject">
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control th-textarea" name="bodyMessage" placeholder="Message (if any)"></textarea>
                                                    </div>
                                                    <button class="th-btnform th-btnform-lg" type="submit">
                                                        <span>Send Your Message</span>
                                                        <i class="fa fa-long-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Doctor Team End
        *************************************-->
    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
