<h2>UnLiked</h2>
 
<?php


echo $this->Form->create('History');
echo $this->Form->input('id');
echo $this->Form->input('user_id');
echo $this->Form->input('post_id');
echo $this->Form->input('fav');
echo $this->Form->end('UnLiked');

