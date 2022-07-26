<?php
namespace MyProject\Controllers;
use MyProject\Services\Db;
use MyProject\View\View;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class ArticlesController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__. str_replace('/','\\','/../../templates/'));
        $this->db =Db::getInstances();
    }

    public function view(int $articleId)
    {
    $article = Article::getById($articleId);

    if ($article === null) {
        $this->view->renderHtml('errors/404.php',[],404);
        return;
    }

    $articleAuthor = User::getByID($articleId);

    $this->view->renderHtml('articles/view.php',['article'=>$article]);
    
    }
}