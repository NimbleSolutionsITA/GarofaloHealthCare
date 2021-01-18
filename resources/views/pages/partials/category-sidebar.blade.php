<div class="th-widget th-widgetcategories th-widgetcount th-leficon">
    <div class="th-widgettitle">
	    <span class="th-widgeticon">
		    <i><img src="/images/icon/img-26.png" alt="image description"></i>
	    </span>
        <h3>{{ trans('app.categories') }}</h3>
    </div>
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="/news/{{ $category->slug }}">
                    <span>{{ $category->name }}</span>
                    <span>({{ $category->posts->count() }})</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>