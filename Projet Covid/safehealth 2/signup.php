<?php 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=login', 'root', '');
    session_start();

    include 'db.php';

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);


    $password_ok = false;
    $username_ok = false;
    $email_ok = false;


    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $password_ok = true;

    // $uppercase = preg_match('@[A-Z]@', $password);
    // $lowercase = preg_match('@[a-z]@', $password);
    // $number    = preg_match('@[0-9]@', $password);

    // if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
    //     // $res = [ 'res' => 'msg', 'code' => 200 ];
    //     $res = ["error" => true, "res" => "Mot de passe non conforme"];            
    // } else {
    //     $password = password_hash($password, PASSWORD_DEFAULT);
    // }



    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $usernameCheckreq = $db->prepare("SELECT email, username FROM user WHERE email = ? OR username = ?");
    $usernameCheckreq->execute(array($email,  $username));
    $affectedLines = $usernameCheckreq->rowCount();
    // echo $affectedLines;

    if($affectedLines < 1) {
        $username_ok = true;
        $email_ok = true;            
    } else {
        $res = ["error" => true, "res" => "Email ou nom déjà utilisé"];
    }


    if ($password_ok AND $username_ok AND $email_ok) {
        $req = $db->prepare("INSERT INTO user(username, email, password) VALUES (?, ?, ?)");
        $affectedLines = $req->execute(array(
                                $username, 
                                $email, 
                                $password, 
                            ));

        if ($affectedLines == false) {
            $res = ["error" => true, "res" => "Erreur"];
            // echo "erreur";
        } else {
            $res = ["error" => false, "res" => "Utilisateur enregistré"];
            $_SESSION['connected'] = true; 
        //    header('Location: ./enregistreur.php'); 
            // echo "utilisateur ajouté";
        } 

    }

echo json_encode($res);


?>