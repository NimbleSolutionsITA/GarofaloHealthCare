
@extends('main')

@section('title', trans('app.contacts'))

@section('content')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout">

        <!--************************************
				Main Start
		*************************************-->
        <main id="th-main" class="th-main th-haslayout th-paddingtopzero">
            <div class="container">
                <div class="row">
                    <ul class="th-contactinfo">
                        <li>
                            <div class="th-infobox">
                                <i class="th-iconbox"><img src="images/icon/img-08.png" alt="image description"></i>
                                <address>7307 San Pablo Drive South Ozone, NY 11420</address>
                            </div>
                        </li>
                        <li>
                            <div class="th-infobox">
                                <i class="th-iconbox"><img src="images/icon/img-09.png" alt="image description"></i>
                                <span>(01) 1800 - 98 765 432 10,</span>
                                <span>(01) 1800 - 90 123 456 78</span>
                            </div>
                        </li>
                        <li>
                            <div class="th-infobox">
                                <i class="th-iconbox"><img src="images/icon/img-10.png" alt="image description"></i>
                                <a href="admin@adhividayam.com">admin@adhividayam.com,</a>
                                <a href="Support@adhividayam.com">Support@adhividayam.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="th-mapandworkhours">
                <div class="th-aimcol th-workinghours">
                    <h3>Our Work Timing</h3>
                    <ul class="th-workingtime">
                        <li>
                            <span>Mon - Fri</span>
                            <span>08:00am - 10:00pm</span>
                        </li>
                        <li>
                            <span>Saturday</span>
                            <span>10:00am - 07:00pm</span>
                        </li>
                        <li>
                            <span>Sunday</span>
                            <span>Emergency Only</span>
                        </li>
                        <li>
                            <span>Ambulance</span>
                            <span>24/7 Service</span>
                        </li>
                        <li>
                            <span>Visitors</span>
                            <span>11:00am - 01:00pm</span>
                        </li>
                    </ul>
                </div>
                <div id="th-locationmap" class="th-locationmap"></div>
            </div>
            <!--************************************
                    Get in Touch Start
            *************************************-->
            <div class="container">
                <div class="row">
                    <div class="th-content th-sectionspace">
                        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                            <div class="th-sectionhead th-nopattren">
                                <div class="th-sectiontitle">
                                    <h2>Keep in <span>Touch with Us</span></h2>
                                </div>
                                <div class="th-description">
                                    <p>Can you tell me how to get how to get to sesame street now the world don't move to the beat of just one drum what might be right for you may not be right for some so join us here each week my friends smile </p>
                                </div>
                            </div>
                        </div>
                        <form class="th-formgetintouch" action="{{ url('contatti') }}" method="POST">
                            {{ csrf_field() }}
                            {!! honeypot('honeypot_name', 'honeypot_time') !!}
                            <fieldset>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="contactnebumber" class="form-control" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your E-mail">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea class="form-control th-textarea" name="bodyMessage" placeholder="Message (if any)"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                                    <button class="th-btnform th-btnform-lg" type="submit"><span>Send Your Message</span></button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <!--************************************
                    Get in Touch end
            *************************************-->
        </main>
        <!--************************************
                Main End
        *************************************-->

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
