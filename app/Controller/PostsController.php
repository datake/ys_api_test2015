<?php
//YahooShoppingAPI読み込み
// require('Controller/CommonController.php'); と同じ
App::import('Controller', 'Commons');


// クラスのロードが必要
$Commons = new CommonsController();

class PostsController extends AppController{

    public $helpers = array('Html', 'Form');

    public function itemLookup()
    {

        //beforeFilterで共通化  
        $categories=$this->categories_common;
        $sortOrder=$this->sortOrder_common;

        //itemlook_id
        $itemcode=null;
        //URLのqueryから?itemcode=hogehogeをひっぱる
        if(isset($this->request->query['itemcode'])){
            $itemcode=$this->request->query['itemcode'];
        }


        if ($this->request->is('post')) {
            $this->Session->setFlash('Goods Search!');
        }

        if (empty($this->request->data)) {

            $category_id=1;

        } else {
            $category_id=$this->request->data['Search']['categories'];

        }


        $hits = array();


        //  $query4url = rawurlencode($query);
        $appid = "dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-";//取得したアプリケーションIDを設定

        $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
        $xml = simplexml_load_file($url);
        if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
            $hit = $xml->Result->Hit;

        }
        //itemcodeの_までの文字列の切り出し
        $store_id=substr($itemcode,0,strpos($itemcode, '_'));
        $this->set('store_id',$store_id);
        $url_search = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&store_id=$store_id";
        $xml_search = simplexml_load_file($url_search);
        if ($xml_search["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
            $hits_search = $xml_search->Result->Hit;
        }

        //その商品のレビュー検索のために商品検索で手に入れたJanCodeを使う
        $jancode=$hit->JanCode;
        $url_review=null;
        $xml_review=null;
        $results_review=null;
        if($store_id){
        //jancodeやproductidが商品詳細APIでなぜかとれなかった
            $url_review = "http://shopping.yahooapis.jp/ShoppingWebService/V1/reviewSearch?appid=$appid&store_id=$store_id";
            $xml_review = simplexml_load_file($url_review);
            if ($xml_review["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
                $results_review = $xml_review->Result;
            }
        }

        //セレクトボックスの選択肢を渡していて、Postされる内容とは関係ないことに注意
        $this->set('categories',$categories);
        $this->set('xml',$xml);
        $this->set('url_review',$url_review);
        $this->set('xml_review',$xml_review);
        $this->set('hit',$hit);
        $this->set('results_review',$results_review);
        $this->set('itemcode',$itemcode);
        $this->set('xml_search',$xml_search);

}




public function reviewSearch()
{

//beforeFilterで共通化  
    $categories=$this->categories_common;
    $sortOrder=$this->sortOrder_common;
    $price_from_select=array('1000' => 1000,'2000' => 2000,'3000' => 3000,'4000' => 4000,'5000' => 5000,'6000' => 6000 );
    $price_to_select=array('5000' => 5000,'10000' => 10000,'20000' => 20000 ,'100000' => 100000);
    $offset_select=array("1位から２０位まで"=>1,"20位から４０位まで"=>20);
    $discount_select=array("通常"=>0,"セール"=>1);

    if ($this->request->is('post')) {
        $this->Session->setFlash('Goods Search!');

    }

    if (empty($this->request->data)) {

        $category_id=1;

    } else {
        $category_id=$this->request->data['Search']['categories'];

    }


    $hits = array();


    //  $query4url = rawurlencode($query);
    $appid = "dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-";//取得したアプリケーションIDを設定

    $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/reviewSearch?appid=$appid&category_id=$category_id";
    $xml = simplexml_load_file($url);
    if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
        $results = $xml->Result;
    }

    //セレクトボックスの選択肢を渡していて、Postされる内容とは関係ないことに注意
    $this->set('categories',$categories);
    $this->set('results',$results);

}



public function keywordranking()
{

    //beforeFilterで共通化  
    $categories=$this->categories_common;
    $sortOrder=$this->sortOrder_common;


    $price_from_select=array('1000' => 1000,'2000' => 2000,'3000' => 3000,'4000' => 4000,'5000' => 5000,'6000' => 6000 );
    $price_to_select=array('5000' => 5000,'10000' => 10000,'20000' => 20000 ,'100000' => 100000);
    $offset_select=array("1位から２０位まで"=>1,"20位から４０位まで"=>20);
    $discount_select=array("通常"=>0,"セール"=>1);

    if ($this->request->is('post')) {
        $this->Session->setFlash('Goods Search!');

    }

    if (empty($this->request->data)) {
        $query = 'Yahoo';//検索したいキーワードを指定
        $price_from=1000;
        $price_to=100000;
        $offset=0;
        $discount=0;

        } else {
            $query=$this->request->data['Search']['query'];
            $price_from=$this->request->data['Search']['price_from'];
            $price_to=$this->request->data['Search']['price_to'];
            $offset=$this->request->data['Search']['offset'];
            $discount=$this->request->data['Search']['discount'];
        }


        $hits = array();

        if ($query != "") {
            $query4url = rawurlencode($query);
        $appid = "dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-";//取得したアプリケーションIDを設定

        $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/queryRanking?appid=$appid";
        $xml = simplexml_load_file($url);
        if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
            $hits = $xml->Result->QueryRankingData;
        }
        }
        //セレクトボックスの選択肢を渡していて、Postされる内容とは関係ないことに注意
        $this->set('xml',$xml);
        $this->set('categories',$categories);
        $this->set('sortOrder',$sortOrder);
        $this->set('hits',$hits);
        $this->set('query',$query); 
        $this->set('price_from_select',$price_from_select);
        $this->set('price_to_select',$price_to_select);
        $this->set('offset_select',$offset_select);
        $this->set('discount_select',$discount_select);      
}


