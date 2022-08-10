<?php
namespace App\Controller;

class ArticlesController extends AppController
{
  // NOTE: http://localhost/articles/index
  public function index()
  {
      $this->loadComponent('Paginator');
      $articles = $this->Paginator->paginate($this->Articles->find());
      $this->set(compact('articles'));
  }
}