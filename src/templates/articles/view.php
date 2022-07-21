<?php include('../src/templates/header.php');?>


<h2><a href="articles/<?=$article->getId();?>"><?=$article->getName();?></a></h2>
                <p><?=$article->getText();?></p>
                
                <a href="/www">Главная</a>

        
        <?php include('../src/templates/footer.php');?>