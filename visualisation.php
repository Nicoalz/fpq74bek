<?php
require('config/config.php');
require('functions/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Visualisation</title>
</head>
<body>
    <section class="visualisation">
    <a href="index.php"> Back to dashboard</a>
    <?php

    $items = selectAllItems($db);

    foreach ($items as $item) {
        if ($item['isVisible'] == 1) {
        ?>
        
        <div class="item-<?php echo $item['id'];?>">
            <p><?php echo $item['title'];?></p>
        </div>
        <?php
        }
        }
    ?>

    </section>
</body>
</html>