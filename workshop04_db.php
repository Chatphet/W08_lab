<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

    <form method="get">
    <input type="text" name="name">
    <input type="submit" value = "ค้นหา">  
    </form>

    <div style="display:flex">

    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
    if (!empty($_GET))
        $value = '%' . $_GET["name"] . '%';
        $stmt->bindParam(1, $value);
        $stmt->execute();
    ?>
    <?php while ($row = $stmt->fetch()) : ?>
        <div style="padding: 15px; text-align: center">
            <img src='member_photo/<?=$row["username"]?>.jpg' width='100'><br>
            ชื่อสมาชิก: <?=$row ["name"] . "<br>"?>
            ที่อยู่: <?=$row ["address"] . "<br>"?>
            อีเมล์: <?=$row ["email"] . "<br>"?>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>