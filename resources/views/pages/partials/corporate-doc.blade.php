<table class="file-list">
    @foreach($docs as $document)

        <tr>
            <td width="100px">
                <div class="file-pdf"><i class="fa fa-file-pdf-o fa-th-large"></i></div>
            </td>
            <td class="file-info"><span>{{ $document->getTranslatedAttribute('name') == '' ? $document->getTranslatedAttribute('name', 'it') : $document->getTranslatedAttribute('name') }}</span><br>
                {{ trans('app.'.$document->doc_type) }} - {{ \Carbon\Carbon::parse($document->date)->formatLocalized('%d/%m/%Y') }}</td>
            <td width="150px">
                <a href="/storage/@if(App::getLocale() == 'en' and isset($document->file_en)){{ json_decode($document->file_en)[0]->download_link}}@else{{ json_decode($document->file_it)[0]->download_link}}@endif" target="_blank">
                    <i class="fa fa-arrow-down"></i><br>
                    {{ trans('app.downloadDoc') }}
                </a>
            </td>
        </tr>

    @endforeach
</table>