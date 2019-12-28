@extends('layouts.master')

@section('title', 'Home')

@section('content')
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{ asset('master/images/stock/teacher2.jpeg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>The Art of Teaching is the Art of Assisting Discovery</h1>
                        <h2> {{ date('Y-m-d H:i:s') }}  </h2>
                        <p><a class="btn btn-primary btn-lg btn-learn" href="{{ route('select-tutor') }}">Get a Private Tutor</a> <a class="page-scroll btn btn-primary btn-lg btn-video" href="#fh5co-explore"><i class="icon-play"></i> Learn more</a> <a class="btn btn-primary btn-lg btn-learn" href="{{ route('become-tutor') }}"> Become A Tutor</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--<div id="fh5co-counter" class="fh5co-counters">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center animate-box">
                <span class="fh5co-counter js-counter" data-from="0" data-to="{{ \App\Subscription::all()->count() }}" data-speed="1" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Students Taught</span>
            </div>
            <div class="col-md-3 text-center animate-box">
                <span class="fh5co-counter js-counter" data-from="0" data-to="{{\App\User::whereHas('roles', function($q){ $q->where('name', 'tutor'); })->count()}}" data-speed="1" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Tutors</span>
            </div>
            <div class="col-md-3 text-center animate-box">
                <span class="fh5co-counter js-counter" data-from="0" data-to="{{\App\User::whereHas('roles', function($q){ $q->where('name', 'client'); })->count()}}" data-speed="1" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Regsitered Users</span>
            </div>
        </div>
    </div>
</div>-->

<div id="fh5co-explore" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                <h2>Find out More</h2>
                <p></p>
            </div>
        </div>
    </div>
    <div class="fh5co-explore fh5co-explore1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-5 animate-box">
                    <img class="img-responsive" src="{{ asset('master/images/stock/student1.jpg') }}" alt="we want you to learn">
                </div>
                <div class="col-md-4 col-md-pull-8 animate-box">
                    <div class="mt">
                        <h3>We Want You To Learn</h3>
                        <p>We provide a lot of tutoring services to ensure your child has an all round education</p>
                        <ul class="list-nav">
                            <li><i class="icon-check2"></i>School examinations</li>
                            <li><i class="icon-check2"></i>Etiquette</li>
                            <li><i class="icon-check2"></i>Writing and Debating</li>
                        </ul>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fh5co-explore">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-pull-1 animate-box">
                    <img class="img-responsive" src="{{ asset('master/images/stock/teacher1.jpeg') }}" alt="great tutors and flexibility">
                </div>
                <div class="col-md-4 animate-box">
                    <div class="mt">
                        <div>
                            <h4><i class="icon-user"></i>Great Tutors</h4>
                            <p>LekkiVille Academy provides parents, guardians and clients with secure private tutors who have undergone security checks; a higly skilled army of educationists, who do their work passionately.</p>
                        </div>
                        <div>
                            <h4><i class="icon-laptop"></i>Flexibility</h4>
                            <p>We provide both private home tutor services and also tutoring through Skype. Our dedicated team of tutors are ready to deliver great learning content with whatever means you desire.</p>
                            <h4><i class="icon-shield"></i>Security</h4>
                            <p>All our tutors go through a very tight security check. We ensure only responsible persons are sent to your homes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-steps">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Get Started in Six Easy Steps</h2>
                <p></p>
            </div>
        </div>

        <div class="row bs-wizard animate-box" style="border-bottom:0;">

            <div class="col-xs-2 bs-wizard-step complete">
                <div class="text-center bs-wizard-stepnum"><h4>Step 1</h4></div>
                <div class="progress"><div class="progress-bar"></div></div>
                <span class="bs-wizard-dot"></span>
                <div class="bs-wizard-info text-center"><p>Select Tutor</p></div>
            </div>

            <div class="col-xs-2 bs-wizard-step complete">
                <div class="text-center bs-wizard-stepnum"><h4>Step 2</h4></div>
                <div class="progress"><div class="progress-bar"></div></div>
                <span class="bs-wizard-dot"></span>
                <div class="bs-wizard-info text-center"><p>Select Lesson Plan</p></div>
            </div>

            <div class="col-xs-2 bs-wizard-step complete">
                <div class="text-center bs-wizard-stepnum"><h4>Step 3</h4></div>
                <div class="progress"><div class="progress-bar"></div></div>
                <span class="bs-wizard-dot"></span>
                <div class="bs-wizard-info text-center"><p>Fill in Contact Details</p></div>
            </div>

            <div class="col-xs-2 bs-wizard-step complete">
                <div class="text-center bs-wizard-stepnum"><h4>Step 4</h4></div>
                <div class="progress"><div class="progress-bar"></div></div>
                <span class="bs-wizard-dot"></span>
                <div class="bs-wizard-info text-center"><p>Create Account (optional)</p></div>
            </div>

            <div class="col-xs-2 bs-wizard-step complete">
                <div class="text-center bs-wizard-stepnum"><h4>Step 5</h4></div>
                <div class="progress"><div class="progress-bar"></div></div>
                <span class="bs-wizard-dot"></span>
                <div class="bs-wizard-info text-center"><p>Checkout and Pay</p></div>
            </div>

            <div class="col-xs-2 bs-wizard-step active">
                <div class="text-center bs-wizard-stepnum"><h4>Step 6</h4></div>
                <div class="progress"><div class="progress-bar"></div></div>
                <span class="bs-wizard-dot"></span>
                <div class="bs-wizard-info text-center"><p>Begin Tutorials</p></div>
            </div>
        </div>

    </div>
</div>

<div id="fh5co-explore" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                <h2>Our Cool Services</h2>
                <p></p>
            </div>
        </div>
    </div>
    <!--<div class="fh5co-explore fh5co-explore1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-5 animate-box">
                    <img class="img-responsive" src="{{ asset('master/images/stock/student1.jpg') }}" alt="we want you to learn">
                </div>
                <div class="col-md-4 col-md-pull-8 animate-box">
                    <div class="mt">
                        <h3>We Want You To Learn</h3>
                        <p>We provide a lot of tutoring services to ensure your child has an all round education</p>
                        <ul class="list-nav">
                            <li><i class="icon-check2"></i>School examinations</li>
                            <li><i class="icon-check2"></i>Etiquette</li>
                            <li><i class="icon-check2"></i>Writing and Debating</li>
                        </ul>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <div class="fh5co-explore">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-pull-1 animate-box">
                    <img class="img-responsive" src="{{ asset('master/images/stock/teacher1.jpeg') }}" alt="great tutors and flexibility">
                    <img class="img-responsive" src="{{ asset('master/images/stock/teacher1.jpeg') }}" alt="great tutors and flexibility">
                    <img class="img-responsive" src="{{ asset('master/images/stock/teacher1.jpeg') }}" alt="great tutors and flexibility">
                </div>
                <div class="col-md-4 animate-box">
                    <div class="mt">
                        <div>
                            <h4><i class="icon-user"></i>Group Learning</h4>
                            <p>The group learning caters for clients who can’t afford a personal tutor. So what they do is to link up with friends in their area, church, office etc. An arrangement is made between them on the venue and time then a tutor is sent to them. This package will reduce cost for clients and instil competitiveness in their children. Please note, under this package only a maximum of four learners are accepted and they must belong to the same class.</p>
                        </div>
                        <div>
                            <h4><i class="icon-laptop"></i>School Equipment</h4>
                            <p>We provide schools with the latest educational equipment and gadget for 24 century learning. Our supplies are from the best in the industry, so the durability and genuineness is guaranty, also our prices are the best in the market. We supply and install computers, printers, photocopiers, scanners, projectors, interactive boards for schools. We can also help schools set up their library and computer rooms.</p>
                            <h4><i class="icon-shield"></i>Trainings</h4>
                            <p>At lekkiville academy, we provide cutting edge trainings for schools in the following areas;</p>
                                <ul class="list-nav">
                                    <li><i class="icon-check2"></i>Curriculum planning</li>
                                    <li><i class="icon-check2"></i>24 century teaching and learning skills</li>
                                    <li><i class="icon-check2"></i>Classroom management</li>
                                    <li><i class="icon-check2"></i>Educational software usage</li>
                                    <li><i class="icon-check2"></i>School management and administration etc.</li>
                                </ul>
                            <p>Also, let the guy program it in such a way that any teacher that register on the platform must share it either/both facebook or instagram.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-project">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Tutorial Plans</h2>
                <p></p>
            </div>
        </div>
    </div>
    <div class="container-fluid proj-bottom">
        <div class="row">
            <div id="lva-nap" class="col-lg-6 col-md-6 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a class="page-scroll" href="#lva-nap"><img src="{{ asset('master/images/stock/board.jpeg') }}" alt="Nusery and primary" class="img-responsive">
                    <h3>Nusery and primary</h3>
                    <span>View Course</span>
                </a>
            </div>
            <div id="lva-shp" class="col-lg-6 col-md-6 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a class="page-scroll" href="#lva-shp"><img src="{{ asset('master/images/stock/board.jpeg') }}" alt="Secondary , High School & Post-Secondary" class="img-responsive">
                    <h3>Secondary , High School & Post-Secondary</h3>
                    <span>View Course</span>
                </a>
            </div>
            <div id="lva-fe" class="col-lg-6 col-md-6 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a class="page-scroll" href="#lva-fe"><img src="{{ asset('master/images/stock/board.jpeg') }}" alt="Foreign Exams" class="img-responsive">
                    <h3>Foreign Exams</h3>
                    <span>View Course</span>
                </a>
            </div>
            <div id="lva-eglw" class="col-lg-6 col-md-6 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                <a class="page-scroll" href="#lva-eglw"><img src="{{ asset('master/images/stock/board.jpeg') }}" alt="English Grammar, Literature, and Writing" class="img-responsive">
                    <h3>English Grammar, Literature, and Writing</h3>
                    <span>View Course</span>
                </a>
            </div>
        </div>
    </div>
    <!--div class="container">
        <div class="row">
            <div class="features">
                <div class="col-md-4 animate-box">
                    <h4>We have coolest features of this course</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.  </p>
                </div>
                <div class="col-md-4 animate-box">
                    <h4>Great teachers that we have</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.  </p>
                </div>
                <div class="col-md-4 animate-box">
                    <h4>Steps by steps turorial session</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.  </p>
                </div>
            </div>

        </div-->
    </div>
</div>

<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 animate-box">

                <div class="fh5co-contact-info">
                    <h3>Contact Information</h3>
                    <ul>
                        <li class="address">Lekki, <br> Lagos, Nigeria</li>
                        <li class="phone"><a href="tel://1234567920">+2348063127827, +2348181627799</a></li>
                        <li class="email"><a href="mailto:info@yoursite.com">info@lekkivilleacademy.com</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6 animate-box">
                <h3>Get In Touch</h3>
                <form action="#">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <!-- <label for="fname">First Name</label> -->
                            <input type="text" id="fname" class="form-control" placeholder="Your firstname">
                        </div>
                        <div class="col-md-6">
                            <!-- <label for="lname">Last Name</label> -->
                            <input type="text" id="lname" class="form-control" placeholder="Your lastname">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="email">Email</label> -->
                            <input type="text" id="email" class="form-control" placeholder="Your email address">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="subject">Subject</label> -->
                            <input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="message">Message</label> -->
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
