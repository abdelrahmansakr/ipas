<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> iPlayAStory </title>
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
    <script src="https://cdn.webrtc-experiment.com/RecordRTC.js"></script>
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
    }
*/
    </style>
</head>

<body>
    <video id="preview" controls style="border: 0px solid rgb(15, 158, 238); height: 0px; width: 0px; display:none;"></video>
    <button id="record" style="display:none;"> Record </button>
    <button id="stop" disabled style="display:none;"> Stop </button>
    <div id="container" style="display:none;"></div>
    <script>
    function transcribe_redirect(blob_transcript) {
        var link = "story1_transcript.php?transcript=";
        var res_link = link.concat(blob_transcript);
        window.location = res_link;
        return;
    }
    var record = document.getElementById('record');
    var stop = document.getElementById('stop');
    var deleteFiles = document.getElementById('delete');
    var audio = document.querySelector('audio');
    var recordVideo = document.getElementById('record-video');
    var preview = document.getElementById('preview');
    var container = document.getElementById('container');
    var isFirefox = true;
    var recordAudio, recordVideo;

    function recordphp() {
        record.disabled = true;
        navigator.getUserMedia({
            audio: true,
            video: false
        }, function(stream) {
            preview.src = window.URL.createObjectURL(stream);
            preview.play();
            recordAudio = RecordRTC(stream, {
                onAudioProcessStarted: function() {
                    if (!isFirefox) {
                        recordVideo.startRecording();
                    }
                }
            });
            if (isFirefox) {
                recordAudio.startRecording();
            }
            if (!isFirefox) {
                recordVideo = RecordRTC(stream, {
                    type: 'video'
                });
                recordAudio.startRecording();
            }
            stop.disabled = false;
        }, function(error) {
            alert(JSON.stringify(error, null, '\t'));
        });
    }
    var fileName;

    function stoprecordphp(blob_transcript) {
        record.disabled = false;
        stop.disabled = true;
        preview.src = '';
        fileName = Math.round(Math.random() * 99999999) + 99999999;
        if (!isFirefox) {
            recordAudio.stopRecording(function() {
                PostBlob(recordAudio.getBlob(), 'audio', fileName + '.wav', blob_transcript);
            });
        } else {
            recordAudio.stopRecording(function(url) {
                preview.src = url;
                PostBlob(recordAudio.getBlob(), 'audio', fileName + '.wav', blob_transcript);
            });
        }
        if (!isFirefox) {
            recordVideo.stopRecording(function() {
                PostBlob(recordVideo.getBlob(), 'video', fileName + '.webm', blob_transcript);
            });
        }
        deleteFiles.disabled = false;
    }

    function xhr(url, data, progress, percentage, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                callback(request.responseText);
            }
        };
        if (url.indexOf('delete.php') == -1) {
            request.upload.onloadstart = function() {
                percentage.innerHTML = 'Upload started...';
            };
            request.upload.onprogress = function(event) {
                progress.max = event.total;
                progress.value = event.loaded;
                percentage.innerHTML = 'Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%";
            };
            request.upload.onload = function() {
                percentage.innerHTML = 'Saved!';
            };
        }
        request.open('POST', url);
        request.send(data);
    }
    window.onbeforeunload = function() {
        if (!!fileName) {
            deleteAudioVideoFiles();
            return 'It seems that you\'ve not deleted audio/video files from the server.';
        }
    };

    </script>
    <script src="https://cdn.webrtc-experiment.com/commits.js" async></script>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href=""> <img src="images/logo3.png" width="250" height="100" alt="Logo" /> </a>
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <i class="icon-menu"></i> </button>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#play">Play</a></li>
                        <li><a href="home">Login | Signup</a></li>
                        <li><a href="#about">Help</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="play">
        <div id="da-slider" class="da-slider">
            <div class="mask"></div>
            <div class="container"> 
                <!-- <img src="images/stories/bear/beach_1.png" alt="1" style="width:800px;height:450px;position:absolute;left:15%;top:10%;"> --> 
                @yield('image')
            </div>
        </div>
    </div>
    <div class="section primary-section" id="play">
        <div class="container">
            <div class="title">
                <h2 style="color:white;">
                    <!-- I love the beach! But I must wear a hat to keep the sun off my face. -->
                    @yield('text')
                </h2>
                <button id="start_button" onclick="startButton(event)"> <img id="start_img" src="images/mic.gif" alt="Start"> </button>
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
    <div class="footer">
        <p> &copy; iPlayAStory 2015 All Rights Reserved </p>
    </div>
    <div class="scrollup">
        <a href="#"> <i class="icon-up-open">
</i> </a>
    </div>
    <div id="info">
        <p id="info_start"></p>
        <p id="info_speak_now"> Speak now. </p>
        <p id="info_no_speech"> No speech was detected. You may need to adjust your <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
