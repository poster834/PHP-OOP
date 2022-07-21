<?php
namespace MyProject\Models\Articles;
use MyProject\Models\Users\User;

class Article
{
    /**@var int $id */
    private $id;

    /**@var string $name */
    private $name;
    
    /**@var string $text */
    private $text;

    /**@var int $authorId */
    private $authorId;

    /**@var string $createdAt*/
    private $createdAt;

    public function __set($name, $value)
    {
        $camelCase = $this->under_score_ToCamelCase($name);
        
        $this->$camelCase = $value;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle():string
    {
        return $this->title;
    }

    public function getText():string
    {
        return $this->text;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    private function under_score_ToCamelCase(string $source):string
    {
        return lcfirst(str_replace('_','',ucwords($source, '_')));
    }
}