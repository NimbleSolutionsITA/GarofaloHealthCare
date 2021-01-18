<div style="float: left; margin: 0 30px 0 0; min-width: 33%; max-width: 370px;">
    <ul class="th-featuresnav">
        @foreach($sidemenu as $slug => $title)
            <li @if($section == $slug)class="active" @endif>
                <a href="/{{ $page }}/{{ $slug }}">
                    <span> {{ $title }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>