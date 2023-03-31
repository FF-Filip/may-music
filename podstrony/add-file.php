<?php

session_start();

require("../db/connection.php");
require("../db/regexs.php");

if (isset($_FILES['plik']))
{
    $user = $_SESSION['user'];

    $file = $_FILES['plik'];
    $file_title = $_POST['title'];

    if(preg_match($fileNameRegex, $file['name']))
    {
        exit("Niepoprawna nazwa pliku");
    }

    $file_name = $file['name'];
    $tmp_name = $file['tmp_name'];
    $error = $file['error'];

    if ($error === 0) {
    	$extension = pathinfo($file_name, PATHINFO_EXTENSION);

    	$extension_lowercase = strtolower($extension);

    	$allowed_exstensions = array('mp3', 'wav', 'ogg', 'm4a', 'flac', 'wma');

    	if (in_array($extension_lowercase, $allowed_exstensions)) {
    		
    		$new_audio_name = uniqid('audio-', true) . '.' . $extension_lowercase;
    		$audio_upload_path = '..\\upload\\' . $new_audio_name;
            echo ($audio_upload_path);

    		move_uploaded_file($tmp_name, $audio_upload_path);

            $insertQuery = "INSERT INTO audios VALUES(NULL, '$file_title', '$new_audio_name', '$user')";

            $conn->query($insertQuery);
            
            header("Location: ../index.php");
            
    	}else {
    		exit("Nie możesz dodawać plików tego typu");
    	}
    }
}
else
{
    echo ("<a href='../index.php'>Do strony głównej...</a>");
    exit("Błąd w przetwarzaniu pliku");
}
    
?>