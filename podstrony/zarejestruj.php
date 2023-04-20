<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Nowy użytkownik</title>
    <link rel="stylesheet" href="../CSS/center.css">
</head>
<body>
    
    
<div class="kontener center">

    <div>
        Zarejestruj się na stronie:<br>

        <form action="add-user.php" method="post">

            Login* <input type="text" name="user" id="login">
            <br>
            Hasło* <input type="password" name="haslo" id="haslo">
            <br>
            E-mail <input type="email" name="email" id="email">

            <br><br>

            * - Pola wymagane

            <br><br>

            <button type="submit">Zarejestruj się</button>
            <button type="reset">Wyczyść dane</button>

        </form>
    </div>

    <div>
        <h4>Jeżeli masz już konto, zaloguj się:</h4>
        <a href="add-user.php">Zaloguj się</a>
    </div>

</div>

</body>
</html>