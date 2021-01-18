<article class="th-post th-postdetail">
    <figure class="th-postimg">
        <a href="#"><img src="{{ isset($notizia->image) ?  asset("storage/".$notizia->image) : "/images/post/img-09.jpg" }}" alt="image description"></a>
        <figcaption>
            <ul class="th-postmate">
                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>{{ $notizia->updated_at->diffForHumans() }}</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-asterisk"></i>
                        <span>{{ $notizia->category->name }}</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-share"></i>
                        <span>Share </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </figcaption>
    </figure>
    <div class="th-postcontent">
        <div class="th-posttitel">
            <h2>{{ $notizia->title }}</h2>
        </div>
        <div class="th-description">
            {!! $notizia->body !!}
        </div>
    </div>
</article>