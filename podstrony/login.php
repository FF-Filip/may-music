<!-- 
Example user:
    User: test-user
    Password: pass123

 -->
<?php

if(!empty($_POST))
{
    if(!isset($_POST['user']))
    {
        exit("Niepoprawny login");
    }

    if(!isset($_POST['haslo']))
    {
        exit("Niepoprawne hasło");
    }

    $_SESSION['user'] = $user = $_POST['user'];
    $haslo = $_POST['haslo'];
}
else
{
    $user = "";
    $haslo = "";
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie użytkownika</title>
    <link rel="stylesheet" href="../CSS/center.css">
</head>
<body>

    <div class="kontener center">

        <div>
            <h2>Zaloguj się na stronie:</h2>

            <form action="../index.php" method="post">

                <?php

                echo("Login: <input type='text' name='user' id='login' value='" . $user . "'><br>");
                echo("Hasło: <input type='password' name='haslo' id='haslo' value='" . $haslo . "'>");

                ?>
                
                <br>
                
                <br>
                <button type="submit">Zaloguj się</button>
                <button type="reset">Wyczyść dane</button>

            </form>
        </div>

        <div>
            <h4>Jeżeli nie masz konta utwórz je:</h4>
            <a href="zarejestruj.php">Utwórz konto</a>
        </div>

    </div>

</body>
</html>