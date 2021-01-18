<div id="th-accordion" class="th-accordion">
    @foreach ($content as $sezione)
        <div class="th-panel">
            <h4 style="text-transform: uppercase; font-size: 24px; font-weight: bold; color: #174c8f;">{{ $sezione->title }}</h4>
            <div class="th-panelcontent">
                <div class="th-description">
                    {!! $sezione->body !!}
                    <hr>
                    @switch($content->first()->key)

                        @case('internal-dealing')
                        @include('pages.partials.corporate-doc-year', ['docs' => $documents->where('doc_type', $sezione->key)->groupBy(function ($val) { return \Carbon\Carbon::parse($val->date)->format('M-Y'); })])
                        @break

                        @case('bilanci-relazioni')
                        @case('comunicati-price-sensitive')
                        @include('pages.partials.corporate-doc-year', ['docs' => $documents->where('doc_type', $sezione->key)->groupBy(function ($val) { return \Carbon\Carbon::parse($val->date)->format('Y'); })])
                        @break

                        @default
                        @include('pages.partials.corporate-doc', ['docs' => $documents->where('doc_type',$sezione->key)])

                    @endswitch
                </div>
            </div>
        </div>
    @endforeach
</div>