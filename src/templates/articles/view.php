<?php include('../src/templates/header.php');?>

    <h2><?=$article->getName();?></h2>
    <p><?=$article->getText();?></p>
    <p><?=$article->getAuthor()->getNickname();?></p>
    <a href="/www">Главная</a>

<?php include('../src/templates/footer.php');?>