public function search()
{

    //beforeFilterで共通化  
    $categories=$this->categories_common;
    $sortOrder=$this->sortOrder_common;

    $price_from_select=array('1000' => 1000,'2000' => 2000,'3000' => 3000,'4000' => 4000,'5000' => 5000,'6000' => 6000 );
    $price_to_select=array('5000' => 5000,'10000' => 10000,'20000' => 20000 ,'100000' => 100000);
    $offset_select=array("1位から２０位まで"=>1,"20位から４０位まで"=>20);
    $discount_select=array("通常"=>0,"セール"=>1);

    if ($this->request->is('post')) {
        $this->Session->setFlash('Goods Search!');

    }

    if (empty($this->request->data)) {
    $query = 'Yahoo';//検索したいキーワードを指定
    $price_from=1000;
    $price_to=100000;
    $offset=0;
    $discount=0;

    } else {
        $query=$this->request->data['Search']['query'];
        $price_from=$this->request->data['Search']['price_from'];
        $price_to=$this->request->data['Search']['price_to'];
        $offset=$this->request->data['Search']['offset'];
        $discount=$this->request->data['Search']['discount'];


    }


    $hits = array();

    if ($query != "") {
        $query4url = rawurlencode($query);
    $appid = "dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-";//取得したアプリケーションIDを設定

    $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url";
    $xml = simplexml_load_file($url);
    if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
        $hits = $xml->Result->Hit;
    }
    }
    //セレクトボックスの選択肢を渡していて、Postされる内容とは関係ないことに注意
    $this->set('categories',$categories);
    $this->set('sortOrder',$sortOrder);
    $this->set('hits',$hits);
    $this->set('query',$query); 
    $this->set('price_from_select',$price_from_select);
    $this->set('price_to_select',$price_to_select);
    $this->set('offset_select',$offset_select);
    $this->set('discount_select',$discount_select);      
}


