<?php
namespace MyProject\Models\Articles;
use MyProject\Models\ActiveRecordEntity;

class Article extends ActiveRecordEntity
{
    /**@var string $name */
    protected $name;
    
    /**@var string $text */
    protected $text;

    /**@var int $authorId */
    protected $authorId;

    /**@var string $createdAt*/
    protected $createdAt;

    public function getName():string
    {
        return $this->name;
    }

    public function getText():string
    {
        return $this->text;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }
}