<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .center {
        text-align: center;
    }
</style>

<body>

    <?php
        $pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ?>

<div class = center>

        <?php
            $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");       
            $stmt->bindParam(1, $_REQUEST["username"]);
            $stmt->execute();
            $row = $stmt->fetch()
        ?>

        <div>
            <img src='member_photo/<?=$row["username"]?>.jpg' width='100'><br>
            ชื่อสมาชิก: <?=$row ["name"] . "<br>"?>
            ที่อยู่: <?=$row ["address"] . "<br>"?>
            อีเมล์: <?=$row ["email"] . "<br>"?>
        </div>
</div>

</body>
</html>