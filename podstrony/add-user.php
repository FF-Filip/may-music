<?php

require("../db/connection.php");
require("../db/regexs.php");

if(!empty($_POST)){
    if(!isset($_POST['user']))
    {
        exit("Niepoprawny login");
    }

    if(!isset($_POST['haslo']))
    {
        exit("Niepoprawne hasło");
    }

    if(preg_match($loginRegex, $_POST['user']) || preg_match($passwordRegex, $_POST['haslo']))
    {
        exit("Niedozwolona nazwa lub hasło użytkownika");
    }

    $user = $_POST['user'];
    $haslo = $_POST['haslo'];
    $email = $_POST['email'];
}
else{
    header("Location: zarejestruj.php");
}

$password = sha1($haslo);

$checkUser = "SELECT password FROM users WHERE user = '$user' AND password = '$password'";

$login_result = $conn->query($checkUser);

if ($login_result->num_rows === 0){
    $insertQuery = "INSERT INTO users VALUES(null, '$user', '$password', '$email', '0')";
    $conn->query($insertQuery);

    setcookie("userSession", $user, time() + 900, "../");
    session_id($user);

    $_SESSION['user'] = $user;
    $_SESSION['haslo'] = $haslo;
    $_SESSION['email'] = $email;
}
else{
    echo ("Użytkownik o podanej nazwie już istnieje");
    echo ("<a href='../index.php'>Strona główna</a>");
}

mysqli_close($conn);

header("Location: login.php");

?>