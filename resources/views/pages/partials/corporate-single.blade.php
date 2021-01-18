@if($content->first())
    <h2>{!! trans('app.'.$content->first()->key.'Span') !!}</h2>
    {!! $content->first()->body !!}

    <br>

    <div id="th-accordion" class="th-accordion">
        @switch($content->first()->key)

            @case('internal-dealing')
            @include('pages.partials.corporate-doc-year', ['docs' => $documents->where('doc_type', $content->first()->key)->groupBy(function ($val) { return \Carbon\Carbon::parse($val->date)->format('M-Y'); })])
            @break

            @case('bilanci-relazioni')
            @case('comunicati-ir')
            @case('comunicati-price-sensitive')
            @case('assemblea-azionisti')
            @case('rassegna-stampa')
            @include('pages.partials.corporate-doc-year', ['docs' => $documents->where('doc_type', $content->first()->key)->groupBy(function ($val) { return \Carbon\Carbon::parse($val->date)->format('Y'); })])
            @break

            @default
            @include('pages.partials.corporate-doc', ['docs' => $documents->where('doc_type', $content->first()->key)])

        @endswitch

    </div>
@endif
