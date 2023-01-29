<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="UTF-8">
    <title>mayMusic</title>
    <link rel="stylesheet" href="CSS/NavBar.css">
    <link rel="stylesheet" href="CSS/index.css">

    <style>

        *{
            margin: 0;
            padding: 0;
        }

        body{
            min-height: 100vh;
        }

    </style>

</head>

<body>

<?php

    $baza = 'may-music';
    $user = 'root';
    $password = '';
    $host = 'localhost';

?>

<div id="kontener">

    <div class="navBar">
        <h2 id="title">mayMusic</h2>
        <ul>
            <a href="podstrony/new-file.php">Dodaj plik</a>
        </ul>
    </div>

<?php

    $conn = mysqli_connect($host, $user, $password, $baza);

    if($conn->connect_error)
    {
        $conn->close();
        exit("Błąd w połączeniu do serwera!");
    }

?>

    <div class="audio_list">

    <?php



    ?>

        <div class="audio_file">

            <audio controls>
                <source src="audio-files/bass.wav" type="audio/mpeg">
                Twoja przeglądarka nie wspiera elementu audio.
            </audio>

        </div>

    <?php



    ?>

    </div>

</div>

<?php

    $conn->close();

?>
    
</body>

</html>