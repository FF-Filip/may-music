<?php

session_start();

if(!empty($_POST))
{
    if(!isset($_POST['login']))
    {
        session_destroy();
        exit("Niepoprawny login");
    }

    if(!isset($_POST['haslo']))
    {
        session_destroy();
        exit("Niepoprawne hasło");
    }

    $_SESSION['login'] = $_POST['login'];
    $_SESSION['haslo'] = $_POST['haslo'];

    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
}
elseif(!empty($_SESSION))
{
    $login = $_SESSION['login'];
    $haslo = $_SESSION['haslo'];
}
else
{
    $login = "";
    $haslo = "";
}

$conn = mysqli_connect('localhost', 'root', '' ,'rejestracja_uzytkownikow');

if(mysqli_fetch_row(mysqli_query($conn, "SELECT id FROM uzytkownicy WHERE login = '$login'")) == 0)
{
    $insertQuery = mysqli_query($conn, "INSERT INTO uzytkownicy VALUES(null, '$login', '$haslo');");
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie użytkownika</title>
</head>
<body>
    
    Zaloguj się na stronie:<br>

    <form action="../index.php" method="post">

        <?php

        echo("Login: <input type='text' name='login' id='login' value='" . $login . "'><br>");
        echo("Hasło: <input type='password' name='haslo' id='haslo' value='" . $haslo . "'>")

        ?>
        
        <br>
        
        <br>
        <button type="submit">Zaloguj się</button>
        <button type="reset">Wyczyść dane</button>

    </form>

</body>
</html>