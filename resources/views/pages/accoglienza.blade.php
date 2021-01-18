
@extends('main')

@section('title', trans('app.hospitality'))

@section('content')

    @include('pages.partials.breadcrumb')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-haslayout">

        @include('pages.partials.features_and_table')
        @include('pages.partials.tabbed')

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
