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

    $user = $_POST['user'];
    $haslo = $_POST['haslo'];
    $email = $_POST['email'];
}
else
{
    header("Location: zarejestruj.php");
}

$conn = new mysqli('localhost', 'root', '' ,'may-music');

$password = sha1($haslo);

$checkUser = "SELECT password FROM users WHERE user = '$user' AND password = '$password'";

$login_result = $conn->query($checkUser);

if ($login_result->num_rows === 0)
{
    echo ($login_result->num_rows);
    $insertQuery = "INSERT INTO users VALUES(null, '$user', '$password', '$email')";
    $conn->query($insertQuery);
}
else
{
    echo ("Użytkownik o podanej nazwie już istnieje");
    echo ("<a href='../index.php'>Strona główna</a>");
}

mysqli_close($conn);

header("Location: login.php");

?>