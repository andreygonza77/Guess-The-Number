<?php
session_start();

if(!isset($_SESSION["attempt"])){
    $_SESSION["attempt"] = 1;
}
else{
    $_SESSION["attempt"]++;
}
if(!isset($_SESSION["maxAttempts"])){
    $_SESSION["maxAttempts"] = 5;
}
else{
    $_SESSION["maxAttempts"]--;
}

if(!isset($_SESSION["status"])){
    $_SESSION["status"] = "playing";
}

if(isset($_POST["try_again"])){
    session_destroy();
    header("Location: ../index.php");
    exit;
}
if(!isset($_SESSION["random"])){
    $_SESSION["random"] = rand(0, 99);
}



$number = isset($_POST["number"]) ? (int)$_POST["number"] : 0;

if($number == $_SESSION["random"]){
    $_SESSION["status"] = "win";
    header("Location: ../index.php");
    exit;
}
if($_SESSION["maxAttempts"] == 0){
    $_SESSION["status"] = "lose";
    header("Location: ../index.php");
    exit;
}

if($number > $_SESSION["random"]){
    $_SESSION["info"] = "The number you have written is bigger, " . $_SESSION["maxAttempts"] . " attempts left";
    header("Location: ../index.php");
    exit;
}
if($number < $_SESSION["random"]){
    $_SESSION["info"] = "The number you have written is smaller, " . $_SESSION["maxAttempts"] . " attempts left";
    header("Location: ../index.php");
    exit;
}


?>