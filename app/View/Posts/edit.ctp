<h2>Edit post</h2>
 
<?php
//cakeはデータベースの構造をみて自動的に入力フォームを変換してくれる
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows'=>3));
echo $this->Form->input('URL', array('rows'=>1));
echo $this->Form->end('Save Post');