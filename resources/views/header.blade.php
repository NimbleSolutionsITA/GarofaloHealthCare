<!--************************************
            Header Start
    *************************************-->
<header id="th-header" class="th-header th-haslayout">
    <div class="th-topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <strong class="th-logo">
                        <a href="/"><img src="/images/logo.png" alt="image description"></a>
                    </strong>
                    <div class="th-rightarea">
                        <div class="th-topinfo">
                            <!--

                            <ul class="th-emails">
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:info@garofalohealthcare.com">info@garofalohealthcare.com</a></li>
                            </ul>
                            <ul class="th-socialicons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            -->
                            <div class="dropdown th-themedropdown" style="margin-left: 5px;">
                                <a id="th-languages" class="th-btndropdown th-btnlanguages" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-commenting-o"></i>
                                    <span>{{ trans('app.Language') }}</span>
                                    <i class="fa  fa-angle-down"></i>
                                </a>
                                <ul id="langageSwitcher" class="dropdown-menu th-dropdownmenu" aria-labelledby="th-languages">
                                    <li><a id="it"><img src="/images/icon/ita-flag.png" alt="Italian flag">{{ trans('app.Italian') }}</a></li>
                                    <li><a id="en"><img src="/images/icon/uk-flag.png" alt="UK flag">{{ trans('app.English') }}</a></li>
                                </ul>
                                <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                            </div>
                            <ul class="newsticker">
                                @foreach($posts as $post)
                                    <li data-toggle="tooltip" data-placement="bottom" title="{{ $post->excerpt }}">
                                        <a style="color: #576573; font-weight: bold;" href="/flash-news/{{$post->slug}}"> {{ str_limit($post->title, $limit = 85, $end = '...') }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="th-addressbox">
                            <li>
                                <span class="th-addressicon"><a href="/"><i class="fa fa-map-marker"></i></a></span>
                                <div class="th-addresscontent">
                                    <strong>{!! setting('informazioni-generali.cap') !!} - {!! setting('informazioni-generali.citta') !!}</strong>
                                    <span>{!! setting('informazioni-generali.via') !!}</span>
                                </div>
                            </li>
                            <li>
                                <span class="th-addressicon"><a href="/"><i class="fa fa-phone"></i></a></span>
                                <div class="th-addresscontent">
                                    <strong>{{ ucfirst(trans('app.phone')) }}</strong>
                                    <span>{{ setting('informazioni-generali.telefono') }}</span>
                                </div>
                            </li>
                            <li>
                                <span class="th-addressicon"><a href="mailto:{{ setting('informazioni-generali.email') }}"><i class="fa fa-envelope-o"></i></a></span>
                                <div class="th-addresscontent">
                                    <strong>Email</strong>
                                    <span>{{ setting('informazioni-generali.email') }}</span>
                                </div>
                            </li>
                            <!--
                            <li>
                                <a class="th-btnappointment" href="javascript:void(0);" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-edit"></i>
                                    <em>{{ trans('app.Appointments') }}</em>
                                </a>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="th-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <nav id="th-nav" class="th-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#th-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        {{ menu('main', 'layouts.main_nav') }}
                    </nav>
                    <div class="th-widgetsearch">
                        <a class="leftLink" href="/archivio">{{ trans('app.archive') }}</a>
                        <form action="" method="POST" id="appointmentForm" style="visibility: hidden;">
                            {{ csrf_field() }}
                            <fieldset>
                                <input id="headSearch" type="text" name="search" class="form-control" placeholder="{{ trans('app.FindDoctor') }}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                                <input id="docId" type="hidden" name="id">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
    a.leftLink {
        position: absolute;
        color: white;
        padding: 10px;
        font-size: 16px;
        font-weight: 400;
        text-transform: uppercase;
    }
    a.leftLink:hover {
        color: #03A9F4 !important;
    }
</style>
<!--************************************
        Header End
*************************************-->