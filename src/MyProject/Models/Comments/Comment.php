<?php
namespace MyProject\Models\Comments;
use MyProject\Models\ActiveRecordEntity;

class Comment extends ActiveRecordEntity
{
    /**@var string */
    protected $commentDate;
    /**@var string */
    protected $commentText;
    /**@var int $userId */
    protected $userId;
    /**@var int $articleId */
    protected $articleId;

    protected static function getTableName(): string
    {
        return 'comments';
    }

  
}