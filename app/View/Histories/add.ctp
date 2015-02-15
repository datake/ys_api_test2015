<h2>Add History</h2>
 
<?php
/*
echo $this->Form->create('History');
$options_user_id=array(
	12=>'guest-admin',
	15=>'admin',
	11=>'take',

	);
$options_post_id=array(
	13=>'フォーチュンクッキー',
	14=>'大声ダイヤモンド',
	19=>'test',
	20=>'ひかきん',
	);
echo $this->Form->select('user_id',$options_user_id);
echo $this->Form->select('post_id',$options_post_id);
echo $this->Form->input('fav');
echo $this->Form->end('Save History');

*/




echo $this->Form->create('History');
echo $this->Form->input('id');
echo $this->Form->input('user_id');
echo $this->Form->input('post_id');
echo $this->Form->input('fav');
echo $this->Form->end('Liked');


/*
echo $this->Form->create('History', array('action'=>'add'));
echo $this->Form->input('History.user_id', array('type'=>'hidden', 'value'=>$auth->user('id')));
echo $this->Form->input('History.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));
echo $this->Form->input('History.fav', array('type'=>'hidden', 'value'=>1));
echo $this->Form->end('お気に入り登録する！！');
*/