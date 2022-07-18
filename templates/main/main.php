<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <tr>
            <td colspan="2" class="header">
                Мой блог.
            </td>
        </tr>
        <tr>
            <td>
                <?php foreach ($articles as $article):?>
                <h2><?=$article['name'];?></h2>
                <p><?=$article['text'];?></p>
                <hr>
                <?php endforeach;?>
            </td>
            <td width="300px" class="sidebar">
                <div class="sidebarHeader">Меню</div>
                <ul>
                    <li><a href="/www" id="">Главная страница</a></li>
                    <li><a href="/about-me" id="">Обо мне</a></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="footer" colspan="2">Все права защищены(с) Мой Блог - <?=date('Y')?>г.</td>
        </tr>
    </table>
</body>
</html>