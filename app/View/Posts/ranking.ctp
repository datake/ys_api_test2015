
<h2>カテゴリ別売り上げランキング</h2>
<?php

echo $this->Form->create('Category');
//echo $this->Form->input('name');

echo $this->Form->input(
    'gender',
    array('options' => $genders)
    );
echo $this->Form->input(
    'generation',
    array('options' => $generations)
    );
echo $this->Form->input(
    'period',
    array('options' => $periods)
    );
echo $this->Form->input(
    'offset',
    array('options' => $offsets)
    );
echo $this->Form->input(
    'name',
    array('options' => $categories)
    );
echo $this->Form->end('Search Ranking');
?>
<h2>Shopping</h2>

<?php foreach ($ranking_data as $hit) { ?>
<div class="Item">
    JanCode:<?php echo h($hit->JanCode); ?>
    Code:<?php 
    $itemcode=$hit->Code;
    echo h($itemcode); 
    $linkurl="./itemLookup?itemcode=".$itemcode;
    ?>
    Url:<?php echo h($hit->Url); ?>
     <a href=<?php echo($linkurl);?>>
         <h2><?php echo h($hit->Name); ?></h2>
         <p><img src="<?php echo h($hit->Image->Medium); ?>" /><?php echo h($hit->Description); ?>code:<?php echo h($hit->Code); ?></p>
     </a>
</div>
<?php } ?>


<!--
<?php foreach ($ranking_data as $ranking) { ?>
<div class="Item">
    <h2><a href="<?php echo h($ranking->Url); ?>"><?php echo h($ranking->Name); ?></a></h2>
    <p><a href="<?php echo h($ranking->Url); ?>"><img src="<?php echo h($ranking->Image->Medium); ?>" /></a><?php echo h($ranking->Description); ?></p>
</div>
<?php } ?>
-->

        <script>
        $(function() {
$('a.delete').click(function(e) {//a要素のdeleteクラスがついたものがクリックされた処理
    if (confirm('sure?')) {
//次の行パスを間違えてはまった!注意！
$.post('/cakephp-blog/posts/delete/'+$(this).data('post-id'), {}, function(res) {
//削除にフェードアウトを使う
$('#post_'+res.id).fadeOut();
}, "json");
}
return false;
});
});
        </script>








