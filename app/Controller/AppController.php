<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    
	//http://www.moonmile.net/blog/archives/4855
	public $components = array(
        'Session',
        'Auth' => array(
            // ログイン後に /Posts/index へジャンプ
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            // ログアウト後に /Pages/home へジャンプ
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'))
        );
 
    public function beforeFilter() {
        
        //indexとviewアクションでログインを必要としないようにする＝サイトに登録していない人がみれる
        $this->Auth->allow('index', 'view');
        // 認証コンポーネントをViewで利用可能にしておく
        $this->set('auth',$this->Auth);
    }
    //$this->set("referer",$this->referer());

/*
	//Authコンポーネント(http://d.hatena.ne.jp/pospome/20130810/1376132512)
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array(
		'Session', 
		'Auth' => array(
			'loginAction' => array('controller' => 'users','action' => 'login'), //ログインを行なうaction
                       'loginRedirect' => array('controller' => 'users', 'action' => 'index'), //ログイン後のページ
                       'logoutRedirect' => array('controller' => 'users', 'action' => 'login'), //ログアウト後のページ
			'authError'=>'ログインして下さい。',
			'authenticate' => array(
            	            'Form' => array(
                	        'userModel' => 'User', //ユーザー情報のモデル
                               'fields' => array('username' => 'name','password'=>'password')
                            )
                       )
		)
	);*/
}
