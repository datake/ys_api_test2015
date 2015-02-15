    <?php
     
    class History extends AppModel {
    	//全てのコメントはpostに帰属する
    	public $name='History';
    	public $belongsTo = 'Post';
    	//public $useTable='History';
//    	public $belongsTo = 'User';

    //public $belongsTo = 'User';
    //public $belongsTo = 'Post';
/*
    public $validate=array(
		'user_id'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
			),
		'post_id'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
		),
		'fav'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
		)
	);*/
    }