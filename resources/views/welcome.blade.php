<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel='shortcut icon' href="{{asset('/land/img/favicon.png')}}" type='image/x-icon'/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="lucky awesome bootstrap responsive one page business theme">
        <meta name="keywords" content="bootstrap, responsive, one page, parallax, business theme">
        <meta name="author" content="templateninja">
        <title>TrackReps</title>

        <!-- Bootstrap -->
        <link href="{{asset('/land/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700,600" rel="stylesheet"
              type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
        <link href="{{asset('/land/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('/land/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('/land/css/hint.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('/land/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('/land/css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('/land/css/sweetalert.css')}}">
        <link id="color-style" rel="stylesheet" type="text/css" href="{{asset('/land/css/default-skin.min.css')}}">

        <!-- begin:demo-style -->
        <link href="{{asset('/land/css/demo.css')}}" rel="stylesheet">
        <link href="{{asset('/land/css/main.css')}}" rel="stylesheet">
        <!-- end:demo-style -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="{{asset('/land/js/html5shiv.min.js')}}"></script>
<script src="{{asset('/land/js/respond.min.js')}}"></script>
<![endif]-->
    </head>
    <body id="page-home">

        <!-- begin:navbar -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-transparent" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand menus" href="#page-home"><b>TRACK</b>REPS</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden"><a href="#page-home"></a></li>
                        <li><a href="#service">About</a></li>
                        <li><a href="#tech">Technology</a></li>
                        <!--                <li><a href="#social">Career</a></li>-->
                        <li><a href="#about">Our Team</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- end:navbar -->

        <!-- begin:header -->
        <div id="header" style="background-image: url({{ URL::asset('/land/img/img01.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="header-caption">
                            <!-- <h2 class="animated fadeInLeft">TrackReps</h2> -->
                            <div class="logo_div">
                                <img class="logo_img1 fadeInLeft animated" src="{{asset('/land/img/t1.png')}}" alt="">
                                <img class="logo_img2 fadeInUp animated" src="{{asset('/land/img/t2.png')}}" alt="">
                            </div>
                            <div class="animated fadeInDown text-left">
                                <p>TrackReps is an andriod App which aims to provide an active platform to bring the performance
                                    data of each public representative just a tap or click away.</p>
                                <p>Providing a two-way channel between Representatives and Public, TrackReps provides a smart
                                    way to know about <i>Bills</i>, <i>Committees</i> and <i>Acts</i>. </p>
                                <!-- <div class="marg30-top-btm"><a href="#" class="btn btn-lucky btn-xl">Take a tour</a></div> -->
                            </div>
                            <div>
                                <a href="https://play.google.com/store/apps/details?id=com.bops.app.track.reps"> <img
                                                                                                                      src="{{asset('/land/img/Google-Play.png')}}" width="40%"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center wow zoomIn" id="header-img">
                        <img src="{{asset('/land/img/main-page1.png')}}" height="500px"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:header -->

        <!-- begin:service -->
        <div id="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title wow fadeInUp">
                            <h2>About
                                <small>TrackReps</small>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- break -->
                <div class="row">

                    <div class="col-sm-12">
                        <section class="intro wow fadeInDownBig">
                            <p>TrackReps is a young non-profit startup that has secured a generous grant under Making All Voices
                                Count programme (a partnership between Ushahidi, Hivos and IDS) - supported by four donors
                                including DFID, USAID, SIDA and Omidyar Network. </p>
                            <p>TrackReps is responsible for the implementation of the “Empowerment, Voice and Accountability for
                                Better Policy Making” project. The objective of the project is to empower citizens to hold their
                                elected representatives to account. The project will complement the supply-side interventions by
                                increasing demand and strengthening mechanisms for greater and effective citizen participation
                                and monitoring of public services. </p>
                            <p> This includes influencing legislation, policy, practices, and service delivery through greater
                                pressure and demand from the citizens. The project will work through a combination of
                                empowerment, voice and accountability approaches including, but not limited to, awareness
                                raising and mobilization, advocacy and lobbying, capacity building, coalitions and
                                partnerships.</p>
                        </section>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-center wow zoomInUp">
                        <a href="http://www.makingallvoicescount.org/project/trackreps/">
                            <img src="{{asset('/land/img/mavc.svg')}}"/>
                        </a>
                    </div>
                </div>
                <br><br>
                <div class="row">
                   <h2 class="text-center">Progress Report</h2>
                    <div class="col-sm-8"><p>Starting Date:4/15/2016 </p>  </div>
                    <div class="col-sm-4 text-right"> <p>Ending Date:12/31/2016 </p></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" 
                                 role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" 
                                 style="width:20%;" id="demo">

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- end:service -->

        <!-----start:Technology----->

        <div id="tech">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h2 style="color:#333;">Technology</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 wow slideInLeft" data-wow-delay="0.5s">
                        <div class="heading-title">
                            <h3 style="color:#333; text-align:left;">About The Android App!</h3>
                        </div>
                        <section class="intro">
                            <p style="color:#333">
                                TrackReps aims to bring the performance data of each public representative just a tap or click
                                away. Leveraging ICT technologies, a profile of each representative is created with information
                                like bills/laws proposed or developmental projects initiated. Public can use this organized data
                                to make educated voting decisions and ensure accountability. All this organized inside an
                                Android app.
                            </p>
                            <p style="color:#333">
                                This app can be used to keep a check on the performance of elected representatives, which are
                                members of the provincial assembly (MPAs). The vision behind it is to enable citizens to make
                                informed voting decisions, enable transparency and accountability.
                            </p>
                        </section>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <div style="margin-top:-30px" class="wow slideInRight" data-wow-delay="1.5s">
                            <img src="{{asset('/land/img/member.png')}}" height="480px;"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space"></div>
        </div>

        <!---end:Technology------>


        <!-----start:bill, Act and committee----->

        <div id="tech" style="background-color:#ECECEC">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <div class="wow fadeIn" data-wow-delay="0.7s">
                                <div class="heading-title text-center">
                                    <h3 style="color:#333;"> Bills </h3>
                                </div>
                                <div class="wow zoomIn text-center" data-wow-delay="0.7s">
                                    <img src="{{asset('/land/img/bills.png')}}" height="500px"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <div class="wow fadeIn" data-wow-delay="1.5s">
                                <div class="heading-title text-center">
                                    <h3 style="color:#333;"> Committees </h3>
                                </div>
                                <div class="wow zoomIn text-center" data-wow-delay="1.5s">
                                    <img src="{{asset('/land/img/committees.png')}}" height="500px"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <div class="wow fadeIn" data-wow-delay="2s">
                                <div class="heading-title text-center">
                                    <h3 style="color:#333;"> Acts </h3>
                                </div>
                                <div class="wow zoomIn text-center" data-wow-delay="2s">
                                    <img src="{{asset('/land/img/acts.png')}}" height="500px"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space"></div>
        </div>

        <!---end:bill, Act and committee------>


        <!--
