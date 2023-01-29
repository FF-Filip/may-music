<?php

session_start();

if(!empty($_SESSION))
{
    header('Location: logowanie.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Nowy użytkownik</title>
</head>
<body>
    
    Zarejestruj się na stronie:<br>

    <form action="login.php" method="post">

        Login: <input type="text" name="login" id="login">
        <br>
        Hasło: <input type="password" name="haslo" id="haslo">
        <br>
        <button type="submit">Zarejestruj się</button>
        <button type="reset">Wyczyść dane</button>

    </form>

</body>
</html>