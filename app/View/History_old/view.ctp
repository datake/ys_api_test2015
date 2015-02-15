<h2>Commenter:<?php echo h($comment['Comment']['commenter']);?></h2>
<p>body<?php echo h($comment['Comment']['body']);?></p>

(<?php echo h($comment['Comment']['created']);?>)


<!--

<h2>Add Comment</h2>
 

<?php
echo $this->Form->create('Comment', array('action'=>'add'));
echo $this->Form->input('commenter');
echo $this->Form->input('body', array('rows'=>3));
echo $this->Form->input('Comment.comment_id', array('type'=>'hidden', 'value'=>$comment['Comment']['id']));
echo $this->Form->end('comment comment');
?>


<h2>Edit Comment</h2>
<?php
echo $this->Form->create('Comment', array('action'=>'edit'));
echo $this->Form->input('commenter');
echo $this->Form->input('id');//表示されない？
echo $this->Form->input('comment_id');
echo $this->Form->input('created');
echo $this->Form->input('body', array('rows'=>3));
/*echo $this->Form->input('Comment.comment_id', array('type'=>'hidden', 'value'=>$comment['Comment']['id']));*/
echo $this->Form->end('edit comment');
?>

<script>
$(function() {
	$('a.delete').click(function(e) {
		if (confirm('sure?')) {
			$.comment('/cakephp-blog/comments/delete/'+$(this).data('comment-id'), {}, function(res) {
			$('#comment_'+res.id).fadeOut();
		}, "json");
	}
return false;
});
});
</script>

-->










