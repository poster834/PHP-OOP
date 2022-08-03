<?php
namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Exceptions\NotFoundException;

use \Error;

class ArticlesController extends AbstractController
{

    public function view(int $articleId)
    {
    $article = Article::getById($articleId);


    if ($article === null) {
        throw new NotFoundException();
    }

    $articleAuthor = User::getByID($articleId);
    $this->view->renderHtml('articles/view.php',['article'=>$article]);
    
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);
        if ($article === null) {
          throw new NotFoundException();
          
        }
        $article->setName('Новое название статьи');
        $article->setText('Новый текст');
        $article->save();
    }

    public function add(): void
    {
        $article = new Article();
        $author = User::getByID(1);
        $article->setName('Название новой статьи');
        $article->setText('Текст новой статьи');
        $article->setAuthor($author);
        $article->setCreatedAt(date('Y-m-d H:i:s'));
        $article->save();
    }

    public function delete(int $id): void
    {
        $article = Article::getById($id);
        if ($article instanceof Article) {
            var_dump($article);
            $article->delete();
             echo "Статья ".$id. " успешно удалена";
        } else {
            $this->view->renderHtml('errors/notFound.php',['error'=>new Error()],404); 
        }
       
    }
}