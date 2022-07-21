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
                <h2><a href="articles/<?=$article->getId();?>"><?=$article->getName();?></a></h2>
                <p><?=$article->getText();?></p>

            </td>
        </tr>
        <?php endforeach;?>
        
        <?php include('../src/templates/footer.php');?>