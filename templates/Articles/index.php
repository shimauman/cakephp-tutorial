<h1>記事一覧</h1>
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
    </tr>
    <?php endforeach; ?>
</table>