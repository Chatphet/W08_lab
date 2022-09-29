<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
?>
    <?php while ($row = $stmt->fetch()) { ?>
        <img src="member_photo/<?=$row["username"]?>.jpg" width="100"><br>
        ชื่อสมาชิก: <?=$row ["name"] . "<br>"?>
        ที่อยู่: <?=$row ["address"] . "<br>"?>
        อีเมล์: <?=$row ["email"] . "<br>"?>
        <?php echo "<hr>\n";?>
    <?php } ?>

</body>
</html>