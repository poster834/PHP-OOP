<?php include('../src/templates/header.php');?>


                <h2><?=$article['name'];?></h2>
                <p><?=$article['text'];?></p>
                <p>Автор: <?=$article['nickname'];?></p>
                <a href="/www">Главная</a>

        
        <?php include('../src/templates/footer.php');?>