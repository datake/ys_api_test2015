    <?php
     
    class Comment extends AppModel {
    	//全てのコメントはpostに帰属する
    	public $name='Comment';
	   public $belongsTo = 'Post';
  /*	public $belongsTo=array(
    			'className'=>'Post',
    			//Comment hasOne Post
    			'foreignKey'=>'post_id'

    		);

*/
	    public $validate=array(
			'commenter'=>array(
				'rule'=>'notEmpty',
				'message'=>'なんか入力してね'
				),
			'body'=>array(
				'rule'=>'notEmpty',
				'message'=>'なんか入力してね'
			)
		);
    }