<div id="social">

<div class="container">
<div class="row wow fadeIn">
<div class="col-md-12">
<div class="row">
<div class="col-md-12">
<div class="page-title page-title-border">
<h2 style="color:white;">We Are Hiring
<small style="color:white;">Make your future!</small>
</h2>
</div>
</div>
</div>
</div>
<div class="col-md-5 col-sm-5">
<div class="heading-title text-center">
<h3 style="color:white;">About The Position!</h3>
</div>
<section class="intro">
<p style="color:white;">The Project Officer Advocacy & Accountability has the overall responsibility
for implementation of the policy and advocacy activities in the project districts under the
supervision of project board.</p>
<p style="color:white;">The role holder will be working in a team comprising of technical officers
and will be line-managed by the representative of project board. The incumbent of this position
will be required to work in close collaboration with the other technical teams. S/he will also
closely work with the monitoring and evaluation teams for documentation of the changes/reforms
resulting from interventions and the processes that lead to those changes.
</p>
</section>
</div>
<div class="col-sm-2"></div>
<div class="col-md-4 col-sm-4">
<div class="heading-title">
<h3>SPECIFIC TASKS!</h3>
</div>
<section class="intro">
<ul class="text-left">
<li>District Advocacy Forums (DAFs)</li>
<li>Provincial Advocacy Forum (PAF)</li>
<li>Power Change Analysis</li>
<li>DAF Capacity Building Trainings</li>
<li>Support in implementing elected representatives engagement strategy</li>
<li>Identification of case studies, most significant change, challenges, success stories etc for
Newsletters and reports
</li>
<li>Performing any other tasks as agreed with the Advocacy and Accountability Manager</li>
</ul>
</section>
</div>
<div class="col-sm-1"></div>
</div>
<div class="space"></div>
</div>
</div>
-->

        <!-- begin:about -->
        <div id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title wow bounceIn">
                            <h2>Who We Are
                                <small>This is Our Awesome Team!</small>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- break -->
                <div class="row">
                    <!-- <div class="col-md-6 col-sm-6">
