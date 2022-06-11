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
    <title>Dashboard</title>
</head>
<body>
    <section class="dashboard">
        <span class="overlay"></span>
        <div class="leftBarBurger"></div>
        <div class="leftBar">
            <img src="img/camino_logo.jpg" alt="logo">
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="visualisation.php">Visualisation</a></li>
            </ul>
        </div>
        <div class="pannel">
            
            <div class="topBar">
                <img class="menu-icon" src="img/menu.svg" alt="menu">
                <h1>Panneau de contrôle</h1>
            </div>

            <?php

            // Update profile text
            if (!empty($_POST['save'])) {

                if (isset($_POST['visible_update'])) {
                    $isVisible = 1;
                }
                else{
                    $isVisible= 0;
                }

                // Security for apostrophes 
                $_POST['title_update'] = addslashes($_POST['title_update']);

                $update = updateItem($db, $_POST['title_update'], $isVisible, $_POST['item_id']);

                if ($update == false) {
                    echo "Error";

                }
                
            }


            ?>

            <div class="items-container">

            <?php

                $items = selectAllItems($db);

                foreach ($items as $item) {
                    ?>
                    <form method="post" class="item">
                        <div class="item-top">
                            <h3>Item <?php echo $item['id'] ?></h3>
                            <h5>Boîte de gestion</h5>
                        </div>
                        <div class="item-mid">
                            <h4>Titre de l'élément <?php echo $item['id'] ?></h4>
                            <input class="text-input" type="text" name="title_update" value="<?php echo $item['title'] ?>">
                        </div>
                        <div class="item-bottom">
                            <p>Afficher l'élément <?php echo $item['id'] ?></p>
                            <label class="switch">
                                <input type="checkbox" name="visible_update" value="true"
                                <?php if ($item['isVisible']) {echo 'checked';} ?>
                                >
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <input type="hidden" name="item_id" value="<?php echo $item['id'] ?>">
                        <input class="save" type="submit" name="save" value="Enregistrer"> 
                    </form>
                    <?php
                }
            ?>
            </div>
        </div>
    </section>
    <script src="script/script.js"></script>
</body>
</html>