<?php
namespace MyProject\Controllers;
use MyProject\Services\Db;
use MyProject\View\View;
use MyProject\Models\Articles\Article;

class ArticlesController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__. str_replace('/','\\','/../../templates/'));
        $this->db = new Db();
    }

    public function view(int $articleId)
    {
    $article = Article::getById($articleId);

    // $result = $this->db->query('SELECT * FROM `articles` WHERE `id` = :id;', [':id'=>$articleId], Article::class);

    if ($article === null) {
        $this->view->renderHtml('errors/404.php',[],404);
        return;
    }
    $this->view->renderHtml('articles/view.php',['article'=>$article]);
    
    // var_dump($result);
    }
}