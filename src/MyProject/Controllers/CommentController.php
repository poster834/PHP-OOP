<?php
namespace MyProject\Controllers;
use MyProject\Services\Db;
use MyProject\Models\Comments\Comment;

class CommentController 
{
    public static function getCommentsByArticleId(int $articleId):array 
    {
        $sql = 'SELECT * FROM comments WHERE `article_id` = :articleId;';
        $db = Db::getInstances();
        $result = $db->query($sql, [':articleId' => $articleId], Comment::class) ?? [];
        return $result;
    }

}
