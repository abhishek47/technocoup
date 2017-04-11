
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}>
<head>
<meta charset="utf-8">
<title>TechnoCoup | Key To Creative Inventions</title>
<!-- Stylesheets -->
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/revolution-slider.css" rel="stylesheet">
<link href="/css/slider-setting.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="/css/responsive.css" rel="stylesheet">

<link href="/css/preloader.css" rel="stylesheet">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

 <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body >

<div class="page-wrapper">
       
       <div id="preloader">
        <div class="loop-wrapper" >
          <h2><span>On The</span> Way...</h2>
          <div class="sun"></div>
          <div class="mountain"></div>
          <div class="hill"></div>
          <div class="tree"></div>
          <div class="tree"></div>
          <div class="tree"></div>
           <div class="rock"></div>
          <div class="truck"></div>
          <div class="wheels"></div>
        </div> 
       </div> 

  

    
    <!-- Main Header / Header Style One-->
    <header class="main-header header-style-one" style="display: none;">
        <!-- Header Top One-->
        <div class="header-top-one">
            <div class="auto-container">
                <div class="clearfix">
                    
                    <!--Top Left-->
                    <div class="top-left top-links">
                        <ul class="clearfix">
                            <li><a href="#">Welcome to TechnoCoup</a></li>
                        </ul>
                    </div>
                    
                    <!--Top Right-->
                    <div class="top-right">
                        <ul class="social-links clearfix">
                            <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                    
                </div>
                
            </div>
        </div><!-- Header Top One End -->
        
        
        <!-- Header Lower -->
        <div class="header-lower">
            <div class="main-box">
                <div class="auto-container">
                    <div class="outer-container clearfix">
                        <!--Logo Box-->
                        <div class="logo-box">
                            <div class="logo"><a href="index.html" title="Penza"><img src="images/logo.png" style="height: 70px;" alt="TechnoCoup" title="TechnoCoup"></a></div>
                        </div>
                        
                        <!--Nav Outer-->
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="/">Home</a> </li>
                                        <li><a href="/about">About Us</a> </li>
                                        
                                        <li ><a href="/products">Products</a>
                                            <ul>
                                                <li><a href="projects.html">Logistics</a></li>
                                                <li><a href="project-single.html">Automobiles</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/posts">Blog</a></li>
                                        <li><a href="/contact">Contact Us</a></li>

                                        @if (Auth::guest())
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        @else
                                            <li class="dropdown">
                                                <a href="#">
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <ul>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        
                                     </ul>
                                </div>
                            </nav><!-- Main Menu End-->

                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="post" action="blog.html">
                                                    <div class="form-group">
                                                        <input type="search" name="field-name" value="" placeholder="Search Here">
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div><!--Nav Outer End-->
                        
                    </div>    
                </div>
            </div>
        </div>
        
        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="index.html" class="img-responsive" title="Penza"><img src="images/logo-small.png" alt="Penza" title="Penza"></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="/">Home</a></li>
                                        <li><a href="/about">About Us</a> </li>
                                        
                                        <li ><a href="/products">Products</a>
                                            <ul>
                                                <li><a href="projects.html">Logistics</a></li>
                                                <li><a href="project-single.html">Automobiles</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/posts">Blog</a></li>
                                        <li><a href="/contact">Contact Us</a></li>

                                        @if (Auth::guest())
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        @else
                                            <li class="dropdown">
                                                <a href="#">
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <ul>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        
                                     </ul>
                                </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div><!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->
    
    @yield('content');
    
    
    <!--Main Footer-->
    <footer class="main-footer">
        
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Footer Column-->
                    <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget about-widget">
                            <div class="widget-content">
                                <div class="footer-logo"><a href="index.html"><img src="images/logo-2.png" alt=""></a></div>
                                <div class="desc-text">Perspiciatis unde omnis iste natus sit volutat em accusantium dolore.Perspiciatis unde omnis iste natus sit volutatem</div>
                                <ul class="contact-info">
                                    <li><div class="icon"><span class="fa fa-phone"></span></div>(1800) 123 4567</li>
                                    <li><div class="icon"><span class="fa fa-map-marker"></span></div> 121 Rain St, Melbourne 3000 Australia.</li>
                                    <li><div class="icon"><span class="fa fa-envelope-o"></span></div>Info@consulting.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget posts-widget">
                            <h2>Recent Posts</h2>
                            <div class="widget-content">
                                <!--Post-->
                                <div class="post">
                                    <figure class="post-thumb img-circle"><a href="#"><img class="img-circle" src="images/resource/post-thumb-1.jpg" alt=""></a></figure>
                                    <div class="text"><a href="#">Proffesional solutions for your business.</a></div>
                                    <div class="post-meta">
                                        <ul class="clearfix">
                                            <li><a href="#">Dec 30, 2016</a></li>
                                            <li><a href="#"><span class="fa fa-commenting-o"></span> 2 Comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Post-->
                                <div class="post">
                                    <figure class="post-thumb img-circle"><a href="#"><img class="img-circle" src="images/resource/post-thumb-2.jpg" alt=""></a></figure>
                                    <div class="text"><a href="#">Money Market Rates Finding the in 2016</a></div>
                                    <div class="post-meta">
                                        <ul class="clearfix">
                                            <li><a href="#">Dec 18, 2016</a></li>
                                            <li><a href="#"><span class="fa fa-commenting-o"></span> 8 Comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Footer Column-->
                    <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget subscribe-widget">
                            <h2>News Letter</h2>
                            <div class="widget-content">
                                <div class="newsletter-form">
                                    <form method="post" action="contact.html">
                                        <div class="form-group">
                                            <input type="text" name="name" value="" placeholder="Name *" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="" placeholder="Email *" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="theme-btn btn-style-three">Submit Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                 </div>
             </div>
         </div>

         <!--Footer Bottom-->
         <div class="footer-bottom">
            <div class="auto-container">
                <div class="text">TechnoCoup &copy; 2017 | All Rights Reserved.Powered By <a target="_blank" href="http://www.trumpetstechnologies.com">Trumpets.</a></div>
            </div>
         </div>

    </footer>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>


<script src="/js/jquery.js"></script> 

<script type="text/javascript">
jQuery(document).ready(function($) {  

// site preloader -- also uncomment the div in the header and the css style for #preloader
$(window).load(function(){
    
    $('#preloader').delay(5000).fadeOut('slow',function(){
          $(this).remove();
          $('.main-header').fadeIn('fast');
      });
   
});

});

</script>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/revolution.min.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/owl.js"></script>
<script src="/js/wow.js"></script>
<script src="/js/appear.js"></script>
<script src="/js/script.js"></script>
</body>
</html>


