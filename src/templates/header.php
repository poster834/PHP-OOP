<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../www/style.css">
    <title>Блог</title>

</head>
<body>
<div id='userLogin'>

<?php
if(!empty($user)){
    echo 'Привет, '.$user->getNickname() .' | <a href="/www/users/logout">Выйти</a>';
    if ($user->isAdmin()) {
        echo '<br><a href="/www/admin">АдминПанель</a>';
        echo '<br><a href="/www">Главная страница</a>';
    }
} else {
    echo '<a href="/www/users/login">Вход</a> | <a href="/www/users/register">Регистрация</a>';  
}   

?>


</div>