<div class="heading-title">
<h3>About Team TrackReps!</h3>
</div>
<section class="intro">
<p>TrackReps is a young non-profit startup that has secured a generous grant under Making All Voices Count programme (a partnership between Ushahidi, Hivos and IDS) - supported by four donors including DFID, USAID, SIDA and Omidyar Network. </p>
</section>
</div> -->
                    <!-- break -->
                    <div class="col-md-12 col-sm-12">
                        <div class="row">

                            <div class="col-md-4 col-sm-4">
                                <div class="team-container">
                                    <img src="{{asset('/land/img/team04.jpg')}}" alt="lucky - business theme"
                                         class="wow slideInRight">
                                    <div class="team-desc wow fadeIn">
                                        <h4>Shehroz Rashid
                                            <small>CEO</small>
                                        </h4>
                                        <ul class="list-inline">
                                            <li><a href="https://twitter.com/shoziart">Twitter</a></li>
                                            <li><a href="https://web.facebook.com/shehroz.rashid.9">Facebook</a></li>
                                            <li><a href="https://pk.linkedin.com/in/shoziart">LinkedIn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="team-container">
                                    <img src="{{asset('/land/img/team03.jpg')}}" alt="lucky - business theme" width="100%"
                                         class="wow slideInUp">
                                    <div class="team-desc wow fadeIn">
                                        <h4>Muhammad Mohsin Tariq
                                            <small>CTO</small>
                                        </h4>
                                        <ul class="list-inline">
                                            <li><a href="https://twitter.com/Mohsin_tariq10">Twitter</a></li>
                                            <li><a href="https://web.facebook.com/muhammadmohsin.tariq">Facebook</a></li>
                                            <li><a href="https://pk.linkedin.com/in/mohsintariq10">LinkedIn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="team-container">
                                    <img src="{{asset('/land/img/team05.jpg')}}" alt="lucky - business theme"
                                         class="wow slideInLeft">
                                    <div class="team-desc wow fadeIn">
                                        <h4>Faran Mahmood
                                            <small>Mentor</small>
                                        </h4>
                                        <ul class="list-inline">
                                            <li><a href="#">Twitter</a></li>
                                            <li><a href="https://web.facebook.com/faran.mahmood.ceo?fref=ts">Facebook</a></li>
                                            <li><a href="#">LinkedIn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="team-container">
                                    <img src="{{asset('/land/img/team07.png')}}" alt="lucky - business theme"
                                         class="wow slideInRight">
                                    <div class="team-desc wow fadeIn">
                                        <h4>Daniyal Suhail Malik
                                            <small>Officer for Advocacy and Accountability</small>
                                        </h4>
                                        <ul class="list-inline">
                                            <!--                                    <li><a href="https://twitter.com/shoziart">Twitter</a></li>-->
                                            <li><a href="
                                                https://m.facebook.com/daniyal.suhail.malik">Facebook</a></li>
                                            <li><a href="https://pk.linkedin.com/in/daniyal-malik-b8823089">LinkedIn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="team-container">
                                    <img src="{{asset('/land/img/team06.png')}}" alt="lucky - business theme" width="100%"
                                         class="wow slideInUp">
                                    <div class="team-desc wow fadeIn">
                                        <h4>Rizwan Mujtaba
                                            <small>Social Media Analyst</small>
                                        </h4>
                                        <ul class="list-inline">
                                            <li><a href="https://twitter.com/rizwan_mujtaba">Twitter</a></li>
                                            <li><a href="https://www.facebook.com/rizwan.mujtaba">Facebook</a></li>
                                            <li><a href="https://www.linkedin.com/in/rizwanmujtaba">LinkedIn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="team-container">
                                    <img src="{{asset('/land/img/team08.png')}}" alt="lucky - business theme"
                                         class="wow slideInRight">
                                    <div class="team-desc wow fadeIn">
                                        <h4>Nauman Asad
                                            <small>Analyst local Engagement</small>
                                        </h4>
                                        <ul class="list-inline">

                                            <!--<li><a href="https://twitter.com/shoziart">Twitter</a></li>-->

                                            <li><a href="https://www.facebook.com/naumanasad2">Facebook</a></li>

                                            <!--<li><a href="https://pk.linkedin.com/in/daniyal-malik-b8823089">LinkedIn</a></li>-->

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <!--
<div class="team-container">

