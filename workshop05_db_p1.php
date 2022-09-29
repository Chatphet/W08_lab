<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    a {
        text-decoration: none;
    }
    .center {
        text-align: center;
    }
</style>

<body>
<?php
    $pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
?>

<div class = center>
    <?php while ($row = $stmt->fetch()) { ?>
        <a href="workshop05_db_p2.php?username=<?=$row["username"]?>" >
            <img src="member_photo/<?=$row["username"]?>.jpg" width="100"><br>
        </a>
        <a href="workshop05_db_p2.php?username=<?=$row["username"]?>" >
         ชื่อสมาชิก: <?=$row ["name"] . "<br>"?>
        </a>
        <?php echo "<hr>\n";?>
    <?php } ?>
</div>   

</body>
</html>