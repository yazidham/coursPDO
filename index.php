<?php 
require_once '.gitignore/_connec.php'; 

$firstname = "";
$lastname = "";
    
$pdo = new \PDO(DSN, USER, PASS);
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
    <h1>Ajoutez un friend :</h1>
    <form method ="post">
        <div>
            <label for="firstname">Firstname :</label>
            <input type="text" name="firstname" id="firstname">
        </div>
        <div>
            <label for="Lastname">Lastname :</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div>
            <button type="submit">Envoyer</button>
        </div>
    </form>

    <?php
    $errors=[];
    
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if ((trim($_POST['firstname']) === '') || (!isset($_POST['firstname']))){
            $errors[]="firstname invalide";
        }
        if ((trim($_POST['lastname']) === '') || (!isset($_POST['lastname']))){
            $errors[]="lastname invalide";
        }
        
        if(!empty($errors)){
            foreach ($errors as $error){
                echo "<br>" . $error . "<br>";
            }
        }else{
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            
            $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
            $statement = $pdo->prepare($query);
            $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
            $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

            $statement->execute();
            header('Location: succes.php');
        }
    } 
    ?>

</body>
</html>