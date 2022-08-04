<?php
namespace MyProject\Models\Articles;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;

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

    public function getAuthor():User
    {
        return User::getByID($this->authorId);
    }

    public function setName(string $newName):void
    {
        $this->name = $newName;
    }

    public function setText(string $newText):void
    {
        $this->text = $newText;
    }

    public function setAuthor(User $author):void
    {
        $this->authorId = $author->getID();
    }
    
    public function setCreatedAt(string $date):void
    {
        $this->createdAt = $date;
    }

    public static function createFromArray(array $fields, User $author):Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException("Нет названия статьи");
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException("Нет содержания статьи");
        }

        $article = new Article();
        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);
        $article->save();
        return $article;
    }

}