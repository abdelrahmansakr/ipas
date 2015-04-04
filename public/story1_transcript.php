<!DOCTYPE html>
<!--
* A Design by GraphBerry
* Author: GraphBerry
* Author URL: http://graphberry.com
* License: http://graphberry.com/pages/license
-->
<html lang="en">

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pluton Theme by BraphBerry.com</title>
    <!-- Load Roboto font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Load css styles -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/pluton.css" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
<link rel="stylesheet" type="text/css" href="css/animate.css" />
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
<link rel="shortcut icon" href="images/ico/favicon.ico">

<style>
/*  * {
    font-family: Verdana, Arial, sans-serif;
  }
  a:link {
    color:#000;
    text-decoration: none;
  }
  a:visited {
    color:#000;
  }
  a:hover {
    color:#33F;
  }
  .button {
    background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
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
    background-color:transparent;
    padding: 0;
  }*/
</style>







</head>

<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href="index.php">
                    <img src="images/logo3.png" width="250" height="100" alt="Logo" />
                    <!-- This is website logo -->
                </a>
                <!-- Navigation button, visible on small resolution -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-menu"></i>
                </button>
                <!-- Main navigation -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#play">Play</a></li>
                        <li><a href="#portfolio">Login | Signup</a></li>
                        <li><a href="#about">Help</a></li>
                    </ul>
                </div>
                <!-- End main navigation -->
            </div>
        </div>
    </div>


    <!-- Start home section -->
    <div id="play">
        <!-- Start cSlider -->
        <div id="da-slider" class="da-slider">
            <!-- <div class="triangle"></div> -->
            <!-- mask elemet use for masking background image -->
            <div class="mask"></div>
            <!-- All slides centred in container element -->
            <div class="container">

                <img  src="images/stories/bear/beach_1.png" alt="1" style="width:800px;height:450px;position:absolute;left:15%;top:10%;" >

            </div>
        </div>
    </div>
    <!-- End home section -->
    <!-- Service section start -->
    <div class="section primary-section" id="play">
        <!--  <div class="triangle"></div> -->
        <div class="container">
            <!-- Start title section -->
            <div class="title">
                <h2>You said: </h2>
                <h2 style="color:white;"><?php echo $_GET["transcript"]; ?></h2>
                <!-- Section's title goes here -->
<!--   <button id="start_button" onclick="startButton(event)">
    <img id="start_img" src="mic.gif" alt="Start"></button> -->
                    <!--Simple description for section goes here. -->
                </div>
            </div>


         <div class="row-fluid">
                <div class="span4">
                    <div class="centered service">
                        <p></p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Service section end -->


        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; iPlayAStory 2015 All Rights Reserved</p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>


<div id="info">
    <p id="info_start">Click on the microphone icon and begin speaking.</p>
    <p id="info_speak_now">Speak now.</p>
    <p id="info_no_speech">No speech was detected. You may need to adjust your
    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
    microphone settings</a>.</p>
    <p id="info_no_microphone" style="display:none">
    No microphone was found. Ensure that a microphone is installed and that
    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
    microphone settings</a> are configured correctly.</p>
    <p id="info_allow">Click the "Allow" button above to enable your microphone.</p>
    <p id="info_denied">Permission to use microphone was denied.</p>
    <p id="info_blocked">Permission to use microphone is blocked. To change,
    go to chrome://settings/contentExceptions#media-stream</p>
    <p id="info_upgrade">Web Speech API is not supported by this browser.
    Upgrade to <a href="//www.google.com/chrome">Chrome</a>
    version 25 or later.</p>
</div>

<div style="visibility:hidden;">
    <div class="right">
    </div>
    
    <div id="results">
