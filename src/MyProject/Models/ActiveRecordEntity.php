<?php
namespace MyProject\Models;
use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $camelCase = $this->under_score_ToCamelCase($name);
        $this->$camelCase = $value;
    }
    
    private function under_score_ToCamelCase(string $source):string
    {
        return lcfirst(str_replace('_','',ucwords($source, '_')));
    }

    /**@return [] */
    public static function findAll(): array
    {
        $db = new Db();
        return $db->query('SELECT * FROM `'.static::getTableName().'`;', [], static::class);
    }

    public static function getById(int $id): ?self
    {
        $db = new Db();
        $entities = $db->query('SELECT * FROM `'.static::getTableName().'` WHERE `id` = :id;', [':id'=>$id], static::class);
        return $entities ? $entities[0]:null;
    }


    abstract protected static function getTableName():string;


}
