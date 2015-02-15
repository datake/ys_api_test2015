<h2>review検索</h2>

<?php
echo $this->Form->create('Search');

echo $this->Form->input(
    'categories',
    array('options' => $categories)
    );


echo $this->Form->end('Search ');
?>

<h2>レビュー検索結果</h2>
<ul class ="listview">
    <?php foreach ($results as $result) { ?>
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