<img src="{{asset('/land/img/team07.png')}}" alt="lucky - business theme"
class="wow slideInRight">
<div class="team-desc wow fadeIn">
<h4>Daniyal Suhail Malik
<small>Officer for Advocacy and Accountability</small>
</h4>
<ul class="list-inline">
<li><a href="https://twitter.com/shoziart">Twitter</a></li>
<li><a href="
https://m.facebook.com/daniyal.suhail.malik">Facebook</a></li>
<li><a href="https://pk.linkedin.com/in/daniyal-malik-b8823089">LinkedIn</a></li>
</ul>
</div>
</div>
-->
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="team-container">
                                    <img src="{{asset('/land/img/madiha.png')}}" alt="lucky - business theme" width="100%"
                                         class="wow slideInUp">
                                    <div class="team-desc wow fadeIn">
                                        <h4>Madiha Zahoor
                                            <small>Web Developer</small>
                                        </h4>
                                        <ul class="list-inline">
                                            <li><a href="https://twitter.com/Madihakhan213">Twitter</a></li>
                                            <li><a href="https://www.facebook.com/developermadiha">Facebook</a></li>
                                            <li><a href="https://pk.linkedin.com/in/devmadiha">LinkedIn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <!--
<div class="team-container">

<img src="{{asset('/land/img/team08.png')}}" alt="lucky - business theme"
class="wow slideInRight">
<div class="team-desc wow fadeIn">
<h4>Nauman Asad
<small>Analyst local Engagement</small>
</h4>
<ul class="list-inline">

<li><a href="https://twitter.com/shoziart">Twitter</a></li>

<li><a href="https://www.facebook.com/naumanasad2">Facebook</a></li>

<li><a href="https://pk.linkedin.com/in/daniyal-malik-b8823089">LinkedIn</a></li>

