   <h2>全てのhistory一覧</h2>
    

 <ul>
    <?php foreach ($history as $history) : ?>
    <li>
    <?php
    debug($history);

    ?>
    </li>
<?php endforeach;?>
</ul>













  <!--
    <ul>
    <?php foreach ($historys as $history) : ?>
    <li id="history_<?php echo h($history['History']['id']); ?>">
    <?php
    //debug($post);
    //    echo h($post['Post']['title']);
    echo $this->Html->link($history['History'][''],'/comments/view/'.$comment['Comment']['id']);;

    ?>
    id:<?php echo h($comment['Comment']['id']);?>
    post_id:<?php echo h($comment['Comment']['post_id']);?>
    body:<?php echo h($comment['Comment']['body']);?>
    
    <?php echo $this->Html->link('編集',array('action'=>'edit',$comment['Comment']['id']));?>-->
    <!--
    <?php
    //クラスとデータ属性を指定してjQueryでとる
    echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-comment-id'=>$comment['Comment']['id']));
    ?>
    </li>
    <?php endforeach; ?>
    </ul>
    <h2>Add comment</h2>
    <?php echo $this->Html->Link('Add Comment',array('controller'=>'comments','action'=>'add'));?>-->
    <!--
<h2>Viewers</h2>
<ul>
  
    <?php foreach ($viewers as $viewer) : ?>
    <li>
    
    <?php echo h($viewer['Viewer']['viewersid']);?>
     <?php echo h($viewer['Viewer']['name']);?>
     <?php echo h($viewer['Viewer']['mail']);?>

    
    
    </li>
    <?php endforeach; ?>
    </ul>

-->

<!--
<script>
$(function() {
    $('a.delete').click(function(e) {//a要素のdeleteクラスがついたものがクリックされた処理
        if (confirm('sure?')) {
            //次の行パスを間違えてはまった!注意！
            $.post('/cakephp-blog/comment/delete/'+$(this).data('comment-id'), {}, function(res) {
                //削除にフェードアウトを使う
                $('#comment_'+res.id).fadeOut();
            }, "json");
        }
        return false;
    });
});
</script>

-->






