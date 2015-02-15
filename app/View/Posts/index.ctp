
<h2>Shopping</h2>
<?php

?>
<?php foreach ($ranking_data as $ranking) { ?>
<div class="Item">
    <h2><a href="<?php echo h($ranking->Url); ?>"><?php echo h($ranking->Name); ?></a></h2>
    <p><a href="<?php echo h($ranking->Url); ?>"><img src="<?php echo h($ranking->Image->Medium); ?>" /></a><?php echo h($ranking->Description); ?></p>
</div>
<?php } ?>




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








