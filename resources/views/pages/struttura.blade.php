@extends('main')


@section('title', $clinic->name.'  | Garofalo Health Care')

@section('content')

    @include('pages.partials.clinic-map')

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
                            <h2>@php $sentence = explode(' ', $clinic->name) @endphp
                                <span>{{ $sentence[0] }}</span>
                                {{ str_after($clinic->name, $sentence[0].' ') }}
                            </h2>
                        </div>
                        <div class="th-description">
                            <p>
                                {!! $clinic->excerpt() !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div id="th-content" class="th-content">
                        <div class="th-detailpage th-gallerydetail">
                            <figure style="background-image: url('{{ asset("storage/".$clinic->photo) }}');">
                                <figcaption>
                                    <table style="display: inline; background: none;">
                                            <tr>
                                                <td colspan="2" class="clinic-logo"><img src="{{ asset("storage/".$clinic->icon) }}" alt="image description" height="100" width="100" ></td>
                                            </tr>
                                            <tr>
                                                <td><i class="flaticon-sign-post"></i></td>
                                                <td><em>{{ $clinic->address }}@if($clinic->address == '') {!! trans('app.notAvailable') !!} @endif</em></td>
                                            </tr>
                                        <tr>
                                            <td><i class="flaticon-technology"></i></td>
                                            <td><em>{{ $clinic->phone }}@if($clinic->phone == '') {!! trans('app.notAvailable') !!} @endif</em></td>
                                        </tr>
                                            <tr>
                                                <td><i class="flaticon-email"></i></td>
                                                <td><em>{{ $clinic->email }}@if($clinic->email == '') {!! trans('app.notAvailable') !!} @endif</em></td>
                                            </tr>
                                        <tr>
                                            <td><i class="flaticon-www"></i></td>
                                            <td><em><a href="{{ $clinic->url }}" target="_blank">{{ $clinic->url }}@if($clinic->url == '') {!! trans('app.notAvailable') !!} @endif</a></em></td>
                                        </tr>
                                        <!--
                                            <tr>
                                                <td><i class="flaticon-fax"></i></td>
                                                <td><em>{{ $clinic->FAX }}@if($clinic->FAX == '') {!! trans('app.notAvailable') !!} @endif</em></td>
                                            </tr>
                                            <tr>
                                                <td><i class="flaticon-head"></i></td>
                                                <td><em>{{ $clinic->director }}@if($clinic->director == '') {!! trans('app.notAvailable') !!} @endif</em></td>
                                            </tr>
                                        -->
                                        </tbody>
                                    </table>
                                </figcaption>
                            </figure>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="tab-pane">
                                        {!! $clinic->body() !!}
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

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection