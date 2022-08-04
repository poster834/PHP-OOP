<?php 
use MyProject\Models\Users\UsersAuthService; 
?>
<?php include('../src/templates/header.php');?>

    <h2><?=$article->getName();?></h2>
    <p><?=$article->getText();?></p>
    <p><?=$article->getAuthor()->getNickname();?></p>
    <br>
    <?php if($user !== null && $user->isAdmin()):    ?>
    <a href="<?=$article->getId();?>/edit">Редактировать</a>
    <br>
    <?php endif;?>
    <a href="/www">Главная</a>

<?php include('../src/templates/footer.php');?>