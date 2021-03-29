<?php
if(!empty($_POST["name"])) {
	setcookie ("name",$_POST["name"]);
	header("Location: play.php");
	die();
	//add game php here
}else{
	setcookie ("name", false);
	setcookie ("score", false);
	setcookie ("difficulty", false);
	header("Location: login.php");
	die();
}//For refrence how to change score
//setcookie ("score",$_COOKIE["score"]-5,time()+ 8700);
?>
