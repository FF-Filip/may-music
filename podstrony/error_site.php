<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Problem?</title>
</head>

<body>

<?php

if(isset($_GET['error']))
{

?>

    <?=$_GET['error']?>

<?php

}

?>
    
</body>

</html>