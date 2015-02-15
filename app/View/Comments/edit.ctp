<h2>Edit comment</h2>
 
<?php



echo $this->Form->create('Comment');
echo $this->Form->input('id');
echo $this->Form->input('commenter');
echo $this->Form->input('body');
echo $this->Form->end('Save Comment');
