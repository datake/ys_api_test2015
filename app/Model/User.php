<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 */

//http://www.moonmile.net/blog/archives/4855
class User extends AppModel {
    public $name='User';
    //user hasMany history
    public $hasMany=array(
            //Post hasMany comment
            'History'=>array(
                'className'=>'History',
                'foreignKey'=>'user_id',
            ),
        );

/*
  保存時にパスワードをハッシュ化する
 //http://www.moonmile.net/blog/archives/4855の方法

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
*/


    //http://book.cakephp.org/2.0/ja/tutorials-and-examples/blog-auth-example/auth.html
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new SimplePasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
    }
    return true;
}

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'mail' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A mail is required'
            )
         ),

        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
}
