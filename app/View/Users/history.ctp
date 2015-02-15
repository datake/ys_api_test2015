<h2>History of Users</h2>
 
<ul>
	<!--postにcommentがついてくる-->
<?php
debug($user);
?>
<?php foreach ((array)$user['History'] as $history): ?>

<li id="history_<?php echo h($history['id']); ?>">
<?php echo h($history['user_id']) ?> & <?php echo h($history['post_id']); ?>
<!--commenterにはuserのidをいれるようにした。コメント者は非公開にしておく-->


<?php endforeach; ?>
</ul>
