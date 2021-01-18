<h3>{{ trans('app.nextEvent') }}</h3>

<table style="margin-top: 20px;">
    <tr>
        <td style="border: none; vertical-align: middle;"><i class="fa fa-calendar" style="font-size: 60px; padding: 15px; color: #1d4b8f;"></i></td>
        <td style="border: none; text-align: left; padding: 0;"><h5 style="background-color: #1d4b8f; color: white; padding: 10px; text-transform: capitalize;">{{ \Carbon\Carbon::parse($events->first()->date)->formatLocalized('%A %d %B %Y') }}</h5>
            <h6 style="padding: 0 10px; font-weight: bold;">{{ App::getLocale() == 'it' ? $events->first()->title_it : $events->first()->title_eng }}</h6>
        </td>
    </tr>
</table>

<hr>

<h3>{{ trans('app.nextEvents') }}</h3>
<br>

<table class="file-list">
    @foreach($events as $event)
        @if ($loop->first)
        @else
            <tr>
                <td width="100px">
                    <div class="file-pdf" style="padding: 6px 0 4px;">
                        <span><b>{{ \Carbon\Carbon::parse($event->date)->formatLocalized('%d') }}</b><br>{{ \Carbon\Carbon::parse($event->date)->formatLocalized('%b') }}</span>
                    </div>
                </td>
                <td class="file-info">{{ \Carbon\Carbon::parse($event->date)->formatLocalized('%d %B %Y') }}<br>
                    <b style="font-size: 16px;">{{ App::getLocale() == 'it' ? $event->title_it : $event->title_eng }}</b></td>
            </tr>
        @endif
    @endforeach
</table>

{!! $events->links() !!}