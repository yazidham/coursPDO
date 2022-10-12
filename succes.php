<?php
require_once '.gitignore/_connec.php'; 

$firstname = "";
$lastname = "";
    
$pdo = new \PDO(DSN, USER, PASS);

$query= "SELECT firstname, lastname FROM friend";
$statement =$pdo->query($query);
$friends = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Friends</h1>
    <h2>ajout du friend reussi</h2>
    <div>
        <?php foreach($friends as $friend):?>
        <ul>
            <li><?php echo $friend['firstname'] . " " .  $friend['lastname'];?></li>
        </ul>
        <?php endforeach ?>
    </div>
</body>
</html>