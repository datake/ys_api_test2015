<h1>商品コード検索(商品詳細)</h1>




store_id:<?php echo($store_id);?>
itemcode:<?php echo ($itemcode);?>

<?php //debug($hit);?>
<?php //debug($result);?>

<div class="Item">
    <?php //debug($result);?>
    <h2><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->ReviewTitle); ?></a></h2>
    <img src="<?php echo h($hit->Image->Small); ?>" />
   <p>Description:<?php echo h($hit->Description); ?></p>
   <p>Rate:<?php echo h($hit->Condition); ?></p>
   <p>商品名:<?php echo h($hit->Name); ?></p>
   <p>Price:<?php echo h($hit->Price); ?></p>
	<p>Code:<?php echo h($hit->Code); ?></p>
	<p>JanCode:<?php echo h($hit->JanCode); ?></p>
	</div>




<h1>その商品の店舗のレビュー</h1>

<?php //debug($url_review);?>

<?php //debug($results_review);?>	

<?php foreach ($results_review as $result) { ?>
<div class="Item">
    <?php //debug($result);?>
    <h2><a href="<?php echo h($result->Url); ?>"><?php echo h($result->ReviewTitle); ?></a></h2>
   <p>Description:<?php echo h($result->Description); ?></p>
   <p>Rate:<?php echo h($result->Ratings->Rate); ?></p>
   <p>商品名:<?php echo h($result->Target->Name); ?></p>
</div>
<?php } ?>




