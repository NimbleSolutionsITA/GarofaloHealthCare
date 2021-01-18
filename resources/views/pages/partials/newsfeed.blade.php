@for ($i = 0; $i < 2; $i++)
    <li>
        <figure><a href=""><i><img src="{{ FeedReader::read('http://xml2.corriereobjects.it/rss/salute.xml')->get_item($i)->get_item_tags('', 'info1')[0]['child']['']['thumbimage'][0]['attribs']['']['url'] }}"></i></a></figure>
        <div class="th-shortcontent">
            <time datetime="{{ Carbon\Carbon::parse(FeedReader::read('http://xml2.corriereobjects.it/rss/salute.xml')->get_item($i)->get_local_date())->format('Y-d-m') }}">{{ Carbon\Carbon::parse(FeedReader::read('http://xml2.corriereobjects.it/rss/salute.xml')->get_item($i)->get_local_date())->diffForHumans() }}</time>
            <a style="color: white;" href="{{ FeedReader::read('http://xml2.corriereobjects.it/rss/salute.xml')->get_item($i)->get_link() }}" target="_blank">{{ FeedReader::read('http://xml2.corriereobjects.it/rss/salute.xml')->get_item($i)->get_title() }}</a>
        </div>
    </li>
@endfor