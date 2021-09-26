<?php
    session_start();
    if(isset($_SESSION["connected"]) != false){
        echo $_SESSION["connected"];
    };
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="description" content="Safe Health vous permet de vous informer si vous avez le virus du COVID-19 via un enregistrement audio.">


<title>Safe Health</title>
<link href="./styles.css" rel="stylesheet" type="text/css">

<script type="text/javascript" async="" src="./Enregistreur/ga.js"></script><script type="text/javascript" src="./Enregistreur/jquery1.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
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




</head>
<body>

<div class="wrapper">
    
    <div class="main_header">
    <div class="page_container">
                <div class="auth_block">
                    <a class="signup" href="./inscription.php">S'inscrire</a>
                    <a href="./login.php">Se connecter</a>
                </div>

        <div class="header">
            <a href="./login.php" class="logo">
            </a>
        </div>
    </div>
    </div>


    
<div class="page_container">
    
<div class="auth_form">
<!--
<div class="ssl_secure">
    <img src="/static/img/GandiSSL_A_standard_en.png" />
</div>
-->

<h1>Se connecter</h1>


Pas de compte ? <a style="color: blue;" href="./inscription.php">S'inscrire</a>



<form method="post" onsubmit="return connection(event)">

    <label>Email</label>
    <input type="mail" name="email" id="mail">

    <label>Mot de passe</label>
    <input type="password" name="password" id="password">
    <div>
        <input type="checkbox" id="stay_signed_in" name="stay_signed_in" checked="checked">
        <label class="for_checkbox" for="stay_signed_in">Rester connecté</label>
    </div>

    <div class="buttons">
        <input type="submit" value="Sign in" id="valider">
    </div>

</form>
</div>

</div>


    <div class="push"></div>
</div>



<div class="footer">
    <div class="page_container"> </div>
</div>

<script type="text/javascript">
function connection(event){
    console.log("test");
    event.preventDefault();
    const mail = document.getElementById("mail").value;
    const passwd = document.getElementById("password").value;

  if (mail != "" && passwd != ""){
    $.post({
      url : "./signin.php",
      data : { 
        email : mail,
        password : passwd
        },
      dataType: "json",
      success : function(res){
        if (res["error"] == true) {
            Swal.fire( 'Echec', res["res"], 'error');
        } else {
            Swal.fire('Succès', 'Connecté', 'success');
            window.location.replace("./enregistreur.php");
        }
      }
      });    
  } else {
   alert("Tous les champs ne sont pas remplis");
  }      
}

// document.getElementById("valider").addEventListener("click", function(event){});

</script>

</body>


</html>