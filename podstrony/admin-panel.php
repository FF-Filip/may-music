<?php

session_start();

require_once("../db/connection.php");

$checkAdmin = "SELECT isAdmin FROM users WHERE user = '" . $_SESSION['user'] . "'";
$result = $conn->query($checkAdmin);

while($row = $result->fetch_assoc())
{
    if($row["isAdmin"] == 0)
    {
        header("Location: ../index.php");
        exit();
    }
}

$getFilesQuery = "SELECT * FROM audios";
$filesFetch = $conn->query($getFilesQuery);
$getIDQuery = "SELECT id FROM audios";;

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="../CSS/new_file.css">
</head>

<body>

<div class="center">

    <div class="border-box">
        
<?php
if($filesFetch -> num_rows != 0)
{
    echo(`
    <h2>Usuń pliki audio:</h2>
    <form action="admin-panel.php" method="POST">
        <select name="doUsuniecia">`);
        ?>

        <?php
        echo(`</select>
        <input type="submit" value="Usuń">
    </form>
    `);
    while($row = $filesFetch->fetch_assoc())
    {
        echo ('
            <div class="audio_file">
                <h3>' . $row["nazwa"] . '</h3>
                <h4>' . $row["id"] . '</h4>
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
            <h2>Brak plików do zarządania</h2>
            <p>
                Zaloguj się i coś dodaj!
            </p>
        </div>
    ");
}
?>
    <br><a href='../index.php'>Do strony głównej...</a>
    </div>

</div>
    
</body>

</html>

<?php



$conn->close();

?>