<h2>Add comment</h2>
 
<?php
//cakeはデータベースの構造をみて自動的に入力フォームを変換してくれる
echo $this->Form->create('Comment');
echo $this->Form->input('id');
echo $this->Form->input('commenter');
echo $this->Form->input('body');
echo $this->Form->end('Save Comment');