<?php
session_start();

$_SESSION["status"] = $_SESSION["status"] ?? "playing";
$info = $_SESSION["info"] ?? "";
if (!isset($_SESSION["attempt"])) {
    $_SESSION["attempt"] = 1;
}

if (!isset($_SESSION["maxAttempts"])) {
    $_SESSION["maxAttempts"] = 5;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>-->
</head>

<body>
    <div class="container mx-auto">
        <p class='text-center text-2xl antialiased'><b>Guess the number</b></p>
        <?php
        if($_SESSION["status"] == "playing"){
            echo 
            "<p class='text-justify'><b>Rules:</b> You have to guess in the less number of attempts a number between 0 and 99 extracted casually
                from the system.</p>" . $info .
            "<form action='pages/target.php' method='post'>
                <label for='attempt'>Attempt " .  $_SESSION['attempt'] . ":</label>
                <input type='number' name='number'>
                <input type='submit' value='Try'>
            </form>";
        }
        if($_SESSION["status"] == "lose"){
            echo
            "<p class='text-justify'>Sorry, you have tried many times!</p>" .
            "<form action='pages/target.php' method='post'>
                <input type='submit' value='Try again' name='try_again'>
            </form>";
        }
        if($_SESSION["status"] == "win"){
            echo
            "<p class='text-justify'>Congratulations! You have won in " . $_SESSION["attempt"]-1 . " attempts!</p>" .
            "<form action='pages/target.php' method='post'>
                <input type='submit' value='Try again' name='try_again'>
            </form>";
        }
        ?>

        
    </div>
</body>

</html>