<span id="final_span" class="final"></span>
<span id="interim_span" class="interim"></span>
<p>
    </div>

    <div class="center">
        <div class="sidebyside" style="text-align:right">
            <button id="copy_button" class="button" onclick="copyButton()">
            Copy and Paste</button>
            <div id="copy_info" class="info">
                Press Control-C to copy text.<br>(Command-C on Mac.)
            </div>
        </div>
     
        <div class="sidebyside">
            <button id="email_button" class="button" onclick="emailButton()">
            Create Email</button>
            <div id="email_info" class="info">
                Text sent to default email application.<br>
                (See chrome://settings/handlers to change.)
            </div>
        </div>
        <p>

        <div id="div_language">
            <select id="select_language" onchange="updateCountry()"></select>
            &nbsp;&nbsp;
            <select id="select_dialect" style="display:none;"></select>
        </div>
    </div>
</div>




        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->

        <!-- css3-mediaqueries.js for IE8 or older -->
<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="js/app.js"></script>
<script>
var langs =
[['Afrikaans',       ['af-ZA']],
['Bahasa Indonesia',['id-ID']],
['Bahasa Melayu',   ['ms-MY']],
['Català',          ['ca-ES']],
['Čeština',         ['cs-CZ']],
['Deutsch',         ['de-DE']],
['English',         ['en-AU', 'Australia'],
['en-CA', 'Canada'],
['en-IN', 'India'],
['en-NZ', 'New Zealand'],
['en-ZA', 'South Africa'],
['en-GB', 'United Kingdom'],
['en-US', 'United States']],
['Español',         ['es-AR', 'Argentina'],
['es-BO', 'Bolivia'],
['es-CL', 'Chile'],
['es-CO', 'Colombia'],
['es-CR', 'Costa Rica'],
['es-EC', 'Ecuador'],
['es-SV', 'El Salvador'],
['es-ES', 'España'],
['es-US', 'Estados Unidos'],
['es-GT', 'Guatemala'],
['es-HN', 'Honduras'],
['es-MX', 'México'],
['es-NI', 'Nicaragua'],
['es-PA', 'Panamá'],
['es-PY', 'Paraguay'],
['es-PE', 'Perú'],
['es-PR', 'Puerto Rico'],
['es-DO', 'República Dominicana'],
['es-UY', 'Uruguay'],
['es-VE', 'Venezuela']],
['Euskara',         ['eu-ES']],
['Français',        ['fr-FR']],
['Galego',          ['gl-ES']],
['Hrvatski',        ['hr_HR']],
['IsiZulu',         ['zu-ZA']],
['Íslenska',        ['is-IS']],
['Italiano',        ['it-IT', 'Italia'],
['it-CH', 'Svizzera']],
['Magyar',          ['hu-HU']],
['Nederlands',      ['nl-NL']],
['Norsk bokmål',    ['nb-NO']],
['Polski',          ['pl-PL']],
['Português',       ['pt-BR', 'Brasil'],
['pt-PT', 'Portugal']],
['Română',          ['ro-RO']],
['Slovenčina',      ['sk-SK']],
['Suomi',           ['fi-FI']],
['Svenska',         ['sv-SE']],
['Türkçe',          ['tr-TR']],
['български',       ['bg-BG']],
['Pусский',         ['ru-RU']],
['Српски',          ['sr-RS']],
['한국어',            ['ko-KR']],
['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
['cmn-Hans-HK', '普通话 (香港)'],
['cmn-Hant-TW', '中文 (台灣)'],
['yue-Hant-HK', '粵語 (香港)']],
['日本語',           ['ja-JP']],
['Lingua latīna',   ['la']]];

for (var i = 0; i < langs.length; i++) {
    select_language.options[i] = new Option(langs[i][0], i);
}
select_language.selectedIndex = 6;
updateCountry();
select_dialect.selectedIndex = 6;
showInfo('info_start');

function updateCountry() {
    for (var i = select_dialect.options.length - 1; i >= 0; i--) {
        select_dialect.remove(i);
    }
    var list = langs[select_language.selectedIndex];
    for (var i = 1; i < list.length; i++) {
        select_dialect.options.add(new Option(list[i][1], list[i][0]));
    }
    select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}

var create_email = false;
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
if (!('webkitSpeechRecognition' in window)) {
    upgrade();
} else {
    start_button.style.display = 'inline-block';
    var recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;

    recognition.onstart = function() {
        recognizing = true;
        showInfo('info_speak_now');
        start_img.src = 'images/mic-animate.gif';
    };

    recognition.onerror = function(event) {
        if (event.error == 'no-speech') {
            start_img.src = 'images/mic.gif';
            showInfo('info_no_speech');
            ignore_onend = true;
        }
        if (event.error == 'audio-capture') {
            start_img.src = 'images/mic.gif';
            showInfo('info_no_microphone');
            ignore_onend = true;
        }
        if (event.error == 'not-allowed') {
            if (event.timeStamp - start_timestamp < 100) {
                showInfo('info_blocked');
            } else {
                showInfo('info_denied');
            }
            ignore_onend = true;
        }
    };

    recognition.onend = function() {
        recognizing = false;
        if (ignore_onend) {
            return;
        }
        start_img.src = 'images/mic.gif';
        if (!final_transcript) {
            showInfo('info_start');
            return;
        }
        showInfo('');
        if (window.getSelection) {
            window.getSelection().removeAllRanges();
            var range = document.createRange();
            range.selectNode(document.getElementById('final_span'));
            window.getSelection().addRange(range);
        }
        if (create_email) {
            create_email = false;
            createEmail();
        }
    };

    recognition.onresult = function(event) {
        var interim_transcript = '';
        for (var i = event.resultIndex; i < event.results.length; ++i) {
            if (event.results[i].isFinal) {
                final_transcript += event.results[i][0].transcript;
            } else {
                interim_transcript += event.results[i][0].transcript;
            }
        }
        final_transcript = capitalize(final_transcript);
        final_span.innerHTML = linebreak(final_transcript);
        interim_span.innerHTML = linebreak(interim_transcript);
        if (final_transcript || interim_transcript) {
            showButtons('inline-block');
        }
        if (final_transcript) {
            var link = "http://localhost/iPlayAStory/google.php?transcript=";
            var res_link = link.concat(final_transcript);

            window.location = res_link;
// $.ajax
// (   {
//     type: "POST",
//     url: "http://localhost/iPlayAStory/google.php",
//     data: {final_transcript : final_transcript}, 
//     success: function(response)
//     { window.location = "http://localhost/iPlayAStory/google.php"; }
// }
// );

// $.post("http://localhost/iPlayAStory/google.php", {
//     variable:final_transcript
// }, function(data) {
// if (data != "") {
// window.location = "http://localhost/iPlayAStory/google.php";
// }
// });
}
};
}

function upgrade() {
    start_button.style.visibility = 'hidden';
    showInfo('info_upgrade');
}

var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
    return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

var first_char = /\S/;
function capitalize(s) {
    return s.replace(first_char, function(m) { return m.toUpperCase(); });
}

function createEmail() {
    var n = final_transcript.indexOf('\n');
    if (n < 0 || n >= 80) {
        n = 40 + final_transcript.substring(40).indexOf(' ');
    }
    var subject = encodeURI(final_transcript.substring(0, n));
    var body = encodeURI(final_transcript.substring(n + 1));
    window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
}

function copyButton() {
    if (recognizing) {
        recognizing = false;
        recognition.stop();
    }
    copy_button.style.display = 'none';
    copy_info.style.display = 'inline-block';
    showInfo('');
}

function emailButton() {
    if (recognizing) {
        create_email = true;
        recognizing = false;
        recognition.stop();
    } else {
        createEmail();
    }
    email_button.style.display = 'none';
    email_info.style.display = 'inline-block';
    showInfo('');
}

function startButton(event) {
    if (recognizing) {
        recognition.stop();
        return;
    }
    final_transcript = '';
    recognition.lang = select_dialect.value;
    recognition.start();
    ignore_onend = false;
    final_span.innerHTML = '';
    interim_span.innerHTML = '';
    start_img.src = 'images/mic-slash.gif';
    showInfo('info_allow');
    showButtons('none');
    start_timestamp = event.timeStamp;
}

function showInfo(s) {
    if (s) {
        for (var child = info.firstChild; child; child = child.nextSibling) {
            if (child.style) {
                child.style.display = child.id == s ? 'inline' : 'none';
            }
        }
        info.style.visibility = 'visible';
    } else {
        info.style.visibility = 'hidden';
    }
}

var current_style;
function showButtons(style) {
    if (style == current_style) {
        return;
    }
    current_style = style;
    copy_button.style.display = style;
    email_button.style.display = style;
    copy_info.style.display = 'none';
    email_info.style.display = 'none';
}
</script>
</body>
</html>