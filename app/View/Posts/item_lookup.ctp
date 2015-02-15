<h2>商品コード検索(商品詳細)</h2>




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



<h2>この商品の店舗のレビュー</h2>
<ul class ="listview">
    <?php foreach ($results_review as $result) { ?>
    <li> 
        <?php //debug($result);?>    
        <img src="<?php echo h($result->Target->Image->Medium->Url); ?>" width="100" height="100" >
        <!--<p>JanCode:<?php echo h($result->JanCode); ?>
        Code:--><?php 
        $itemcode=$result->Code;
        //echo h($itemcode); 
        $linkurl="./itemLookup?itemcode=".$itemcode;
        ?>
        <!--Url:<?php echo h($result->Url); ?></p>
        code:<?php echo h($result->Code); ?></p>-->
         <a href="<?php echo h($result->Url); ?>">
             
             <p><?php echo h($result->ReviewTitle); ?></p>
        </a>
        <p>Rate:<?php echo h($result->Ratings->Rate); ?></p>
        <p>Description:<?php echo h($result->Description); ?></p>
        <p>商品名:<?php echo h($result->Target->Name); ?></p>
    </li>
    <?php } ?>

</ul>






