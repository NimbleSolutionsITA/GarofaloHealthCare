
@extends('main')

@section('title', 'HOME | Garofalo Health Care')

@section('content')

    @include('pages.partials.home_slider')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout">

        @include('pages.partials.clinics_home')

        @include('pages.partials.statistics')

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
