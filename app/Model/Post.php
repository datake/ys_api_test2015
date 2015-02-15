<?php
class Post extends AppModel{
	//postにコメントもひっぱってくる
	public $name='Post';
//	public $hasMany = array('Comment');

	public $hasMany=array(
			//Post hasMany comment
			'Comment'=>array(
				'className'=>'Comment',
				'foreignKey'=>'post_id',
			),
			//Post hasMany history
			'History'=>array(
				'className'=>'History',
				'foreignKey'=>'post_id',

			),

		);

	
	public $validate=array(
		'title'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
			),
		'body'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
		),
		'URL'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
		)
	);

		
}