public function ranking() {

    //beforeFilterで共通化  
    $categories=$this->categories_common;
    $sortOrder=$this->sortOrder_common;

    $genders= array("male" => "male","female" => "female" );
    $generations=array('10' => 10,'20' => 20,'30' => 30,'40' => 40,'50' => 50,'60' => 60 );
    $periods= array("weekly"=> "weekly","daily"=>"daily" );
    $offsets=array("1位から２０位まで"=>1,"20位から４０位まで"=>20);
    //入力されたカテゴリから検索   
    if ($this->request->is('post')) {
        $this->Session->setFlash('RankingSearch!');

    }

    if (empty($this->request->data)) {
        $category_id = "1";//検索したいカテゴリーID;
        $gender="male";
        $generation=20;
        $period="weekly";
        $offset=1;

    } else {
        $category_id=$this->request->data['Category']['name'];
        $gender=$this->request->data['Category']['gender'];
        $generation=$this->request->data['Category']['generation'];
        $period=$this->request->data['Category']['period'];
        $offset=$this->request->data['Category']['offset'];
    }

    //http://developer.yahoo.co.jp/sample/shopping/sample3.html
    $hits = array();
    //$category_id = "2495";//検索したいカテゴリーIDを入れてください。
    $appid = "dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-";//取得したアプリケーションIDを設定

    if ($category_id != "") {
        $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/categoryRanking?appid=$appid&category_id=$category_id&gender=$gender&period=$period&offset=$offset";
        $xml = simplexml_load_file($url);
        if ($xml["totalResultsReturned"] != 0) {//問い合わせ結果が0件でない場合,変数$ranking_dataに問い合わせ結果を格納します。
            $ranking_data = $xml->Result->RankingData;
        }
    }

    //セレクトボックスの選択肢を渡していて、Postされる内容とは関係ないことに注意
    $this->set('genders',$genders);
    $this->set('generations',$generations);
    $this->set('periods',$periods);
    $this->set('offsets',$offsets);        
    $this->set('categories',$categories);

    $this->set('ranking_data',$ranking_data);

    $params = array(
    //          'order' => 'modified desc',
        'limit' => 10
        );
    //全ての記事をviewに渡す
    $this->set('posts', $this->Post->find('all'));


    $this->set('title_for_layout', '動画一覧');

}

//記事一覧をひっぱってきて変数にセット
public function index() {

//beforeFilterで共通化  
    $categories=$this->categories_common;
    $sortOrder=$this->sortOrder_common;

//入力されたカテゴリから検索   
    if ($this->request->is('post')) {
        $this->Session->setFlash('Search!');

    }

    if (empty($this->request->data)) {
    $category_id = "1";//検索したいカテゴリーID;
    } else {
        $category_id=$this->request->data['Category']['name'];
    }

    //http://developer.yahoo.co.jp/sample/shopping/sample3.html
    $hits = array();
    //$category_id = "2495";//検索したいカテゴリーIDを入れてください。
    $appid = "dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-";//取得したアプリケーションIDを設定

    if ($category_id != "") {
        $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/categoryRanking?appid=$appid&category_id=$category_id";
        $xml = simplexml_load_file($url);
        if ($xml["totalResultsReturned"] != 0) {//問い合わせ結果が0件でない場合,変数$ranking_dataに問い合わせ結果を格納します。
            $ranking_data = $xml->Result->RankingData;
        }
    }
    /* $this->set($hits);
    $this->set($category_id);
    $this->set($appid);
    $this->set($url);
    $this->set($xml);*/
    $this->set('ranking_data',$ranking_data);
    $this->set('categories',$categories);




    $params = array(
    //			'order' => 'modified desc',
        'limit' => 10
        );
    //全ての記事をviewに渡す
    $this->set('posts', $this->Post->find('all'));


    $this->set('title_for_layout', '動画一覧');

}


public function view($id=null){
    $this->Post->id=$id;
    $this->set('post',$this->Post->read());

//test11/13
//$this->set('post', $this->Post->find('all'));
//$this->set('history', $this->History->find('all'));

}

public function add() {
    if ($this->request->is('post')) {
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash('Success!');
            $this->redirect(array('action'=>'index'));
        } else {
            $this->Session->setFlash('failed!');
        }
    }
}


public function edit($id = null) {//$idがわたされる
//渡されたidでModelから記事をひっぱってくるためにセット
    $this->Post->id = $id;
//GETでアクセスされた場合に編集用のフォームを開く
    if ($this->request->is('get')) {
//フォームの中に引っ張ってきたモデルの中身をいれる
        $this->request->data = $this->Post->read();
    } else {
//ユーザがデータを編集してそのフォームがPOSTされた時の処理、まずデータの保存をする。

        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash('success!');
            $this->redirect(array('action'=>'index'));
        } else {
            $this->Session->setFlash('failed!');
        }
    }
}

public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
if ($this->request->is('ajax')) {//ajaxかどうかしる
if ($this->Post->delete($id)) {//削除試みる
//削除できたらviewをレンダリングしない
    $this->autoRender = false;
    $this->autoLayout = false;
//どのpostが消されたかをidをJSON形式でviewに返す
    $response = array('id' => $id);
    $this->header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
}

$this->redirect(array('action'=>'index'));
}
} 


