<?php 
session_start();

include 'db.php';

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);


$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$result = $db->prepare("SELECT password FROM user WHERE email = ?");
$result->execute(array($email));
$result = $result->fetch();
// var_dump($result);

if($result !== false){
		$hashed_password = $result["password"];	

		if(password_verify($password, $hashed_password)) {
			$res = ["error" => false, "res" => "Connecté"];
			$_SESSION['connected'] = true;
			// header('Location: ./enregistreur.php');  
	} else {
		$res = ["error" => true, "res" => "Email ou mot de passe incorrect"];
	} 	
} else {
	$res = ["error" => true, "res" => "Email ou mot de passe incorrect"]; 
}

echo json_encode($res);
?>