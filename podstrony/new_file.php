<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj nowy plik</title>
    <link rel="stylesheet" href="../CSS/new_file.css">
</head>
<body>

<div class="center">

    <div class="border-box">
        <h2>Dodaj nowy plik audio:</h2>
        <form action="add-file.php" method="POST" enctype="multipart/form-data">
            <input type="file" id="plik" name="plik" required><br>
            <input type="text" name="title" id="title" required><br>
            <input type="submit" value="Dodaj">
        </form>
    </div>

    <footer>Dozwolone rozszerzenia: mp3, m4a, flac, wma, ogg, wav</footer>

</div>
    
</body>
</html>