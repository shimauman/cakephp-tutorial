<?php
namespace App\Controller;

class ArticlesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    // NOTE: http://localhost/articles/index
    public function index()
    {
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }

    public function view($slug = null)
    {
        // NOTE:  動的なファインダー である findBySlug() を使用することにより アクションを開始します。このメソッドは、与えられたスラグによって記事を検索する基本的なクエリーを 作成することができます。その時、最初のレコードを取得するか NotFoundException を投げるか のいずれかをする firstOrFail() を使います。
        $article = $this->Articles
            ->findBySlug($slug)
            ->contain('Tags')
            ->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            // NOTE: データを保存するために、まず POST データを Article エンティティーに 「変換 (marshal)」します。
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            $article->user_id = 1;

            if ($this->Articles->save($article)) {
                // NOTE: フラッシュメッセージは、リダイレクトした後の次のページ上で表示されます。
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }

        $tags = $this->Articles->Tags->find('list')->all();
        $this->set('tags', $tags);

        $this->set('article', $article);
    }

    public function edit($slug)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->contain('Tags') // NOTE: 関連するTagsを読み込む
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }

        $tags = $this->Articles->Tags->find('list')->all();
        $this->set('tags', $tags);

        $this->set('article', $article);
    }

    public function delete($slug)
    {
        // NOTE: ウェブクローラーが誤ってすべてのコンテンツを削除する可能性があるため、 GET リクエストを使用してコンテンツを削除することは とても 危険です。 それでコントローラーの中で allowMethod() を使ったのです。
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The {0} article has been deleted.', $article->title));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function tags(...$tags)
    {
        // NOTE: 'pass' キーは CakePHP によって提供され、リクエストに渡された全ての URL パスセグメントを含みます。
        // $tags = $this->request->getParam('pass');

        $articles = $this->Articles->find('tagged', [
            'tags' => $tags
        ])
        ->all();

        $this->set([
            'articles' => $articles,
            'tags' => $tags
        ]);
    }
}
