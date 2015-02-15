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

         $this->categories_common = array(
        "1" => "すべてのカテゴリから",
        "13457"=> "ファッション",
        "2498"=> "食品",
        "2500"=> "ダイエット、健康",
        "2501"=> "コスメ、香水",
        "2502"=> "パソコン、周辺機器",
        "2504"=> "AV機器、カメラ",
        "2505"=> "家電",
        "2506"=> "家具、インテリア",
        "2507"=> "花、ガーデニング",
        "2508"=> "キッチン、生活雑貨、日用品",
        "2503"=> "DIY、工具、文具",
        "2509"=> "ペット用品、生き物",
        "2510"=> "楽器、趣味、学習",
        "2511"=> "ゲーム、おもちゃ",
        "2497"=> "ベビー、キッズ、マタニティ",
        "2512"=> "スポーツ",
        "2513"=> "レジャー、アウトドア",
        "2514"=> "自転車、車、バイク用品",
        "2516"=> "CD、音楽ソフト",
        "2517"=> "DVD、映像ソフト",
        "10002"=> "本、雑誌、コミック"
        );

         $this->sortOrder_common = array(
            "-score" => "おすすめ順",
            "+price" => "商品価格が安い順",
            "-price" => "商品価格が高い順",
            "+name" => "ストア名昇順",
            "-name" => "ストア名降順",
            "-sold" => "売れ筋順"
            );
         $this->appid_common = "dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-";//取得したアプリケーションIDを設定

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
