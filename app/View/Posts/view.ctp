
<h2><?php echo h($post['Post']['title']);?></h2>
<p><?php echo h($post['Post']['body']);?></p>
<p><?php //echo h($post['Post']['URL']);?></p>
<?php //echo h($post['Post']['created']);?>
<?php
//debug($post);

?>
<iframe width="560" height="315" src="///www.youtube.com/embed/<?php echo h($post['Post']['URL']);?>" frameborder="0" allowfullscreen></iframe>
<br>
<!--お気に入り機能をつける-->
<?php /*
echo $this->Form->create('History', array());
echo $this->Form->button('Favorite',array('type'=>'button'));    
echo $this->Form->end();*/
/*生成されるコード例
<form action="/cakephp-blog/posts/view/20" id="HistoryViewForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div><button type="button">Favorite</button></form>
*/?>
<h2>Favorite</h2>
この動画のお気に入り総数:
<?php
$fav_count=0;
 foreach ((array)$post['History'] as $history):
//echo $history['fav'];
$fav_count+=$history['fav'];
endforeach;
echo $fav_count;
?>
<ul>

	<!--お気に入りした人列挙-->
<?php
$youLikedThis=0;
foreach ((array)$post['History'] as $history): ?>
<!--
<li id="history_<?php echo h($history['id']); ?>">
user_id:<?php echo h($history['user_id']) ?>
fav:
<?php echo h($history['fav']); ?>
post_id: <?php echo h($history['post_id']);

echo $this->Html->link('お気に入り解除', '#', array('class'=>'delete_history', 'data-history-id'=>$history['id'],$history['post_id']));
// debug($history);
?>-->
<?php
if($history['user_id']===$auth->user('id')){
	//echo("your data was found in history table");
		if($history['fav']){//favがtrue
			//echo("You Liked!!!!");
			$youLikedThis=1;
			$historyIdYouLiked=$history['id'];
		}else if(!$history['fav']){//favがfalse
			$youLikedThis=2;
			$historyIdYouLiked=$history['id'];
			//echo ("You Didnot Like");
		}else{
			//echo("Unexpected Liked Data");
		}

}
 ?>

</li>


<?php endforeach; ?>

</ul>

<?php



if($youLikedThis===1){//ユーザがお気に入りしているとき"解除"の表示(historyテーブルのfavを0に変更)	
	
	echo $this->Form->create('History', array('action'=>'edit'),$historyIdYouLiked);
	echo $this->Form->input('History.id', array('type'=>'hidden', 'value'=>$historyIdYouLiked));
	echo $this->Form->input('History.user_id', array('type'=>'hidden', 'value'=>$auth->user('id')));
	echo $this->Form->input('History.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));
	echo $this->Form->input('History.fav', array('type'=>'hidden', 'value'=>0));
	echo $this->Form->end('お気に入り解除する！');

} else if ($youLikedThis===0){//ユーザはじめてのお気に入り(historyテーブルに追加)

	echo $this->Form->create('History', array('action'=>'add'));
	echo $this->Form->input('History.user_id', array('type'=>'hidden', 'value'=>$auth->user('id')));
	echo $this->Form->input('History.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));
	echo $this->Form->input('History.fav', array('type'=>'hidden', 'value'=>1));
	echo $this->Form->end('お気に入り登録する！！');
}else if($youLikedThis===2){//かつてUnLIKEしたけどやっぱお気に入り(historyテーブルのfavを1に変更)
	
	echo $this->Form->create('History', array('action'=>'edit'),$historyIdYouLiked);
	echo $this->Form->input('History.id', array('type'=>'hidden', 'value'=>$historyIdYouLiked));
	echo $this->Form->input('History.user_id', array('type'=>'hidden', 'value'=>$auth->user('id')));
	echo $this->Form->input('History.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));
	echo $this->Form->input('History.fav', array('type'=>'hidden', 'value'=>1));
	echo $this->Form->end('お気に入り登録！');
}else{
echo("error,wrong liked condition ");
}


?>
<h2>Comments</h2>
 
<ul>
	<!--postにcommentがついてくる-->
<?php foreach ((array)$post['Comment'] as $comment): ?>

<li id="comment_<?php echo h($comment['id']); ?>">
<?php echo h($comment['body']) ?> by <?php echo h($comment['commenter']); ?>
<!--commenterにはuserのidをいれるようにした。コメント者は非公開にしておく-->
<?php
echo $this->Html->link('Edit',array('controller'=>'comments','action'=>'edit',$comment['id']));
?>

<?php
echo $this->Html->link('Remove', '#', array('class'=>'delete_comment', 'data-comment-id'=>$comment['id'],$comment['post_id']));
?>
</li>


<?php endforeach; ?>
</ul>

<h2>Add Comment</h2>
 

<?php
/*echo $auth->user('username');=>adminなど
echo $auth->user('id');=>14など
*/
echo $this->Form->create('Comment', array('action'=>'add'));
echo $this->Form->input('commenter');

echo $this->Form->input('body', array('rows'=>3));
echo $this->Form->input('Comment.user_id', array('type'=>'hidden', 'value'=>$auth->user('id')));

echo $this->Form->input('Comment.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));;
echo $this->Form->end('post comment');
?>

<!--
<h2>Edit Comment</h2>
<?php
echo $this->Form->create('Comment', array('action'=>'edit'));
echo $this->Form->input('commenter');
echo $this->Form->input('id');//表示されない？
echo $this->Form->input('post_id');
echo $this->Form->input('created');
echo $this->Form->input('body', array('rows'=>3));
/*echo $this->Form->input('Comment.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));*/
echo $this->Form->end('edit comment');
?>
-->
<script>
$(function() {
	$('a.delete_comment').click(function(e) {
		if (confirm('sure?')) {
			$.post('/cakephp-blog/comments/delete/'+$(this).data('comment-id'), {}, function(res) {
					$('#comment_'+res.id).fadeOut();
				}, "json");
		}
		return false;
	});
	$('a.delete_history').click(function(e) {
		if (confirm('sure?')) {
			$.post('/cakephp-blog/histories/delete/'+$(this).data('history-id'), {}, function(res) {
			$('#history_'+res.id).fadeOut();
		}, "json");
	}
return false;
});

});
</script>












