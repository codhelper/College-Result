<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    echo '
    <div class="container">
    <div id="cross">
    <img src="Administrator/cross.png" alt="CUT" id="cut">
    </div>
    <div id="content">
    <div>You didn\t login</div>
    </div>
    <div id="ok">
    <input type="submit" name="submit" id="btn">
    </div>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tt.php" method='get'>
        <input type="text">
        <input type="submit" name='submit'>
    </form>
</body>
</html>