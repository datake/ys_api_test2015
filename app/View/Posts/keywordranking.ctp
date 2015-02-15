<h2>キーワードランキング　よく検索されているキーワード </h2>
<?php
//debug($hits);
//debug($xml);

?>


<?php foreach ($hits as $hit) { ?>
<div class="Item">
   
    <a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->attributes()->rank);echo h($hit->attributes()->vector); echo h($hit->Query); ?>:<?php echo h($hit->Score); ?>件</a>
    
</div>
<?php } 
?>


