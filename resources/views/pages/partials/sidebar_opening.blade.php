<div class="th-openingtime">
    <h3>{{ trans('app.sidebarTimeTitle') }}</h3>
    <ul class="th-workingtime">
        @if(setting('informazioni-generali.reception') != '')
            <li>
                <span>Reception<br>{!! setting('informazioni-generali.time') !!}</span>
                <span>{!! setting('informazioni-generali.reception') !!}</span>
            </li>
        @endif
        @if(setting('informazioni-generali.admission_desk') != '')
             <li>
                <span>{{ trans('app.admissionDesk') }}<br>{!! setting('informazioni-generali.admission_desk_time') !!}</span>
                <span>{!! setting('informazioni-generali.admission_desk') !!}</span>
            </li>
        @endif
        @if(setting('informazioni-generali.cartelle_cliniche') != '')
                <li>
                    <span>{{ trans('app.medicalRecords') }}<br>{!! setting('informazioni-generali.cartelle_cliniche_time') !!}</span>
                    <span>{!! setting('informazioni-generali.cartelle_cliniche') !!}</span>
                </li>
        @endif
        @if(setting('informazioni-generali.cup') != '')
            <li>
                <span>C.U.P.<br>{!! setting('informazioni-generali.cup_time') !!}</span>
                <span>{!! setting('informazioni-generali.cup') !!}</span>
            </li>
        @endif
    </ul>
    <h4> Email</h4>
    <ul class="th-workingtime">
        <li>
            <span style="width: 20%;"><i class="fa fa-envelope-o"></i></span>
            <span style="width: 80%;"><a style="color: white;" href="mailto:{!! setting('informazioni-generali.email') !!}">{!! setting('informazioni-generali.email') !!}</a></span>
        </li>
        <li>
            <span style="width: 20%;"><i class="fa fa-envelope-o"></i></span>
            <span style="width: 80%;"><a style="color: white;" href="mailto:{!! setting('informazioni-generali.email_gg') !!}">{!! setting('informazioni-generali.email_gg') !!}</a></span>
        </li>
    </ul>
    <h4> {{ trans('app.direzione') }}</h4>
    <ul class="th-workingtime">
        <li>
            <span style="width: 40%; text-transform: uppercase;"> {{ trans('app.direttoreGenerale') }}</span>
            <span style="width: 60%;">{!! setting('informazioni-generali.direttore-generale') !!}</span>
        </li>
        <li>
            <span style="width: 40%; text-transform: uppercase;"> {{ trans('app.direttoreSanitario') }}</span>
            <span style="width: 60%;">{!! setting('informazioni-generali.direttore-sanitario') !!}</span>
        </li>
        <li>
            <span style="width: 40%; text-transform: uppercase;"> {{ trans('app.direttoreScientifico') }}</span>
            <span style="width: 60%;">{!! setting('informazioni-generali.direttore-scientifico') !!}</span>
        </li>
    </ul>
</div>