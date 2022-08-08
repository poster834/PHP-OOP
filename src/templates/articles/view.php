<?php 
use MyProject\Models\Users\UsersAuthService; 
?>
<?php include('../src/templates/header.php');?>
<br><a href="/www">Главная</a><br>
    <h2><?=$article->getName();?></h2>
    <p><?=$article->getText();?></p>
    <p><?=$article->getAuthor()->getNickname();?></p>
    <br>
    <?php if($user !== null && $user->isAdmin()):    ?>
    <a href="<?=$article->getId();?>/edit">Редактировать</a>
    <br>
    <?php endif;?>
    <?php if($user != null): ?>
        <h3>Добавить комментарий:</h3>
        <form action="<?=$article->getId();?>/comments" method="post">
        Текст комментария: <textarea type="text" name="commentText" ><?= $_POST['commentText'] ?? '' ?></textarea>
        <br>
        <input type="submit" value="Комментировать">
        </form>
    <?php else:?>    
        <p>Для возможности оставлять комментарии зарегистрируйтесь!</p>
    <?php endif;?>

<h3>Комментарии</h3>
<pre>
<?php var_dump($comments);?>
<!-- <?php foreach ($comments as $comment):?>
    <div><?= $comment->getCommentDate();?></div>
<?php endforeach;?> -->
<br>
<?php include('../src/templates/footer.php');?>