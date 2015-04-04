<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPlayAStory</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/pluton.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.mixitup.js') }}" type="text/javascript" ></script>
    <script src="{{ URL::asset('js/modernizr.custom.js') }}" type="text/javascript" ></script>
    <script src="{{ URL::asset('js/jquery.bxslider.js') }}" type="text/javascript" ></script>
    <script src="{{ URL::asset('js/jquery.cslider.js') }}" type="text/javascript" ></script>
    <script src="{{ URL::asset('js/jquery.placeholder.js') }}" type="text/javascript" ></script>
    <script src="{{ URL::asset('js/jquery.inview.js') }}" type="text/javascript" ></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}" type="text/javascript" ></script>
   <script type="text/javascript" href="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
    <script src="{{ URL::asset('js/app.js') }}" type="text/javascript" ></script>
    <style>
/*    * {
        font-family: Verdana, Arial, sans-serif;
    }
    
    a:link {
        color: #000;
        text-decoration: none;
    }
    
    a:visited {
        color: #000;
    }
    
    a:hover {
        color: #33F;
    }
    
    .button {
        background: -webkit-linear-gradient(top, #008dfd 0, #0370ea 100%);
        border: 1px solid #076bd2;
        border-radius: 3px;
        color: #fff;
        display: none;
        font-size: 13px;
        font-weight: bold;
        line-height: 1.3;
        padding: 8px 25px;
        text-align: center;
        text-shadow: 1px 1px 1px #076bd2;
        letter-spacing: normal;
    }
    
    .center {
        padding: 10px;
        text-align: center;
    }
    
    .final {
        color: black;
        padding-right: 3px;
    }
    
    .interim {
        color: gray;
    }
    
    .info {
        font-size: 14px;
        text-align: center;
        color: #777;
        display: none;
    }
    
    .right {
        float: right;
    }
    
    .sidebyside {
        display: inline-block;
        width: 45%;
        min-height: 40px;
        text-align: left;
        vertical-align: top;
    }
    
    #headline {
        font-size: 40px;
        font-weight: 300;
    }
    
    #info {
        font-size: 20px;
        text-align: center;
        color: #777;
        visibility: hidden;
    }
    
    #results {
        font-size: 14px;
        font-weight: bold;
        border: 1px solid #ddd;
        padding: 15px;
        text-align: left;
        min-height: 150px;
    }
    
    #start_button {
        border: 0;
        background-color: transparent;
        padding: 0;
    }*/

    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href=""> <img src="images/logo3.png" width="250" height="100" alt="Logo" /> </a>
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <i class="icon-menu"></i> </button>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#play">Play</a></li>
                        
                        <li><a href="#about">Help</a></li>
                    </ul>
                </div>
                <div>@yield('login_logout')</div>
            </div>
        </div>
    </div>
    <div id="home">
        <div id="da-slider" class="da-slider">
            <div class="triangle"></div>
            <div class="mask"></div>
            <div class="container">
                <div class="da-slide">
                    <h2 class="fittext2">Welcome to iPlayAStory</h2>
                    <h4>Clean & responsive</h4>
                    <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p> <a href="" class="da-link button">Read more</a>
                    <div class="da-img"> <img src="images/55.png" width="320" alt="image01"> </div>
                </div>
                <div class="da-slide">
                    <h2>Easy management</h2>
                    <h4>Easy to use</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p> <a href="" class="da-link button">Read more</a>
                    <div class="da-img"> <img src="images/66.png" width="320" alt="image02"> </div>
                </div>
                <div class="da-slide">
                    <h2>Revolution</h2>
                    <h4>Customizable</h4>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p> <a href="" class="da-link button">Read more</a>
                    <div class="da-img"> <img src="images/77.png" width="320" alt="image03"> </div>
                </div>
                <div class="da-arrows"> <span class="da-arrows-prev"></span> <span class="da-arrows-next"></span> </div>
            </div>
        </div>
    </div>
    <div class="section primary-section" id="play">
        <div class="triangle"></div>
        <div class="container">
            <div class="title">
                <h1>Want to Play?</h1>
                <p>Just choose one of the following</p>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <a href="#"><img class="img-circle" src="images/quiz1.png" alt="service 1"></a>
                        </div>
                        <h3>Quiz</h3>
                        <p>Match the picture to its corresponding text.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <a href="/kids"><img class="img-circle" src="images/kids1.png" alt="service 2" /></a>
                        </div>
                        <h3>Kids</h3>
                        <p>Let's have some fun while reading the story.</p>
                    </div>
                </div>
                <div class="span4">
                    <div class="centered service">
                        <div class="circle-border zoom-in">
                            <a href="#"><img class="img-circle" src="images/parents1.png" alt="service 3"></a>
                        </div>
                        <h3>Parents</h3>
                        <p>Read & Record stories for your kids.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section secondary-section">
        <div class="triangle"></div>
        <div class="container centered">
            <p class="large-text">Confused, huh ? <a href="" style = "color: #FFFFFF;"> Click here </a>to learn more...</p>
        </div>
    </div>
    <div class="footer">
        <p>&copy; iPlayAStory 2015 All Rights Reserved</p>
    </div>
    <div class="scrollup">
        <a href="#"> <i class="icon-up-open"></i> </a>
    </div>
</body>

</html>
