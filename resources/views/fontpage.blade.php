<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
 <title> @yield('title')</title>
    <link rel="icon" href="" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('fontend/public/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- jquery-ui -->
    <link href="{{asset('fontend/public/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font-awesome -->
    <link href="{{asset('fontend/public/font-awesome-4.6.3/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- owl carousel -->
    <link href="{{asset('fontend/public/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('fontend/public/owl-carousel/owl.theme.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('fontend/public/owl-carousel/owl.transitions.css')}}" rel="stylesheet" type="text/css" />
    <!-- Style -->
    <link href="{{asset('fontend/public/css/style_web.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Style -->
    <link href="{{asset('fontend/style.css')}}" rel="stylesheet" type="text/css" />
    @stack('css')
</head>
@php
    $extra =DB::table('extras')->first();
@endphp
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <div class="se-pre-con"></div>
    <header class="sTop hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul>
                        <li><i class="fa fa-phone"></i> <a href=""> {{$extra->mobile}} </a></li>
                        <li><i class="fa fa-envelope-o"></i> <a href=""> {{$extra->email}}</a></li>
                    </ul>
                </div>

                <div class="col-sm-6">
                    <ul class="social-icon hidden-xs">
                        <li></li>
                        <li><a href="{{$extra->fb_link}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$extra->twiter_link}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$extra->google_plus}}"><i class="fa fa-google-plus"></i></a></li>

                        
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://doctorssnew.bdtask.com/"></a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll px-4" href="{{url('/')}}">হোম</a></li>
                   
                    <li><a class="page-scroll" href="#appointment">  অ্যাপয়েন্টমেন্ট</a></li>
                    
                    <li><a class="page-scroll" href="{{route('blog')}}">ব্লগ</a></li>
                </ul>
            </div>
        </div>
    </nav>

@yield('content');

   
   
    <footer id="contact">
        <div class="container">
            <div class="row footer-row">
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="address-inner">



                        <div class="address">
                            <i class="fa fa-map-marker"></i>
                            <p> {{$extra->contact}} </p>
                        </div>
                        <div class="address">
                            <i class="fa fa-mobile"></i>
                            <p>{{$extra->mobile}}</p>
                        </div>
                        <div class="address">
                            <i class="fa fa-envelope-o"></i>
                            <p><a href="#"> {{$extra->email}}</a> </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 footer-col">
                    <h4 class="footer-title">সর্বশেষ পোস্ট</h4>
                    <div class="post-widget">
                          @php
                        $releted =DB::table('blogposts')->orderBy('id','desc')->where('status','active')->take('3')->get();
                      @endphp
                        <ul>
                            @foreach ($releted as $last)
                                 <li>
                                <a href="{{ route('blog.details',$last->id) }})" >
                                    <img src="{{asset($last->image)}}" alt="" width="180px">
                                </a> <a href="{{ route('blog.details',$last->id) }}">{{$last->title}}</a> </li>
                            @endforeach
                        

                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 footer-col">
                    <h4 class="footer-title">Google Map</h4>
                    <div class="google-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14537.938969972414!2d88.61599321191363!3d24.36443499150656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754fc8cffffffff%3A0x398330dea7d93595!2sSATT+IT!5e0!3m2!1sen!2sbd!4v1553677064619"  frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <p>Developed By <a href="https://sattit.com/">
                       SATT IT
                    </a></p>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('fontend/public/js/jquery-min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('fontend/public/js/bootstrap.min.js')}}"></script>
    <!-- Scrolling Nav JavaScript -->
    <script src="{{asset('fontend/public/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('fontend/public/js/scrolling-nav.js')}}"></script>
    <script src="{{asset('fontend/public/js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('fontend/public/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('fontend/public/js/custom.js')}}" type="text/javascript"></script>

      @stack('js')

</body>

</html>