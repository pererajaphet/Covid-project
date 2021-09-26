<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="description" content="Safe Health vous permet de vous informer si vous avez le virus du COVID-19 via un enregistrement audio.">


<title>Safe Health</title>
<link href="./styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript" async="" src="./Enregistreur/ga.js"></script><script type="text/javascript" src="./jquery1.js"></script>
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


<style>
.label_radio{
    font-weight: normal;
    margin: 0;
    display: block;
}

.additional_info{
    display: none;
}

.additional_info textarea{
    width: 97%;
    font-size: 18px;
}
</style>

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
    


<div class="reg-steps">
    <ul>
        <li class="current">
            <h1>S'inscrire</h1>
        </li>
    </ul>
    <div class="clear"></div>
</div>



<div class="auth_form">
    <h1>Création du nouveau compte</h1>

    

<div>Inscrivez-vous pour pouvoir commencer votre enregistrement audio</div>

<form id="signup_form" method="post" onsubmit="return inscription(event)">
    <label>Pseudo</label>
    <input type="text" name="username" id="username" required><br/>

    <label>Email</label>
    <input type="mail" name="email" id="mail" required><br/>

    <label>Mot de passe</label>
    <input type="password" name="password" id="password" required><br/>

    <div class="buttons">
        <input type="submit" name="formsend" value="S'inscrire" id ="formsend">
    </div>
</form>

</div>

</div>

    <div class="push"></div>
</div>

<script type="text/javascript">
function inscription(event){
    console.log("Test");
    event.preventDefault();
    const username = document.getElementById("username").value;
    const mail = document.getElementById("mail").value;
    const passwd = document.getElementById("password").value;

  if (mail != "" && passwd != ""){
    $.post({
      url : "./signup.php",
      data : {
        username : username, 
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
</script>

</body>

</html>