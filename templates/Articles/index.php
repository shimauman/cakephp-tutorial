<h1>記事一覧</h1>
<?= $this->Html->link('記事の追加', ['action' => 'add']) ?>
<table>
    <tr>
        <th>タイトル</th>
        <th>作成日時</th>
    </tr>

    <!-- ここで、$articles クエリーオブジェクトを繰り返して、記事の情報を出力します -->

    <!-- NOTE: phpタグを入れる -->
    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <!-- NOTE: Htmlは、CakePHP の HtmlHelper のインスタンス -->
            <!-- NOTE: link() メソッドは、 与えられたリンクテキスト(第１パラメーター) と URL (第２パラメーター) を元に HTML リンクを生成 -->
            <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Html->link('編集', ['action' => 'edit', $article->slug]) ?>

            <!-- postLink() を使用すると、 JavaScript を使用して記事を削除する POST リクエストを行うリンクが作成されます。 -->
            <?= $this->Form->postLink(
                '削除',
                ['action' => 'delete', $article->slug],
                ['confirm' => 'よろしいですか?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>