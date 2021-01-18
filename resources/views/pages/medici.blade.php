
@extends('main')

@section('title', trans('app.doctors'))

@section('content')

    @include('pages.partials.breadcrumb')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout">

        @include('pages.partials.doctors-gallery')

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
