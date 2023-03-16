<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="UTF-8">
    <title>mayMusic</title>
    <link rel="stylesheet" href="CSS/default.css">
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
$db_user = 'root';
$password = '';
$host = 'localhost';

$user = '';

$conn = new mysqli($host, $db_user, $password, $baza);

if($conn->connect_error)
{
    $conn->close();
    exit("Błąd w połączeniu serwera!");
}

if(isset($_POST['user']) || isset($_SESSION['user']))
{
    if(isset($_POST['user']))
    {
        $temp_user = $_POST['user'];
        $password = sha1($_POST['haslo']);
    }
    else
    {
        $temp_user = $_SESSION['user'];
        $password = $_SESSION['haslo'];
    }

    $checkUser = "SELECT password FROM users WHERE user = '$temp_user' AND password = '$password'";

    $login_result = $conn->query($checkUser);
    if($login_result -> num_rows != 0)
    {
        $user = $_SESSION['user'] = $temp_user;
        $temp_user = "";
    }
    else
    {
        $user = "";
    }
}

?>

<div id="kontener">

    <div class="navBar">
        <h2 class="title">mayMusic</h2>
        <ul>

            <?php
        
            if($user != "")
            {
                echo ('<li><a href="podstrony/new_file.php">Dodaj plik</a></li>');
                echo ('<li><a href="podstrony/wyloguj.php">Wyloguj</a></li>');
                echo ('<li><a href="podstrony/profil.php">Profil</a></li>');
            }
            else
            {
                echo ('<li><a href="podstrony/login.php">Zaloguj się</a></li>');
                echo ('<li><a href="podstrony/zarejestruj.php">Zarejestruj się</a></li>');
            }

            ?>
            
            
        </ul>
    </div>

<?php

?>

    <div class="audio_list">

    <?php

    $getFilesQuery = "SELECT * FROM audios";
    $filesFetch = $conn->query($getFilesQuery);
    
    if($filesFetch -> num_rows != 0)
    {
        while($row = $filesFetch->fetch_assoc())
        {
            echo ('
                <div class="audio_file">
                    <h3>' . $row["nazwa"] . '</h3>
                    <h4>Przesłał: ' . $row["uzytkownik"] . '</h4>
                    <audio controls>
                        <source src="upload\\' . $row["audio_url"] . '" type="audio/mpeg">
                        Twoja przeglądarka nie wspiera elementu audio.
                    </audio>

                </div>
            ');
        }
    }
    else
    {
        echo ("
            <div>
                <h2>Ale tu pusto...</h2>
                <p>
                    Zaloguj się i coś dodaj!
                </p>
            </div>
        ");
    }

    ?>

    </div>

</div>

<?php

    $conn->close();

?>
    
</body>

</html>