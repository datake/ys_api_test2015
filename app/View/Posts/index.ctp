<ul>
	<li>
<?php
    echo $this->Html->link('商品検索', array(
    'controller' => 'Posts',
    'action' => 'Search'
    ));?></li><li>
	<?php
    echo $this->Html->link('カテゴリランキング', array(
    'controller' => 'Posts',
    'action' => 'Ranking'
    ));
    ?></li><li>
	<?php

    echo $this->Html->link('レビュー', array(
    'controller' => 'Posts',
    'action' => 'reviewSearch'
    ));
    ?></li><li>
	<?php


    echo $this->Html->link('よく検索されるキーワード', array(
    'controller' => 'Posts',
    'action' => 'keywordranking'
    ));
?>

</ul>
<p>商品検索、カテゴリランキングのページのリンクをクリックすると個別の商品ページへ遷移されます。レビュー、よく検索されるキーワードのページのリンクをクリックすると個別の商品ページへ遷移されます。</p>
<p>個別の商品ページには、その商品を売る店舗のレビューも表示されます	</P>