</a> . </p>
        <p id="info_no_microphone" style="display:none"> No microphone was found. Ensure that a microphone is installed and that <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
</a></p>
        <p id="info_allow"> Click the "Allow" button above to enable your microphone. </p>
        <p id="info_denied"> Permission to use microphone was denied. </p>
        <p id="info_blocked"> Permission to use microphone is blocked. To change, go to chrome://settings/contentExceptions#media-stream </p>
        <p id="info_upgrade"> Web Speech API is not supported by this browser. Upgrade to <a href="//www.google.com/chrome">
Chrome
</a></p>
    </div>
    <div style="visibility:hidden;">
        <div class="right"></div>
        <div id="results"> <span id="final_span" class="final">
</span> <span id="interim_span" class="interim">
</span>
            <p>
        </div>
        <div class="center">
            <div class="sidebyside" style="text-align:right">
                <button id="copy_button" class="button" onclick="copyButton()"> Copy and Paste </button>
                <div id="copy_info" class="info"> Press Control-C to copy text.
                    <br> (Command-C on Mac.) </div>
            </div>
            <div class="sidebyside">
                <button id="email_button" class="button" onclick="emailButton()"> Create Email </button>
                <div id="email_info" class="info"> Text sent to default email application.
                    <br> (See chrome://settings/handlers to change.) </div>
            </div>
            <p>
                <div id="div_language">
                    <select id="select_language" onchange="updateCountry()"> </select> &nbsp;&nbsp;
                    <select id="select_dialect" style="display:none;"> </select>
                </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script>
    var langs = [
        ['Afrikaans', ['af-ZA']],
        ['Bahasa Indonesia', ['id-ID']],
        ['Bahasa Melayu', ['ms-MY']],
        ['Català', ['ca-ES']],
        ['Čeština', ['cs-CZ']],
        ['Deutsch', ['de-DE']],
        ['English', ['en-AU', 'Australia'],
            ['en-CA', 'Canada'],
            ['en-IN', 'India'],
            ['en-NZ', 'New Zealand'],
            ['en-ZA', 'South Africa'],
            ['en-GB', 'United Kingdom'],
            ['en-US', 'United States']
        ],
        ['Español', ['es-AR', 'Argentina'],
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
            ['es-VE', 'Venezuela']
        ],
        ['Euskara', ['eu-ES']],
        ['Français', ['fr-FR']],
        ['Galego', ['gl-ES']],
        ['Hrvatski', ['hr_HR']],
        ['IsiZulu', ['zu-ZA']],
        ['Íslenska', ['is-IS']],
        ['Italiano', ['it-IT', 'Italia'],
            ['it-CH', 'Svizzera']
        ],
        ['Magyar', ['hu-HU']],
        ['Nederlands', ['nl-NL']],
        ['Norsk bokmål', ['nb-NO']],
        ['Polski', ['pl-PL']],
        ['Português', ['pt-BR', 'Brasil'],
            ['pt-PT', 'Portugal']
        ],
        ['Română', ['ro-RO']],
        ['Slovenčina', ['sk-SK']],
        ['Suomi', ['fi-FI']],
        ['Svenska', ['sv-SE']],
        ['Türkçe', ['tr-TR']],
        ['български', ['bg-BG']],
        ['Pусский', ['ru-RU']],
        ['Српски', ['sr-RS']],
        ['한국어', ['ko-KR']],
        ['中文', ['cmn-Hans-CN', '普通话 (中国大陆)'],
            ['cmn-Hans-HK', '普通话 (香港)'],
            ['cmn-Hant-TW', '中文 (台灣)'],
            ['yue-Hant-HK', '粵語 (香港)']
        ],
        ['日本語', ['ja-JP']],
        ['Lingua latīna', ['la']]
    ];
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
    var span_transcript = '';
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
            span_transcript = final_span.innerHTML;
            if (final_transcript || interim_transcript) {
                showButtons('inline-block');
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
        return s.replace(first_char, function(m) {
            return m.toUpperCase();
        });
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
            var delay = 4000;
            setTimeout(function() {
                recognition.stop();
                stoprecordmp4();
            }, delay);
        } else {
            recordmp4();
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
    <section class="experiment" style="visibility:hidden;">
        <h2 class="header">
Logs
</h2>
        <ol id="logs-preview"></ol>
    </section>
    <section class="experiment" style="visibility:hidden;">
        <div class="inner">
            <audio id="audio-preview" controls></audio>
            <button id="record-audio"> Record </button>
            <button id="stop-recording-audio" disabled> Stop </button>
        </div>
    </section>
    <script>
    var recordaudio;
    var audioPreview = document.getElementById('audio-preview');
    var inner = document.querySelector('.inner');
    var audioFile = !!navigator.mozGetUserMedia ? 'audio.gif' : 'audio.webm';

    function recordmp4() {
        this.disabled = true;
        navigator.getUserMedia({
            audio: true
        }, function(stream) {
            audioPreview.src = window.URL.createObjectURL(stream);
            recordaudio = RecordRTC(stream, {
                type: 'audio'
            });
            recordaudio.startRecording();
        }, function(error) {
            throw error;
        });
        document.querySelector('#stop-recording-audio').disabled = false;
    }

    function stoprecordmp4() {
        this.disabled = true;
        recordaudio.stopRecording(function(url) {
            audioPreview.src = url;
            audioPreview.download = audioFile;
            log('<a href="' + workerPath + '" download="ffmpeg-asm.js">ffmpeg-asm.js</a> file download started. It is about 18MB in size; please be patient!');
            convertStreams(recordaudio.getBlob());
        });
    }
    var workerPath = 'https://4dbefa02675a4cdb7fc25d009516b060a84a3b4b.googledrive.com/host/0B6GWd_dUUTT8WjhzNlloZmZtdzA/ffmpeg_asm.js';

    function processInWebWorker() {
        var blob = URL.createObjectURL(new Blob(['importScripts("' + workerPath + '");var now = Date.now;function print(text) {postMessage({"type" : "stdout","data" : text});};onmessage = function(event) {var message = event.data;if (message.type === "command") {var Module = {print: print,printErr: print,files: message.files || [],arguments: message.arguments || [],TOTAL_MEMORY: message.TOTAL_MEMORY || false};postMessage({"type" : "start","data" : Module.arguments.join(" ")});postMessage({"type" : "stdout","data" : "Received command: " +Module.arguments.join(" ") +((Module.TOTAL_MEMORY) ? ".  Processing with " + Module.TOTAL_MEMORY + " bits." : "")});var time = now();var result = ffmpeg_run(Module);var totalTime = now() - time;postMessage({"type" : "stdout","data" : "Finished processing (took " + totalTime + "ms)"});postMessage({"type" : "done","data" : result,"time" : totalTime});}};postMessage({"type" : "ready"});'], {
            type: 'application/javascript'
        }));
        var worker = new Worker(blob);
        URL.revokeObjectURL(blob);
        return worker;
    }
    var worker;

    function convertStreams(audioBlob) {
        var aab;
        var buffersReady;
        var workerReady;
        var posted;
        var fileReader = new FileReader();
        fileReader.onload = function() {
            aab = this.result;
            postMessage();
        };
        fileReader.readAsArrayBuffer(audioBlob);
        if (!worker) {
            worker = processInWebWorker();
        }
        worker.onmessage = function(event) {
            var message = event.data;
            if (message.type == "ready") {
                log('<a href="' + workerPath + '" download="ffmpeg-asm.js">ffmpeg-asm.js</a> file has been loaded.');
                workerReady = true;
                if (buffersReady) postMessage();
            } else if (message.type == "stdout") {
                log(message.data);
            } else if (message.type == "start") {
                log('<a href="' + workerPath + '" download="ffmpeg-asm.js">ffmpeg-asm.js</a> file received ffmpeg command.');
            } else if (message.type == "done") {
                log(JSON.stringify(message));
                var result = message.data[0];
                log(JSON.stringify(result));
                var blob = new Blob([result.data], {
                    type: 'audio/mp4'
                });
                log(JSON.stringify(blob));
                PostBlob(blob);
            }
        };
        var postMessage = function() {
            posted = true;
            worker.postMessage({
                type: 'command',
                arguments: ['-i', audioFile, '-c:v', 'mpeg4', '-b:v', '6400k', '-strict', 'experimental', 'output.mp4'],
                files: [{
                    data: new Uint8Array(aab),
                    name: audioFile
                }]
            });
        };
    }

    function PostBlob(blob) {
        var h2 = document.createElement('h2');
        inner.appendChild(h2);
        document.querySelector('#record-audio').disabled = false;
        var fileType = 'audio';
        var fileName = Math.round(Math.random() * 99999999) + 99999999 + '.mp4';
        var formData = new FormData();
        formData.append(fileType + '-filename', fileName);
        formData.append(fileType + '-blob', blob);
        xhr('save3.php', formData, function(fileURL) {
            window.open(fileURL);
        });
        transcribe_redirect(final_transcript);
    }

    function xhr(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                callback(location.href + request.responseText);
            }
        };
        request.open('POST', url);
        request.send(data);
    }
    var logsPreview = document.getElementById('logs-preview');

    function log(message) {
        var li = document.createElement('li');
        li.innerHTML = message;
        logsPreview.appendChild(li);
        li.tabIndex = 0;
        li.focus();
    }

    </script>
</body>

</html>
