
<h2>Shopping</h2>
<?php
/*
$hits = array();
$category_id = "2495";//検索したいカテゴリーIDを入れてください。
$appid = "dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-";//取得したアプリケーションIDを設定

if ($category_id != "") {
    $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/categoryRanking?appid=$appid&category_id=$category_id";
    $xml = simplexml_load_file($url);
    if ($xml["totalResultsReturned"] != 0) {//問い合わせ結果が0件でない場合,変数$ranking_dataに問い合わせ結果を格納します。
        $ranking_data = $xml->Result->RankingData;
    }
}*/
?>
<?php foreach ($ranking_data as $ranking) { ?>
        <div class="Item">
            <h2><a href="<?php echo h($ranking->Url); ?>"><?php echo h($ranking->Name); ?></a></h2>
            <p><a href="<?php echo h($ranking->Url); ?>"><img src="<?php echo h($ranking->Image->Medium); ?>" /></a><?php echo h($ranking->Description); ?></p>
        </div>
        <?php } ?>





<h2>ルビ振りAPIへのリクエストサンプル（GET）
 </h2>
<?php
/*
  ルビ振りAPIへのリクエストサンプル（GET）
 
$api = 'http://jlp.yahooapis.jp/FuriganaService/V1/furigana';
$appid = 'dj0zaiZpPWxQaFBRSzBnM1JlTSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjU-';
$params = array(
    'sentence' => '明鏡止水'
);
 
$ch = curl_init($api.'?'.http_build_query($params));
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERAGENT      => "Yahoo AppID: $appid"
));
 
$result = curl_exec($ch);
curl_close($ch);
*/
?>
<pre>
<?php /*echo htmlspecialchars(
             print_r(new SimpleXMLElement($result), true)
           )*/ ?>
</pre>

<!--
<h1><a href="./ItemSearchForm.php">ショッピングデモサイト - 商品を検索する</a></h1>

        <form action="./ItemSearchForm.php" class="Search">
        表示順序:
        <select name="sort">
        <?php foreach ($sortOrder as $key => $value) { ?>
        <option value="<?php echo h($key); ?>" <?php if($sort == $key) echo "selected=\"selected\""; ?>><?php echo h($value);?></option>
        <?php } ?>
        </select>
        キーワード検索：
        <select name="category_id">
        <?php foreach ($categories as $id => $name) { ?>
        <option value="<?php echo h($id); ?>" <?php if($category_id == $id) echo "selected=\"selected\""; ?>><?php echo h($name);?></option>
        <?php } ?>
        </select>
        <input type="text" name="query" value="<?php echo h($query); ?>"/>
        <input type="submit" value="Yahooショッピングで検索"/>
        </form>
        <?php foreach ($hits as $hit) { ?>
        <div class="Item">
            <h2><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->Name); ?></a></h2>
            <p><a href="<?php echo h($hit->Url); ?>"><img src="<?php echo h($hit->Image->Medium); ?>" /></a><?php echo h($hit->Description); ?></p>
        </div>
        <?php } 

?>-->
<script>
$(function() {
$('a.delete').click(function(e) {//a要素のdeleteクラスがついたものがクリックされた処理
    if (confirm('sure?')) {
//次の行パスを間違えてはまった!注意！
$.post('/cakephp-blog/posts/delete/'+$(this).data('post-id'), {}, function(res) {
//削除にフェードアウトを使う
$('#post_'+res.id).fadeOut();
}, "json");
}
return false;
});
});
</script>








