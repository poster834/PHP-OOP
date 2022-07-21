<?php include('../src/templates/header.php');?>

    <table class='layout'>
        <tr>
            <td colspan='2' class='header'>
                Мой блог
            </td>
        </tr>
        <?php foreach ($articles as $article):?>
        <tr>
            <td>
                <h2><a href="articles/<?=$article['id'];?>"><?=$article['name'];?></a></h2>
                <p><?=$article['text'];?></p>
                <p>Автор: <?=$article['nickname'];?></p>
                <!-- <p><?php var_dump($article);?></p> -->
            </td>
        </tr>
        <?php endforeach;?>
        
        <?php include('../src/templates/footer.php');?>