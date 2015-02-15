<h1>キーワードランキング　よく検索されているキーワード </h1>
<?php
//debug($hits);
//debug($xml);

?>

結果一覧:
<?php foreach ($hits as $hit) { ?>
<div class="Item">
   
    <h2><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->attributes()->rank);echo h($hit->attributes()->vector); echo h($hit->Query); ?>:<?php echo h($hit->Score); ?>件</a></h2>
    
</div>
<?php } 
?>


