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
        <h4>Wybierz swój plik audio</h4>
        <form action="add-file.php" method="POST"  enctype="multipart/form-data">
            <input type="file" id="plik" name="plik">
            <input type="submit" value="Dodaj">
        </form>
    </div>

</div>
    
</body>
</html>