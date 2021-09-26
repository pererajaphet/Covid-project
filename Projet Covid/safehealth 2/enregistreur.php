<?php 
    session_start(); 
    // echo $_SESSION['connected'];
    if (!isset($_SESSION['connected']) OR !$_SESSION['connected']) {
        header('Location: ./login.php'); 
    } else {
        // if(isset($_SESSION['connected']) AND $_SESSION['connected'] == true){
    ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="description" content="Safe Health vous permet de vous informer si vous avez le virus du COVID-19 via un enregistrement audio.">


        <title>Safe Health</title>
        <link href="./styles.css" rel="stylesheet" type="text/css">

        <script type="text/javascript" async="" src="./Enregistreur/ga.js"></script><script type="text/javascript" src="./Enregistreur/jquery1.js"></script>

        <script>
        function readCookie(name) {
            //http://www.quirksmode.org/js/cookies.html
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }

        function saveReferer() {
            var r = document.referrer;
            if (r) {
                var existingVal = readCookie('src_referer');
                if (!existingVal) {
                    var host = r.split('/')[2];
                    if (host) {
                        host = host.toLowerCase();
                        if (!host.match('speakpipe.com$')) {
                            document.cookie = 'src_referer=' + r + '; expires=31 Dec 2025 20:47:11 UTC; path=/';
                        }
                    }
                }
            }
        }

        function showOnCenter(id){
            var d = $('#' + id);
            d.css("top", (($(window).height() - d.outerHeight()) / 2) + $(window).scrollTop() + "px");
            d.css("left", (($(window).width() - d.outerWidth()) / 2) + $(window).scrollLeft() + "px");
            d.show();
        }

        $(document).ready(function(){
            saveReferer();
            if(window.halloweenPopup){
                window.halloweenPopup();
            }
        });
        </script>

    
        <link href="./site-widget.css" rel="stylesheet" type="text/css">
        <link href="./enregistreur.css" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="./Enregistreur/jquery-1.js"></script>
        <script type="text/javascript" src="./Enregistreur/spin.js"></script><style type="text/css"></style>
        <script src="./Enregistreur/raven.js" crossorigin="anonymous"></script>
        <script>Raven.config('https://444e3a0fb62e454a98de3f322e049502@sentry.io/1259276').install()</script>

    
    <script>
        var siteSettings = {"languageCode": "en", "domain": "https://www.speakpipe.com", "protocol": "https", "isLogEnabled": false, "siteName": "recorder", "publicToken": "recorder", "optin": {"defaultValue": false, "enabled": false, "shortMsg": null}, "isProduction": true, "maxDuration": 300, "siteTypeId": 2, "buildNum": 488, "isDemo": false, "siteId": 31373, "dialog": {"displayName": "Voice recorder", "nameRequired": false, "emailRequired": false, "subscribeEmailLabel": "Abonnez vous à Safe Health pour plus d'informations", "customCSS": null, "whiteLabel": false, "mobileSupport": true, "subscribeEmailEnabled": false, "height": 345, "width": 340, "isFreePlan": true, "buttonBgColor": null, "thankyouMsg": null, "titleText": null, "welcomeMsg": "Vous pouvez créer un enregistrement audio, le sauvegarder, l'envoyer au serveur et avoir un lien du fichier audio."}, "visitorToken": "vUno8F5IhVgQAabD", "audioFormat": "mp3", "isSecureConnection": true};
        var widgetTypeCode = 'free_recorder';
        var clientTypeCode = 'desktop';
    </script>



</head>
<body>

    <div class="wrapper">
        
        <div class="main_header">
        <div class="page_container">
                    <div class="menu_block"><!-- <a href="mailto:japhet.ditsouga.perera@efrei.net">Boite de réception</a>
                        - -->                    <a href="./logout.php">Se déconnecter</a>
                    </div>

            <div class="header">
                <a href="./Enregistreur.php" class="logo">
                </a>
            </div>
        </div>
        </div>


        
    <div class="page_container">
        
    <div class="auth_form">
        
    <div class="speak-container">
        

        <div id="firefox-mic-permission-page" class="dlg-page">
            
    <h1 class="widget-page-title">Activer l'accès à votre microphone</h1>

            <div class="dlg-msg">
                Cliquer "<b>Autoriser</b>" dans le dialogue Firefox.
                Il apparait en haut à gauche de votre fenêtre.
                <p>
                    </p><div class="privacy-respect-msg">Nous respectons votre vie privée.</div>
                <p></p>
            </div>
        </div>

        <div id="chrome-mic-permission-page" class="dlg-page">
            
    <h1 class="widget-page-title">Autoriser l'accès à votre microphone.</h1>

            <div class="dlg-msg">
                Cliquer "<b>Autoriser</b>" dans le dialogue Firefox.
                Il apparait en haut à gauche de votre fenêtre.
                <div class="privacy-respect-msg">Nous respectons votre vie privée.</div>
                <div style="font-size: 12px;">
                    <a target="_blank" href="https://www.speakpipe.com/static/img/help/widget/chrome-permission2.png">Comment activer le micro.</a>
                </div>
            </div>
        </div>

        <div id="generic-mic-permission-page" class="dlg-page">
            
    <h1 class="widget-page-title">Activer l'accès à votre microphone<</h1>

            <div class="dlg-msg">
                Cliquer "<b>Autoriser</b>" dans le dialogue de permission afin d'autoriser l'accès à votre microphne in order to allow access to your microphone.
                <p>
                    </p><div class="privacy-respect-msg">Nous respectons votre vie privée.</div>
                <p></p>
            </div>
        </div>

        <div id="mic-user-denied-page" class="dlg-page">
            
    <h1 class="widget-page-title">Erreur d'accès au microphone.</h1>

            <div class="dlg-msg">
                Vous avez refusé l'accès à votre microphone.
            </div>
            <div class="dlg-action">
                <button class="rc-reload-widget wgt-secondary-btn">Réessayer</button>
            </div>
        </div>

        <div id="mic-browser-denied-page" class="dlg-page">
            
    <h1 class="widget-page-title">Erreur d'accès au microphone</h1>

            <div class="dlg-msg">
                Il semble que votre microphone est ddésactivé dans les réglages de votre navigateur.<br>
                Veuillez vous diriger vers les réglages de votre navigateur et autoriser l'accès à votre microphone.
            </div>
            <div class="dlg-action">
                <button type="button" class="rc-reload-widget wgt-secondary-btn">Réessayer</button>
            </div>
        </div>

        <div id="recorder-error-page" class="dlg-page">
            <div class="status-msg">
            </div>
            <div class="dlg-msg">
            </div>
        </div>

        <div id="ios11-required-page" class="dlg-page">
            
    <h1 class="widget-page-title">Requiet iOS 11 sur Safari</h1>

            <div class="dlg-msg">
                Vous avez besoin d'iOS 11 sur Safari <br> pour utiliser l'enregistreur de votre appareil.
                <p>
                (Ou vous pouvez utiliser l'enregistreur sur votre ordinateur.)
                </p>
            </div>
        </div>

        <div id="open-safari-page" class="dlg-page">
            
    <h1 class="widget-page-title">Ouverture sur Safari</h1>

            <div class="dlg-msg">
                <p class="open-safari-hint">
                    Veuillez cliquer <span class="three-bullets">• • •</span>
                    en haut à droite au coin de l'écran et sélectionner "Ouvrir Safari".
                </p>
                L'enregistrement audio fonctionne uniquement sur Safari.<br>
                Les autres navigateurs ou application d'enregistrement ne supportent pas encore iOS.<br><br>
                Désolé pour l'inconvénient.
            </div>
        </div>

        <div id="open-popup-page" class="dlg-page">
            
    <h1 class="widget-page-title">Accès à votre microphone</h1>

            <div class="dlg-msg">
                Il semble que cette page ne supporte pas un enregistrement en ligne.
            </div>
            <button type="button" class="open-popup-btn wgt-main-btn">Activer le microphone</button>
            <div style="margin-top: 10px;">Le gadget doit être ouvert dans une fenêtre seule pour accéder au microphone.</div>
        </div>

        <!-- Start recording -->
        <div id="start-recording-page" class="dlg-page" style="display: block;">
            
        
    <h1 class="widget-page-title">Enregistreur audio</h1>

        
    <div class="dlg-msg"></div>

        <div class="dlg-note">Votre microphone est prêt ?</div>
        
        
        <button type="button" class="wgt-main-btn start-rec-btn">
                

    <img class="mic-icon" src="./Enregistreur/mic-icon-white.svg">

            <span>Commencer l'enregistrement</span></button>


        <div class="workflow-hint">
            <span class="bullet">1</span> Enregistrer -
            <span class="bullet">2</span> Ecouter -
    		<span class="bullet">3</span> Envoyer
        </div>

        <div class="page-note">
          <pre data-placeholder="Traduction" id="tw-target-text" dir="ltr"><span lang="en"> L'enregistrement audio Safe Heath vous permet d'enregistrer 
     votre toux et nous l'envoyer afin qu'on l'analyse et qu'on 
    vous alerte si vous avez le covid ou non.</span></pre>
          <p>
            Fonctionne sur iPhone, iPad, iPod, et appareil Android.
        </p>

        </div>

        </div>

        <!-- Recording -->
        <div id="recording-page" class="dlg-page">
            
    <h1 class="widget-page-title">Parlez maintenant</h1>

            <div>
                <svg class="mic-img" viewBox="0 0 13.902 27.265"><use xlink:href="#mic-icon-svg"></use></svg>
            </div>
            <!-- <img class="mic-img" src="/static/img/new/main-mic-icon.svg" /> -->
            <div class="recording-duration">00:00</div>
            <div class="dlg-msg">
                Durée maximale
                <b class="max-duration-value">5</b>
                <span class="max-duration-units">minutes</span>
            </div>
            <div class="rec-wave-container">
                <canvas id="rec-wave" width="260" height="60">
                    <div>Votre navigateur ne supporte pas l'élément canvas.</div>
                </canvas>
            </div>
            <button type="button" class="stop-rec-btn wgt-main-btn">
                <img class="stop-icon" src="./Enregistreur/stop-icon-white.svg">
                Stop
            </button>
            <button type="button" class="reset-rec-btn wgt-secondary-btn">
                <img class="reset-icon" src="./Enregistreur/reset-icon-gray.svg">
                Recommencer
            </button>
        </div>

        <!-- Recording warning -->
        <div id="recording-warn-page" class="dlg-page">
            
    <h1 class="widget-page-title"></h1>

            <div class="dlg-msg"></div>
            <div class="dlg-buttons">
                
        
        <button type="button" class="wgt-secondary-btn reload-widget-btn">
            <span>Commencez</span></button>


            </div>
        </div>

        <div id="reset-recording-page" class="dlg-page">
            
    <h1 class="widget-page-title">Recommencer l'enregistrement</h1>

            <div class="dlg-msg">
                Etes-vous sur<br> de commencer un nouvel enregistrement ?
                <br> Votre enregistrement actuel va être supprimé.
            </div>
            <div class="dlg-buttons">
                
        
        <button type="button" class="wgt-secondary-btn confirm-reset-btn">
            <span>Oui</span></button>


                
        
        <button type="button" class="wgt-secondary-btn back-btn">
            <span>Non</span></button>


            </div>
        </div>


        
        <div id="upload-error-page" class="dlg-page">
            <div class="status-msg">
                Oups, il y a une erreur.
            </div>
            <div class="dlg-msg">
                Il y a une erreur durant l'upload de l'audio.
                Veuillez cliquer sur le bouton Réessayer.
            </div>
            <div class="dlg-action">
                <div class="wgt-secondary-btn btn-retry-sending">Réessayer</div>
            </div>
        </div>

        <div id="delivery-error-page" class="dlg-page">
            <div class="status-msg">
                Oups, il y a une erreur.
            </div>
            <div class="dlg-msg">
                Il y a une erreur durant l'upload de l'audio.
                Veuillez cliquer sur le bouton Réessayer.
            </div>
            <div class="dlg-action">
                <div class="wgt-secondary-btn btn-retry-delivery">Réessayer</div>
            </div>
        </div>

        <!-- Progress  -->
        <div id="progress-page" class="dlg-page">
            
    <h1 class="widget-page-title">Upload de l'audio...</h1>

            <div class="progressbar">
                <div></div>
                <span>0%</span>
            </div>
            <div class="fake-indicator">
                <img src="./Enregistreur/dialog-loader.gif">
            </div>
            <div class="dlg-msg">Veuillez ne pas fermer cette page.</div>
        </div>

        <div id="send-recording-page" class="dlg-page">
            
        
    <h1 class="widget-page-title">Sauvegarder l'enregistrement sur le serveur</h1>

        
        <div class="wgt-audio-player">
            <button class="wgt-play-pause-btn wgt-play-icon" type="button">
                <img class="wgt-play-icon-img" src="./Enregistreur/play-icon-gray.svg">
                <img class="wgt-pause-icon-img" src="./Enregistreur/pause-icon-gray.svg">
            </button>
            <div class="wgt-audio-info">
                <div id="-speakpipe-send-msg-duration" class="wgt-audio-duration">00:00</div>
                <div class="wgt-seek-bar">
                    <div class="wgt-played">
                        <div class="wgt-seek-bar-circle"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wgt-author-info">
            <input id="-speakpipe-record-author-name" type="text" placeholder="Your name (optional)" name="your-name" maxlength="60" value="Your name (optional)">
            <input id="-speakpipe-record-author-email" type="text" placeholder="Your email (optional)" name="your-email" maxlength="60" style="display: none;" value="Your email (optional)">
        </div>

        <div class="storage-warn">
            <b>Stockage :</b>
            L'entregistrement est stocké sur le serveur pour trois mois.
        </div>

            
        <div class="dlg-buttons">
            
        
        <button type="button" class="wgt-main-btn send-rec-btn">
                

    <img class="send-icon" src="./Enregistreur/send-icon-white.svg">

            <span>Obtenir un lien</span></button>


            
        
        <button type="button" class="wgt-secondary-btn reset-rec-btn">
                

    <img class="reset-icon" src="./Enregistreur/reset-icon-gray.svg">

            <span>Recommencer</span></button>


        </div>


        </div>

        <!-- Thank you  -->
        <div id="thankyou-page" class="dlg-page">
            
        <div class="dlg-msg">
            Votre message est envoyé.<br>
            Merci beaucoup !
        </div>
        <span class="additional-msg"></span>

        </div>



        
    <div id="play-recording-page" class="dlg-page">
        
    <h1 class="widget-page-title">Votre enregistrement</h1>

        
        <div class="wgt-audio-player">
            <button class="wgt-play-pause-btn wgt-play-icon" type="button">
                <img class="wgt-play-icon-img" src="./Enregistreur/play-icon-gray.svg">
                <img class="wgt-pause-icon-img" src="./Enregistreur/pause-icon-gray.svg">
            </button>
            <div class="wgt-audio-info">
                <div id="-speakpipe-send-msg-duration" class="wgt-audio-duration">00:00</div>
                <div class="wgt-seek-bar">
                    <div class="wgt-played">
                        <div class="wgt-seek-bar-circle"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dlg-buttons">
            
        
        <button type="button" class="wgt-secondary-btn reset-rec-btn">
            <span>Recommencer</span></button>


            
        
        <button type="button" class="wgt-secondary-btn rc-show-send-page">
            <span>Obtenir un lien</span></button>


        </div>
    </div>

    <div id="rec-details-page" class="dlg-page">
        
    <h1 class="widget-page-title">Votre enregistrement a été sauvegardé sur le serveur</h1>


        <div>
            <iframe class="rec-embed-frame" style="width: 100%; height: 130px; margin: 0 0 15px;" src="" frameborder="0"></iframe>
        </div>

        <div class="storage-warn">
            <b>Stockage :</b>
            L'entregistrement est stocké sur le serveur pour trois mois.
        </div>

        <div class="dlg-msg">
            <span>Lien de l'audio :</span>
            (<a class="msg-link" href="#" target="_blank">ouvert dans une autre fenêtre</a>):<br>
            <input class="msg-url" type="text" readonly="readonly">
        </div>
        <div class="shr-section">
            <div style="font-size: 20px; margin: 0 0 5px;">Partager</div>
            <a class="btn-t1" href="#" target="_blank"><img src="./Enregistreur/icon-t1.png"></a>
            <a class="btn-f1" href="#" target="_blank"><img src="./Enregistreur/icon-f1.png"></a>
            <a class="btn-b1" href="#" target="_blank"><img src="./Enregistreur/icon-b1.png"></a>
        </div>
        <div style="margin: 10px 0 20px;">
            <a href="#" class="embed-rec-btn">Incorporer sur une page web</a>
        </div>
        <a class="rc-reset-rec" href="#">
            Créer un autre enregistrement
        </a>
    </div>

    <div id="embed-recording-page" class="dlg-page">
        
    <h1 class="widget-page-title">Incorporer sur une page web</h1>


        <div class="dlg-msg">
            Code incorporé
            <textarea readonly="readonly" class="msg-embed-code"></textarea>
        </div>
        <div class="wgt-secondary-btn back-btn">Retour</div>
    </div>




        <div>
            <audio id="audio-player">
                <source id="audio-player-src" src="">
            </audio>
        </div>

    </div>

    <svg xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" style="display: none;">
        <symbol id="mic-icon-svg" viewBox="0 0 13.902 27.265">
            <path d=" M 11.344 4.393 C 11.344 1.967 9.377 0 6.951 0 C 4.525 0 2.558 1.967 2.558 4.393 L 2.558 5.772 L 11.344 5.772 L 11.344 4.393 Z  M 5.622 4.65 C 5.622 4.909 5.412 5.118 5.154 5.118 C 4.895 5.118 4.686 4.909 4.686 4.65 L 4.686 1.986 C 4.686 1.727 4.895 1.518 5.154 1.518 C 5.412 1.518 5.622 1.727 5.622 1.986 L 5.622 4.65 Z  M 7.419 4.65 C 7.419 4.909 7.209 5.118 6.951 5.118 C 6.692 5.118 6.483 4.909 6.483 4.65 L 6.483 1.986 C 6.483 1.727 6.692 1.518 6.951 1.518 C 7.209 1.518 7.419 1.727 7.419 1.986 L 7.419 4.65 Z  M 9.216 4.65 C 9.216 4.909 9.006 5.118 8.748 5.118 C 8.489 5.118 8.28 4.909 8.28 4.65 L 8.28 1.986 C 8.28 1.727 8.489 1.518 8.748 1.518 C 9.006 1.518 9.216 1.727 9.216 1.986 L 9.216 4.65 Z "></path>
            <path d=" M 2.558 14.15 C 2.558 16.576 4.525 18.543 6.951 18.543 C 9.377 18.543 11.344 16.576 11.344 14.15 L 11.344 6.479 L 2.558 6.479 L 2.558 14.15 Z "></path>
            <path d=" M 13.287 10.442 C 12.947 10.442 12.672 10.717 12.672 11.057 L 12.672 14.149 C 12.672 17.309 10.111 19.87 6.951 19.87 C 3.791 19.87 1.23 17.309 1.23 14.149 L 1.23 11.057 C 1.23 10.717 0.954 10.442 0.615 10.442 C 0.275 10.442 0 10.717 0 11.057 L 0 14.149 C 0.006 17.522 2.43 20.404 5.751 20.989 L 5.751 24.718 L 4.202 24.718 C 4.018 24.718 3.842 24.791 3.711 24.922 C 3.581 25.052 3.508 25.228 3.508 25.412 L 3.508 26.571 C 3.508 26.755 3.581 26.932 3.711 27.062 C 3.842 27.192 4.018 27.265 4.202 27.265 L 9.699 27.265 C 9.883 27.265 10.06 27.192 10.19 27.062 C 10.32 26.932 10.393 26.755 10.393 26.571 L 10.393 25.412 C 10.393 25.228 10.32 25.052 10.19 24.922 C 10.06 24.791 9.883 24.718 9.699 24.718 L 8.151 24.718 L 8.151 20.989 C 11.472 20.404 13.896 17.522 13.902 14.149 L 13.902 11.057 C 13.902 10.894 13.837 10.737 13.722 10.622 C 13.606 10.507 13.45 10.442 13.287 10.442 L 13.287 10.442 Z "></path>
        </symbol>
    </svg>

            <script type="text/javascript" src="./Enregistreur/widget.js"></script>

    </div>

    </div>


        <div class="push"></div>
    </div> 

</body>

</html>
<?php } ?>