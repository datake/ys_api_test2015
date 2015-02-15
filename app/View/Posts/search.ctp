<h2>条件を絞って商品を検索 - 「<?php echo h($query); ?>」の検索結果</h2>
<?php
echo $this->Form->create('Search');
//echo $this->Form->input('name');

echo $this->Form->input(
    'sort',
    array('options' => $sortOrder)
    );
echo $this->Form->input(
    'categories',
    array('options' => $categories)
    );
echo $this->Form->input(
    'price_from',
    array('options' => $price_from_select)
    );
echo $this->Form->input(
    'price_to',
    array('options' => $price_to_select)
    );
echo $this->Form->input(
    'offset',
    array('options' => $offset_select)
    );
echo $this->Form->input(
    'discount',
    array('options' => $discount_select)
    );

echo $this->Form->text(
    'query'
    );

echo $this->Form->end('Search ');
?>

<h2>検索結果一覧</h2><?php //debug($hits);?>
<ul class ="listview">
    <?php foreach ($hits as $hit) { ?>
    <li>
        
        <img src="<?php echo h($hit->Image->Medium); ?>" width="100" height="100" >
        <!--<p>JanCode:<?php echo h($hit->JanCode); ?>
        Code:--><?php 
        $itemcode=$hit->Code;
        //echo h($itemcode); 
        $linkurl="./itemLookup?itemcode=".$itemcode;
        ?>
        <!--Url:<?php echo h($hit->Url); ?></p>
        code:<?php echo h($hit->Code); ?></p>-->
         <a href=<?php echo($linkurl);?>>
             <p class="itemname"><?php echo h($hit->Name); ?></p>
        </a>
             <p class="itemdescription"><?php echo h($hit->Description); ?>
         
        <?php
       
        /*
        ?以下のリンクがうまくできない(%5B0%5Dがはいる)
        /itemLookup?itemcode%5B0%5D=yurakuseika_110001 となる
        $itemcodeArray["itemcode"]=$itemcode;
        echo $this->Html->link('リンク', array(
        'controller' => 'Posts',
        'action' => 'itemLookup',
        '?'=>$itemcodeArray
        ));*/
        ?>
       
   
    </li>
    <?php } ?>

</ul>