</ul>
</div>
</div>
-->
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- end:about -->
        <!-- begin:social -->
        <div id="social">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="social-links socialmedia-links">
                            <li class="facebook hint--top hint--bounce wow slideInLeft" data-hint="Facebook TrackReps"><a
                                                                                                                          target="_blank" href="https://web.facebook.com/Trackreps/?fref=ts"><i
                                    class="fa fa-facebook"></i></a></li>

                            <li class="twitter hint--top hint--bounce wow fadeInDownBig" data-hint="twitter @TrackReps"><a
                                                                                                                           target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="linkedin hint--top hint--bounce wow slideInRight" data-hint="Linkedin"><a target="_blank"
                                                                                                                 href="#"><i
                                                                                                                             class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:social -->

        <!-- begin:contact -->
        <div id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h2>Contact Us
                                <small>If you have any questions, please leave us a message.</small>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- break -->
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="col-sm-12" style="padding-left:50px">
                            <form role="form" class="contact-form" action="{{ url('index.php/contactPost') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" class="form-control input-lg" id="name" name="name" placeholder="Name: "
                                           required>
                                    <span class="form-focus-icon focus-icon-name"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email address</label>
                                    <input type="email" class="form-control input-lg" id="email" name="email"
                                           placeholder="Email: "
                                           required>
                                    <span class="form-focus-icon focus-icon-mail"></span>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="sr-only">Message</label>
                                    <textarea class="form-control input-lg" id="message" name="message" placeholder="Message: "
                                              rows="5" required></textarea>
                                    <span class="form-focus-icon focus-icon-message"></span>
                                </div>
                                <button type="submit" class="btn btn-lucky btn-lg" id="submit-btn"><i
                                                                                                      class="fa fa-envelope-o"></i>
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="col-sm-12 text-center">
                            <h4 class="text-uppercase text-xbold">Aditional Information</h4>
                            <address>
                                FF-599 Deans Trade Center,<br>
                                Peshawar, Pakistan <br>
                                trackreps.app@gmail.com<br>
                                <abbr title="Phone">Telp.</abbr> (0092) - 3169776355
                            </address>
                            <div>
                                <iframe
                                        src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FTrackreps%2F&width=87&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId"
                                        width="87" height="21" style="border:none;overflow:hidden" scrolling="no"
                                        frameborder="0"
                                        allowTransparency="true"></iframe>
                            </div>

                            <div>
                                <script>
                                    window.twttr = (function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0],
                                            t = window.twttr || {};
                                        if (d.getElementById(id)) return t;
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "https://platform.twitter.com/widgets.js";
                                        fjs.parentNode.insertBefore(js, fjs);

                                        t._e = [];
                                        t.ready = function (f) {
                                            t._e.push(f);
                                        };

                                        return t;
                                    }(document, "script", "twitter-wjs"));</script>
                                <a class="twitter-follow-button"
                                   href="https://twitter.com/trackrepsapp"
                                   data-size="large">
                                    Follow @trackrepsapp</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 ">

                        <div class="col-sm-12 text-center facebook-review">
                            <iframe
                                    src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTrackreps%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                    width="340" height="500" style="border:none;overflow:hidden;" scrolling="no" frameborder="0"
                                    allowTransparency="true"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:contact -->

        <!-- begin:copyright -->
        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-lucky menus text-center btn-totop" href="#page-home"><i
                                                                                                  class="fa fa-angle-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:copyright -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{asset('/land/js/jquery.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('/land/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
        <script src="{{asset('/land/js/gmap3.min.js')}}"></script>
        <script src="{{asset('/land/js/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('/land/js/jquery.easing.js')}}"></script>
        <script src="{{asset('/land/js/classie.js')}}"></script>
        <script src="{{asset('/land/js/cbpAnimatedHeader.js')}}"></script>
        <script src="{{asset('/land/js/jquery.parallax.js')}}"></script>
        <script src="{{asset('/land/js/script.min.js')}}"></script>
        <script src="{{asset('/land/js/demo.js')}}"></script>
        <script src="{{asset('/land/js/wow.min.js')}}"></script>
        <script src="{{asset('/land/js/sweetalert.min.js')}}"></script>

        <script>
            function parseDate(str) {
                var mdy = str.split('/');
                return new Date(mdy[2], mdy[0]-1, mdy[1]);
            }

            function daydiff(first, second) {
                return Math.round((second-first)/(1000*60*60*24));
            }

            //            document.getElementById("current_date").innerHTML = Date();
            currentDate = new Date();
            currentDate.setHours(0,0,0,0);
            var startingDate = parseDate("4/15/2016");
            var endingDate = parseDate("12/31/2016");
            var totalDays = daydiff(startingDate,endingDate);
            var passedDays = daydiff(startingDate,currentDate);

            var progressPercent = parseInt((passedDays/totalDays) * 100);

            document.getElementById("demo").innerHTML= progressPercent + '%';
            document.getElementById("demo").setAttribute("style", 'width:'+ progressPercent + '%');


        </script>

        <script>
            new WOW().init();
        </script>

        <script>
            $('#submit-btn').click(function () {
                var fname = $('#name').val();
                var femail = $('#email').val();
                //  var fsubject = $('#subject').val();
                var fmessage = $('#message').val();
                console.log(name + email + subject + message);
                var form_data = {
                    name: fname,
                    email: femail,
                    //  subject: 	fsubject,
                    message: fmessage
                };

            });
        </script>




    </body>
</html>
