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
    <title>Guess the number</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
</head>

<body class="bg-sky-300">
    <div class="container mx-auto">
        <?php
        if($_SESSION["status"] == "playing"){
            echo 
            "<form action='pages/target.php' method='post' class='bg-sky-400 px-4 my-32 mx-auto max-w-3xl space-y-2 border border-gray-600 rounded-lg'>
                <h1 class='text-center text-4xl antialiased font-bold mt-5'>Guess the number</h1>
                <p class='text-justify'><b>Rules:</b> You have to guess in the less number of attempts a number between 0 and 99 extracted casually
                from the system. Max number of attempts is 5 </p>" . $info .
                "<label for='attempt' class='block text-md font-medium'>Attempt " .  $_SESSION['attempt'] . ":</label>
                <input type='number' name='number' min='0' max='99' class='w-full bg-sky-200 border border-dark-200 rounded-md w-full focus:outline-none focus:border-sky-500 px-2 py-2' required>
                <input type='submit' value='Try' class='bg-blue-500 text-white font-bold py-2 px-4 rounded mb-5  hover:bg-blue-300'>
                <input type='submit' value='Restart' name='try_again' formnovalidate class='bg-blue-500 text-white font-bold py-2 px-4 rounded mb-5 hover:bg-blue-300'>
            </form>";
        }
        if($_SESSION["status"] == "lose"){
            echo
            "<form action='pages/target.php' method='post'  class='bg-sky-400 px-4 my-32 mx-auto max-w-3xl space-y-2 border border-gray-600 rounded-lg'>
            <h1 class='text-4xl antialiased font-bold mt-5'>Sorry, you have tried many times! :(</h1>" . $_SESSION["info"] .
            "<input type='submit' value='Try again' name='try_again' class='bg-blue-500 text-white font-bold py-2 px-4 rounded mb-5  hover:bg-blue-300'>
            </form>";
        }
        if($_SESSION["status"] == "win"){
            echo
            "<form action='pages/target.php' method='post' class='bg-sky-400 px-4 my-32 mx-auto max-w-3xl space-y-2 border border-gray-600 rounded-lg'>
                <h1 class='text-4xl antialiased font-bold mt-5'>Congratulations!🎉</h1>
                <p class='text-justify'> You have won in " . $_SESSION["attempt"]-1 . " attempts!</p>
                <input type='submit' value='Try again' name='try_again' class='bg-blue-500 text-white font-bold py-2 px-4 rounded mb-5  hover:bg-blue-300'>
            </form>";
        }
        ?>
    </div>
</body>

</html>