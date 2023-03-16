<?php

session_start();

if(isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
}
else
{
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Profil użytkownika</title>
    <link rel="stylesheet" href="../CSS/center.css">
</head>
<body>

    <div class="kontener center">

        <div>

            <h1>

                <?php

                echo($user);

                echo ("<a href='../index.php'>Do strony głównej...</a>");

                ?>

            </h1>
            
        </div>

    </div>

</body>
</html>